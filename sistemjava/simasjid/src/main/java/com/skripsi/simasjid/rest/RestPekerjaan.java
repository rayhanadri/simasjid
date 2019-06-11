package com.skripsi.simasjid.rest;

import com.skripsi.simasjid.model.ModelPekerjaan;
import com.skripsi.simasjid.services.ServicePekerjaan;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.*;

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

//    @GetMapping("/find/{id}")
//    public ModelPekerjaan getId(@PathVariable("id") final Integer id) {
//        return servicePekerjaan.findById(id);
//    }

}
