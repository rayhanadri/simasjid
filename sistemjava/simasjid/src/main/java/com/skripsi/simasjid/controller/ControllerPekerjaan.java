package com.skripsi.simasjid.controller;

import com.skripsi.simasjid.services.ServicePekerjaan;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

@Controller
public class ControllerPekerjaan {

    private ServicePekerjaan servicePekerjaan;

    @Autowired
    public void setServicePekerjaan(ServicePekerjaan servicePekerjaan) {
        this.servicePekerjaan = servicePekerjaan;
    }

    @RequestMapping("/pekerjaan")
    public String index(Model model){
        model.addAttribute("pekerjaans",servicePekerjaan.listPekerjaan());
        return "pekerjaan/daftar_pekerjaan";
    }

    @RequestMapping(value = "/pekerjaan/detail", method = RequestMethod.GET)
    public String lihatDetailPekerjaan(Model model){
        return "pekerjaan/detail_pekerjaan";
    }

    @RequestMapping("/pekerjaan/simpan")
    public String simpanBaru(){
        return "redirect:/pekerjaan";
    }

    @RequestMapping("/pekerjaan/buatprogres")
    public String tambahUpdateProgres(){
        return "redirect:/pekerjaan/detail";
    }

    @RequestMapping("/pekerjaan/setselesai")
    public String setPekerjaanSelesai(){
        return "redirect:/pekerjaan/detail";
    }

    @RequestMapping("/pekerjaan/update")
    public String updateDataPekerjaan(){
        return "redirect:/pekerjaan/detail";
    }

    @RequestMapping("/pekerjaan/hapus")
    public String hapusPekerjaan(){
        return "redirect:/pekerjaan";
    }

    @RequestMapping("/pekerjaan/setstatus")
    public String setStatusPekerjaan(){
        return "redirect:/pekerjaan/detail";
    }

    @RequestMapping(value = "/pekerjaan/cari")
    public String cariPekerjaan(){
        return "pekerjaan/form_cari_pekerjaan";
    }


    @RequestMapping(value = "/pekerjaan/form")
    public String formAnggota(){
        return "pekerjaan/form_pekerjaan";
    }
}
