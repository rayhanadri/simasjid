package com.skripsi.simasjid.rest;

import com.skripsi.simasjid.model.ModelPekerjaan;
import com.skripsi.simasjid.services.ServicePekerjaan;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import java.util.List;

@RestController
@RequestMapping("/rest/pekerjaan")
public class RestPekerjaan {

    @Autowired
    ServicePekerjaan servicePekerjaan;

    @GetMapping("/all")
    public List<ModelPekerjaan> getAll() {
        return servicePekerjaan.findAll();
    }
}
