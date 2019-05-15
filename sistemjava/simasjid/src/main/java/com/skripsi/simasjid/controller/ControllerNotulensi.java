package com.skripsi.simasjid.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
@Controller
public class ControllerNotulensi {

    @RequestMapping("/notulensi")
    public String index(){
        return "notulensi/daftar_notulensi";
    }

    @RequestMapping("/notulensi/buat")
    public String buatNotulensi(){
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
        return "notulensi/daftar_notulensi";
    }

}
