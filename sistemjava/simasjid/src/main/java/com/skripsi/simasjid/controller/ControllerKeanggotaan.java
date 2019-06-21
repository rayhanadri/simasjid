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

import java.security.Principal;
import java.util.ArrayList;
import java.util.List;

@Controller
public class ControllerKeanggotaan {

    @Autowired
    private ServiceAnggota2 serviceAnggota2;

    private PasswordEncoder passwordEncoder;

    @RequestMapping(value = "/anggota")
    public String index(Model model, Principal principal) {
        List<ModelAnggota> maList = serviceAnggota2.findAll();
        List<ModelAnggota> maUsed = new ArrayList<>();

        for (ModelAnggota ma : maList) {
            if (ma.getAktif() == 1) {
                maUsed.add(ma);
            }
        }
        model.addAttribute("anggotas", maUsed);
        int previlege = cekUsername(principal.getName());
        if(previlege == 1 || previlege == 2){
            return "anggota/daftar_anggota";
        }
        return "akses_terbatas";
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
    public String updateAnggota(@PathVariable Integer id, Model model, Principal principal) {
        model.addAttribute("formbaru", '0');
        model.addAttribute("anggota", serviceAnggota2.getOne(id));
        int previlege = cekUsername(principal.getName());
        if(previlege == 1 || previlege == 2){
            return "anggota/form_anggota";
        }
        return "akses_terbatas";
    }

    @RequestMapping(value = "/anggota/hapus/{id}", method = RequestMethod.GET)
    public String hapusAnggota(@PathVariable Integer id, Principal principal) {
        int previlege = cekUsername(principal.getName());
        if(previlege != 1 && previlege != 2){
            return "akses_terbatas";
        }

        System.out.println("Hapus " + id);
        ModelAnggota ma = serviceAnggota2.getOne(id);
        ma.setAktif(0);
        serviceAnggota2.save(ma);
        return "redirect:/anggota";
    }

    @RequestMapping(value = "/anggota/form")
    public String formAnggota(Model model, Principal principal) {
        model.addAttribute("formbaru", 1);
        model.addAttribute("anggota", new ModelAnggota());
        int previlege = cekUsername(principal.getName());
        if(previlege == 1 || previlege == 2){
            return "anggota/form_anggota";
        }
        return "akses_terbatas";

    }

    private int cekUsername(String username){
        try{
            return getIdUsername(username);
        } catch (Exception e){
            return -1;
        }
    }

    private int getIdUsername(String username) throws Exception{
        return serviceAnggota2.findByUsername(username).getIdJabatan();
    }
}
