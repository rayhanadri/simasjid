package com.skripsi.simasjid.rest;

import com.skripsi.simasjid.model.ModelAnggota;
import com.skripsi.simasjid.model.ModelPekerjaan;
import com.skripsi.simasjid.services.ServiceAnggota;
import com.skripsi.simasjid.services.ServiceAnggota2;
import com.skripsi.simasjid.services.ServicePekerjaan;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import java.util.List;

@RestController
@RequestMapping("/rest/anggota")
public class RestAnggota {

    @Autowired
    ServiceAnggota2 serviceAnggota;

    @GetMapping("/all")
    public List<ModelAnggota> getAll() {
        return serviceAnggota.findAll();
    }
}
