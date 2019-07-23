package com.skripsi.simasjid.rest;

import com.skripsi.simasjid.model.ModelAnggota;

import com.skripsi.simasjid.services.ServiceAnggota;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.crypto.bcrypt.BCryptPasswordEncoder;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
@RequestMapping("/rest/anggota")
public class RestAnggota {

    @Autowired
    ServiceAnggota serviceAnggota;

    @GetMapping("/all")
    public List<ModelAnggota> getAll() {
        return serviceAnggota.findAll();
    }

    @RequestMapping(value = "/cek/{username}", method = RequestMethod.GET)
    public String cekUsernameIsAvailable(@PathVariable String username) {
        List<ModelAnggota> modelAnggotaList = serviceAnggota.findAll();
        for (ModelAnggota ma: modelAnggotaList) {
            if (ma.getUsername().equalsIgnoreCase(username)){
                return "0";
            }
        }
        return "1";
    }

    @RequestMapping(value = "/cekActive/{username}", method = RequestMethod.GET)
    public String cekUsernameIsActive(@PathVariable String username) {
        List<ModelAnggota> modelAnggotaList = serviceAnggota.findAll();
        for (ModelAnggota ma: modelAnggotaList) {
            if (ma.getUsername().equalsIgnoreCase(username)){
                return ma.getAktif()+"";
            }
        }
        return "";
    }

    @RequestMapping(value = "/insert/{nama}/{username}/{password}/{jabatan}", method = RequestMethod.GET)
    public List<ModelAnggota> setNew(@PathVariable String nama, @PathVariable String username, @PathVariable String password, @PathVariable int jabatan) {
        ModelAnggota anggotaBaru = new ModelAnggota();
        anggotaBaru.setNama(nama);
        anggotaBaru.setIdJabatan(jabatan);
        anggotaBaru.setUsername(username);
        String encodedPassword = new BCryptPasswordEncoder().encode(password);
        anggotaBaru.setPassword(encodedPassword);
        anggotaBaru.setAktif(1);
        serviceAnggota.save(anggotaBaru);
        return serviceAnggota.findAll();
    }
}
