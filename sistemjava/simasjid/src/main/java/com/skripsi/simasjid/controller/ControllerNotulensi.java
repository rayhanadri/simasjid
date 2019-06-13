package com.skripsi.simasjid.controller;

import com.skripsi.simasjid.services.ServiceAnggota;
import com.skripsi.simasjid.services.ServicePekerjaan;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
@Controller
public class ControllerNotulensi {

    @Autowired
    private ServicePekerjaan servicePekerjaan;

    private ServiceAnggota serviceAnggota;

    @Autowired
    public void setServiceAnggota(ServiceAnggota mahasiswaService) {
        this.serviceAnggota = mahasiswaService;
    }

    @RequestMapping("/notulensi")
    public String index(){
        return "notulensi/daftar_notulensi";
    }

    @RequestMapping("/notulensi/buat")
    public String buatNotulensi(Model model){
        model.addAttribute("anggotas",serviceAnggota.listAnggota());
        model.addAttribute("pekerjaans",servicePekerjaan.findAll());
        return "notulensi/form_notulensi";
    }

    @RequestMapping("/notulensi/simpan")
    public String simpanNotulensi(){
        return "redirect:/notulensi";
    }

    @RequestMapping("/notulensi/detail")
    public String detailNotulensi(){
        return "notulensi/detail_notulensi";
    }

    @RequestMapping("/notulensi/hapus")
    public String hapusNotulensi(){
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
