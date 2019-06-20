package com.skripsi.simasjid.controller;

import com.skripsi.simasjid.model.*;
import com.skripsi.simasjid.services.*;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.*;

import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

import java.util.*;

@Controller
public class ControllerNotulensi {

    @Autowired
    private ServicePekerjaan servicePekerjaan;

    @Autowired
    private ServiceNotulensi serviceNotulensi;

    @Autowired
    private ServiceKomentarNotulensi serviceKomentarNotulensi;

    @Autowired
    private ServiceDetailProgres serviceDetailProgres;

    @Autowired
    private ServiceAnggota2 serviceAnggota2;

    /*Iterasi Dalam 1*/

    @RequestMapping("/notulensi")
    public String index(Model model) {
        List<ModelNotulensi> data = serviceNotulensi.findAll();
        for (ModelNotulensi mn : data) {
            System.out.println("MA get by id : " + mn.getIdAmir());
            ModelAnggota ma = serviceAnggota2.getOne(mn.getIdAmir());
            mn.setNamaAmirMusyawarah(ma.getNama());
            mn.setConvertedDate(mn.getCreated());
        }

        model.addAttribute("notulensis", data);
        return "notulensi/daftar_notulensi";
    }

    @RequestMapping("/notulensi/buat")
    public String buatNotulensi(Model model) {
        model.addAttribute("anggotas", getAnggotaAktif());
        model.addAttribute("pekerjaans", getPekerjaanAktif());
        return "notulensi/form_notulensi";
    }

    @RequestMapping("/notulensi/edit/{id}")
    public String editNotulensi(@PathVariable Integer id, Model model) {
        model.addAttribute("anggotas", serviceAnggota2.findAll());
        ModelNotulensi mn = serviceNotulensi.getOne(id);
        System.out.println("Cek id mn : " + mn.getId());
        model.addAttribute("notulensi", mn);

        model.addAttribute("progress", getProgres(id));

        String[] idAnggotaHadir = mn.getIdHadirAnggota().split(",");
        List<ModelAnggota> listAnggota = getAnggotaAktif();
        List<ModelAnggota> listAnggotaUsed = new ArrayList<>();
        for (ModelAnggota ma : listAnggota) {
            for (String tempIdAnggota : idAnggotaHadir) {
                if (ma.getId().toString().equalsIgnoreCase(tempIdAnggota)) {
                    listAnggotaUsed.add(ma);
                }
            }
        }
        mn.setListHadirAnggota(listAnggotaUsed);

        model.addAttribute("listAnggotaHadir", listAnggotaUsed);
        return "notulensi/form_notulensi_edit";
    }

    @RequestMapping("/notulensi/simpan")
    public String simpanNotulensi() {
        return "redirect:/notulensi";
    }

    @RequestMapping(value = "/notulensi/simpankomentar", method = RequestMethod.POST)
    public String komentarNotulensi(@ModelAttribute("ModelKomentarNotulensi") ModelKomentarNotulensi mk, BindingResult result) {
        System.out.println("id notulensi " + mk.getNotulensi());
        System.out.println("id anggota " + mk.getAnggota());
        serviceKomentarNotulensi.save(mk);
        return "notulensi/detail/" + mk.getNotulensi();
    }

    @RequestMapping(value = "/notulensi/detail/{id}", method = RequestMethod.GET)
    public String detailNotulensi(@PathVariable Integer id, Model model) {
        ModelNotulensi mn = serviceNotulensi.getOne(id);
        mn.setNamaAmirMusyawarah(serviceAnggota2.getOne(mn.getIdAmir()).getNama());
        mn.setNamaNotulen(serviceAnggota2.getOne(mn.getIdNotulen()).getNama());
        mn.setConvertedDate(mn.getCreated());
        System.out.println("Cek id mn : " + mn.getId());
        model.addAttribute("notulensi", mn);

        model.addAttribute("progress", getProgres(id));

        List<ModelKomentarNotulensi> listKomentar = serviceKomentarNotulensi.findAll();
        List<ModelKomentarNotulensi> listKomentarUsed = new ArrayList<>();
        for (ModelKomentarNotulensi mk : listKomentar) {
            if (mk.getNotulensi() == id) {
                mk.setNamaAnggota(serviceAnggota2.getOne(mk.getAnggota()).getNama());
                mk.setConvertedDate(mk.getCreated());
                listKomentarUsed.add(mk);
            }
        }
        model.addAttribute("komentars", listKomentarUsed);

        String[] idAnggotaHadir = mn.getIdHadirAnggota().split(",");
        List<ModelAnggota> listAnggota = getAnggotaAktif();
        List<ModelAnggota> listAnggotaUsed = new ArrayList<>();
        for (ModelAnggota ma : listAnggota) {
            for (String tempIdAnggota : idAnggotaHadir) {
                if (ma.getId().toString().equalsIgnoreCase(tempIdAnggota)) {
                    listAnggotaUsed.add(ma);
                }
            }
        }
        mn.setListHadirAnggota(listAnggotaUsed);

        model.addAttribute("listAnggotaHadir", listAnggotaUsed);
        return "notulensi/detail_notulensi";
    }

    @RequestMapping("/notulensi/hapus/{id}")
    public String hapusNotulensi(@PathVariable Integer id) {
        serviceNotulensi.deleteById(id);
        return "redirect:/notulensi";
    }

    /*Iterasi Luar 2*/

    @RequestMapping(value = "/notulensi/setStatus/{idNotulensi}/{idStatus}", method = RequestMethod.GET)
    public String setStatusNotulensi(@PathVariable Integer idNotulensi, @PathVariable Integer idStatus) {
        ModelNotulensi mn = serviceNotulensi.getOne(idNotulensi);
        mn.setIdStatus(idStatus);
        serviceNotulensi.save(mn);
        return "redirect:/notulensi/detail/" + idNotulensi;
    }

    @RequestMapping(value = "/notulensi/cari", method = RequestMethod.GET)
    public String formNotulensi(Model model) {
        model.addAttribute("pekerjaans", getPekerjaanAktif());
        return "notulensi/form_cari_notulensi";
    }

    private List<ModelAnggota> getAnggotaAktif() {
        List<ModelAnggota> maList = serviceAnggota2.findAll();
        List<ModelAnggota> maUsed = new ArrayList<>();
        for (ModelAnggota ma : maList) {
            if (ma.getAktif() == 1) {
                maUsed.add(ma);
            }
        }
        return maUsed;
    }

    private List<ModelDetailProgres> getProgres(int id) {
        List<ModelDetailProgres> listDetailProgres = serviceDetailProgres.findAll();
        List<ModelDetailProgres> listDpUsed = new ArrayList<>();
        for (ModelDetailProgres mdp : listDetailProgres) {

            if (mdp.getNotulensi() == id) {
                mdp.setNamaPekerjaan(servicePekerjaan.getOne(mdp.getPekerjaan()).getNamaPekerjaan());
                listDpUsed.add(mdp);
            }
        }
        return listDpUsed;
    }

    private List<ModelPekerjaan> getPekerjaanAktif() {
        List<ModelPekerjaan> modelPekerjaanList = servicePekerjaan.findAll();
        List<ModelPekerjaan> data = new ArrayList<>();
        for (ModelPekerjaan mp : modelPekerjaanList) {
            if (mp.getAktif() == 1) {
                data.add(mp);
            }
        }
        return data;
    }
}
