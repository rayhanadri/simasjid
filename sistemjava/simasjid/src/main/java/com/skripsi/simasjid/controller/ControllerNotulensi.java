package com.skripsi.simasjid.controller;

import com.skripsi.simasjid.model.*;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.*;

import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

import java.security.Principal;
import java.util.*;

@Controller
public class ControllerNotulensi extends BaseController {

    /*Iterasi Dalam 1*/

    @RequestMapping("/notulensi")
    public String index(Model model) {
        List<ModelNotulensi> data = serviceNotulensi.findAll();
        for (ModelNotulensi mn : data) {
            try{
                ModelAnggota ma = serviceAnggota.getOne(mn.getIdAmir());
                mn.setNamaAmirMusyawarah(ma.getNama());
                mn.setConvertedDate(mn.getCreated());
            } catch (Exception e){
                System.out.println("ERROR "+e);
            }
        }

        model.addAttribute("notulensis", data);
        return "notulensi/daftar_notulensi";
    }

    @RequestMapping("/notulensi/buat")
    public String buatNotulensi(Model model, Principal principal) {
        int idPengguna = idLogged(principal);
        model.addAttribute("idPengguna", idPengguna);

        model.addAttribute("anggotas", getAnggotaAktif());
        model.addAttribute("pekerjaans", getPekerjaanAktif());
        return "notulensi/form_notulensi";
    }

    @RequestMapping("/notulensi/edit/{id}")
    public String editNotulensi(@PathVariable Integer id, Model model) {
        model.addAttribute("anggotas", serviceAnggota.findAll());
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

    @RequestMapping(value = "/notulensi/simpankomentar", method = RequestMethod.POST)
    public String komentarNotulensi(@ModelAttribute("ModelKomentarNotulensi") ModelKomentarNotulensi mk, BindingResult result) {
        System.out.println("id notulensi " + mk.getNotulensi());
        System.out.println("id anggota " + mk.getAnggota());
        serviceKomentarNotulensi.save(mk);
        return "notulensi/detail/" + mk.getNotulensi();
    }

    @RequestMapping(value = "/notulensi/detail/{id}", method = RequestMethod.GET)
    public String detailNotulensi(@PathVariable Integer id, Model model, Principal principal) {
        int idPengguna = idLogged(principal);
        model.addAttribute("idPengguna", idPengguna);

        ModelNotulensi mn = serviceNotulensi.getOne(id);
        mn.setNamaAmirMusyawarah(serviceAnggota.getOne(mn.getIdAmir()).getNama());
        mn.setNamaNotulen(serviceAnggota.getOne(mn.getIdNotulen()).getNama());
        mn.setConvertedDate(mn.getCreated());
        System.out.println("Cek id mn : " + mn.getId());
        model.addAttribute("notulensi", mn);

        model.addAttribute("progress", getProgres(id));

        List<ModelKomentarNotulensi> listKomentar = serviceKomentarNotulensi.findAll();
        List<ModelKomentarNotulensi> listKomentarUsed = new ArrayList<>();
        for (ModelKomentarNotulensi mk : listKomentar) {
            if (mk.getNotulensi() == id) {
                mk.setNamaAnggota(serviceAnggota.getOne(mk.getAnggota()).getNama());
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
        public String formCariNotulensi(Model model) {
        model.addAttribute("pekerjaans", getPekerjaanAktif());
        return "notulensi/form_cari_notulensi";
    }

}
