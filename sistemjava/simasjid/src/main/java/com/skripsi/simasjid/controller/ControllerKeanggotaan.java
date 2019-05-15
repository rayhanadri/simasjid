package com.skripsi.simasjid.controller;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;

@Controller
public class ControllerKeanggotaan {

    @RequestMapping(value = "/anggota")
    public String index(){
        return "anggota/daftar_anggota";
    }

    @RequestMapping(value = "/anggota/simpan")
    public String simpanBaru(){
        return "anggota/daftar_anggota";
    }

    @RequestMapping(value = "/anggota/cari")
    public String cariAnggota(){
        return "anggota/daftar_anggota";
    }

    @RequestMapping(value = "/anggota/update")
    public String updateAnggota(){
        return "anggota/daftar_anggota";
    }

    @RequestMapping(value = "/anggota/hapus")
    public String hapusAnggota(){
        return "anggota/daftar_anggota";
    }

    @RequestMapping(value = "/anggota/form")
    public String formAnggota(){
        return "anggota/form_anggota";
    }
}
