package com.skripsi.simasjid.controller;

import com.skripsi.simasjid.model.ModelAnggota;
import org.springframework.security.crypto.bcrypt.BCryptPasswordEncoder;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

import java.security.Principal;
import java.util.List;

@Controller
public class ControllerKeanggotaan extends BaseController{

    @RequestMapping(value = "/anggota")
    public String index(Model model, Principal principal) {
        String peran = role(principal);
        if(peran.equalsIgnoreCase("sekertaris")|| peran.equalsIgnoreCase("ketua")){
            List<ModelAnggota> maUsed = getAnggotaAktif();
            model.addAttribute("anggotas", maUsed);
            return "anggota/daftar_anggota";
        }
        return "akses_terbatas";
    }

    @RequestMapping(value = "/anggota/simpan", method = RequestMethod.POST)
    public String simpanBaru(Model model, ModelAnggota anggota) {
        anggota.setAktif(1);
        if (anggota.getId() == null) {
            String password = anggota.getPassword();
            String encodedPassword = new BCryptPasswordEncoder().encode(password);
            anggota.setPassword(encodedPassword);
        }

        model.addAttribute("anggotas", serviceAnggota.save(anggota));
        return "redirect:/anggota";
    }

    @RequestMapping(value = "/anggota/resetpassword", method = RequestMethod.POST)
    public String resetPassword(Model model, ModelAnggota anggota) {
        anggota.setAktif(1);
        String password = anggota.getPassword();
        String encodedPassword = new BCryptPasswordEncoder().encode(password);
        anggota.setPassword(encodedPassword);
        model.addAttribute("anggotas", serviceAnggota.save(anggota));
        return "redirect:/anggota";
    }

    @RequestMapping(value = "/anggota/update/{id}", method = RequestMethod.GET)
    public String updateAnggota(@PathVariable Integer id, Model model, Principal principal) {
        String peran = role(principal);
        if(peran.equalsIgnoreCase("sekertaris")|| peran.equalsIgnoreCase("ketua")){
            model.addAttribute("formbaru", '0');
            model.addAttribute("anggota", serviceAnggota.getOne(id));
            return "anggota/form_anggota";
        }
        return "akses_terbatas";
    }

    @RequestMapping(value = "/anggota/hapus/{id}", method = RequestMethod.GET)
    public String hapusAnggota(@PathVariable Integer id, Principal principal) {
        String peran = role(principal);
        if(!peran.equalsIgnoreCase("sekertaris") && !peran.equalsIgnoreCase("ketua")){
            return "akses_terbatas";
        }
        ModelAnggota ma = serviceAnggota.getOne(id);
        ma.setAktif(0);
        ma.setUsername("><");
        serviceAnggota.save(ma);
        return "redirect:/anggota";
    }

    @RequestMapping(value = "/anggota/form")
    public String formAnggota(Model model, Principal principal) {
        String peran = role(principal);
        if(peran.equalsIgnoreCase("sekertaris")|| peran.equalsIgnoreCase("ketua")){
            model.addAttribute("formbaru", 1);
            model.addAttribute("anggota", new ModelAnggota());
            return "anggota/form_anggota";
        }
        return "akses_terbatas";

    }

}
