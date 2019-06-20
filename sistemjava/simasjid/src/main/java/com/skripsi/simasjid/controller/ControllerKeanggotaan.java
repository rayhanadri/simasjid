package com.skripsi.simasjid.controller;

import com.skripsi.simasjid.model.ModelAnggota;
import com.skripsi.simasjid.services.ServiceAnggota2;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.crypto.bcrypt.BCryptPasswordEncoder;
import org.springframework.security.crypto.password.PasswordEncoder;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

import java.util.ArrayList;
import java.util.List;

@Controller
public class ControllerKeanggotaan {

    @Autowired
    private ServiceAnggota2 serviceAnggota2;

    private PasswordEncoder passwordEncoder;

    @RequestMapping(value = "/anggota")
    public String index(Model model) {
        List<ModelAnggota> maList = serviceAnggota2.findAll();
        List<ModelAnggota> maUsed = new ArrayList<>();

        for (ModelAnggota ma : maList) {
            if (ma.getAktif() == 1) {
                maUsed.add(ma);
            }
        }
        model.addAttribute("anggotas", maUsed);

        return "anggota/daftar_anggota";
    }

    @RequestMapping(value = "/anggota/simpan", method = RequestMethod.POST)
    public String simpanBaru(Model model, ModelAnggota anggota) {
//        model.addAttribute("anggotas", serviceAnggota.saveOrUpdate(anggota));
        anggota.setAktif(1);
        if (anggota.getId() == null) {
            String password = anggota.getPassword();
            String encodedPassword = new BCryptPasswordEncoder().encode(password);
            anggota.setPassword(encodedPassword);
        }

        model.addAttribute("anggotas", serviceAnggota2.save(anggota));
        return "redirect:/anggota";
    }

    @RequestMapping(value = "/anggota/resetpassword", method = RequestMethod.POST)
    public String resetPassword(Model model, ModelAnggota anggota) {
//        model.addAttribute("anggotas", serviceAnggota.saveOrUpdate(anggota));
        anggota.setAktif(1);
        String password = anggota.getPassword();
        String encodedPassword = new BCryptPasswordEncoder().encode(password);
        anggota.setPassword(encodedPassword);
        model.addAttribute("anggotas", serviceAnggota2.save(anggota));
        return "redirect:/anggota";
    }

    @RequestMapping(value = "/anggota/update/{id}", method = RequestMethod.GET)
    public String updateAnggota(@PathVariable Integer id, Model model) {
        model.addAttribute("formbaru", '0');
        model.addAttribute("anggota", serviceAnggota2.getOne(id));
        return "anggota/form_anggota";
    }

    @RequestMapping(value = "/anggota/hapus/{id}", method = RequestMethod.GET)
    public String hapusAnggota(@PathVariable Integer id) {
        System.out.println("Hapus " + id);
        ModelAnggota ma = serviceAnggota2.getOne(id);
        ma.setAktif(0);
        serviceAnggota2.save(ma);
        return "redirect:/anggota";
    }

    @RequestMapping(value = "/anggota/form")
    public String formAnggota(Model model) {
        model.addAttribute("formbaru", 1);
        model.addAttribute("anggota", new ModelAnggota());
        return "anggota/form_anggota";
    }
}
