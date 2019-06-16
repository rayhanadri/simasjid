package com.skripsi.simasjid.controller;

import com.skripsi.simasjid.model.ModelAnggota;
import com.skripsi.simasjid.model.ModelDetailProgres;
import com.skripsi.simasjid.model.ModelNotulensi;
import com.skripsi.simasjid.services.*;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

import java.util.ArrayList;
import java.util.List;
import java.util.Optional;

@Controller
public class ControllerNotulensi {

    @Autowired
    private ServicePekerjaan servicePekerjaan;

    @Autowired
    private ServiceNotulensi serviceNotulensi;

    @Autowired
    private ServiceDetailProgres serviceDetailProgres;

    @Autowired
    private ServiceAnggota2 serviceAnggota2;

    private ServiceAnggota serviceAnggota;

    @Autowired
    public void setServiceAnggota(ServiceAnggota mahasiswaService) {
        this.serviceAnggota = mahasiswaService;
    }

    @RequestMapping("/notulensi")
    public String index(Model model){
        List<ModelNotulensi> data = serviceNotulensi.findAll();
        for (ModelNotulensi mn: data) {
            System.out.println("MA get by id : "+mn.getIdAmir());
            ModelAnggota ma = serviceAnggota2.getOne(mn.getIdAmir());
            mn.setNamaAmirMusyawarah(ma.getNama());
            mn.setConvertedDate(mn.getCreated());
        }

        model.addAttribute("notulensis",data);
        return "notulensi/daftar_notulensi";
    }

    @RequestMapping("/notulensi/buat")
    public String buatNotulensi(Model model){
        model.addAttribute("anggotas",serviceAnggota.listAnggota());
        model.addAttribute("pekerjaans",servicePekerjaan.findAll());
        return "notulensi/form_notulensi";
    }

    @RequestMapping("/notulensi/edit/{id}")
    public String editNotulensi(@PathVariable Integer id, Model model){
        model.addAttribute("anggotas",serviceAnggota.listAnggota());
        ModelNotulensi mn = serviceNotulensi.getOne(id);
        System.out.println("Cek id mn : "+mn.getId());
        model.addAttribute("notulensi", mn);

        List<ModelDetailProgres> listDetailProgres = serviceDetailProgres.findAll();
        List<ModelDetailProgres> listUsed = new ArrayList<>();
        for (ModelDetailProgres mdp: listDetailProgres) {
            if (mdp.getNotulensi() == id){
                mdp.setNamaPekerjaan(servicePekerjaan.getOne(mdp.getPekerjaan()).getNamaPekerjaan());
                listUsed.add(mdp);
            }
        }
        model.addAttribute("progress", listUsed);
        return "notulensi/form_notulensi_edit";
    }

    @RequestMapping("/notulensi/simpan")
    public String simpanNotulensi(){
        return "redirect:/notulensi";
    }

    @RequestMapping(value = "/notulensi/detail/{id}", method = RequestMethod.GET)
    public String detailNotulensi(@PathVariable Integer id, Model model){
        ModelNotulensi mn = serviceNotulensi.getOne(id);
        mn.setNamaAmirMusyawarah(serviceAnggota2.getOne(mn.getIdAmir()).getNama());
        mn.setNamaNotulen(serviceAnggota2.getOne(mn.getIdNotulen()).getNama());
        mn.setConvertedDate(mn.getCreated());
        System.out.println("Cek id mn : "+mn.getId());
        model.addAttribute("notulensi", mn);

        List<ModelDetailProgres> listDetailProgres = serviceDetailProgres.findAll();
        List<ModelDetailProgres> listUsed = new ArrayList<>();
        for (ModelDetailProgres mdp: listDetailProgres) {
            if (mdp.getNotulensi() == id){
                mdp.setNamaPekerjaan(servicePekerjaan.getOne(mdp.getPekerjaan()).getNamaPekerjaan());
                listUsed.add(mdp);
            }
        }
        model.addAttribute("progress", listUsed);
        return "notulensi/detail_notulensi";
    }

    @RequestMapping("/notulensi/hapus/{id}")
    public String hapusNotulensi(@PathVariable Integer id){
        serviceNotulensi.deleteById(id);
        return "redirect:/notulensi";
    }

    @RequestMapping("/notulensi/setStatus")
    public String setStatusNotulensi(){
        return "redirect:/notulensi";
    }

    @RequestMapping(value = "/notulensi/cari")
    public String cariNotulensi(){
        return "notulensi/form_cari_notulensi";
    }

    @RequestMapping(value = "/notulensi/komentar")
    public String komentarNotulensi(){
        return "notulensi/form_cari_notulensi";
    }



}
