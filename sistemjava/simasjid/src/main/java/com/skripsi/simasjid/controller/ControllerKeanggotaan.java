package com.skripsi.simasjid.controller;

import com.skripsi.simasjid.model.ModelAnggota;
import com.skripsi.simasjid.services.ServiceAnggota;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

@Controller
public class ControllerKeanggotaan {

    private ServiceAnggota serviceAnggota;

    @Autowired
    public void setServiceAnggota(ServiceAnggota mahasiswaService) {
        this.serviceAnggota = mahasiswaService;
    }

    @RequestMapping(value = "/anggota")
    public String index(Model model){
        model.addAttribute("anggotas",serviceAnggota.listAnggota());
        return "anggota/daftar_anggota";
    }

    @RequestMapping(value = "/anggota/simpan", method = RequestMethod.POST)
    public String simpanBaru(Model model, ModelAnggota anggota){
        model.addAttribute("anggotas", serviceAnggota.saveOrUpdate(anggota));
        return "redirect:/anggota";
    }

    @RequestMapping(value = "/anggota/cari")
    public String cariAnggota(){
        return "anggota/daftar_anggota";
    }

    @RequestMapping(value = "/anggota/update/{id}", method = RequestMethod.GET)
    public String updateAnggota(@PathVariable Integer id, Model model){
        model.addAttribute("anggota", serviceAnggota.getIdAnggota(id));
        return "anggota/form_anggota";
    }

    @RequestMapping(value = "/anggota/hapus/{id}", method = RequestMethod.GET)
    public String hapusAnggota(@PathVariable Integer id){
        serviceAnggota.hapus(id);
        return "redirect:/anggota";
    }

    @RequestMapping(value = "/anggota/form")
    public String formAnggota(Model model){
        model.addAttribute("anggota", new ModelAnggota());
        return "anggota/form_anggota";
    }
}
