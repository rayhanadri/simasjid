package com.skripsi.simasjid.rest;

import com.skripsi.simasjid.model.DetailProgresWrapper;
import com.skripsi.simasjid.model.ModelDetailProgres;
import com.skripsi.simasjid.model.ModelPekerjaan;
import com.skripsi.simasjid.services.ServiceDetailProgres;
import com.skripsi.simasjid.services.ServicePekerjaan;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.MediaType;
import org.springframework.http.ResponseEntity;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.*;

import java.net.URISyntaxException;
import java.util.ArrayList;
import java.util.List;

@RestController
@RequestMapping("/rest/pekerjaan")
public class RestPekerjaan {

    @Autowired
    ServicePekerjaan servicePekerjaan;

    @Autowired
    ServiceDetailProgres serviceDetailProgres;

    @GetMapping("/all")
    public List<ModelPekerjaan> getAll() {
        return servicePekerjaan.findAll();
    }

    @RequestMapping(value = "/simpan", method = RequestMethod.POST, consumes=MediaType.APPLICATION_JSON_VALUE)
    public String simpanPekerjaan(@RequestBody ModelPekerjaan modelPekerjaan){
        System.out.println("body : "+modelPekerjaan.getNamaPekerjaan());
        servicePekerjaan.save(modelPekerjaan);
        return ""+modelPekerjaan.getId();
    }

    @RequestMapping(value = "/simpanprogres", method = RequestMethod.POST, consumes = MediaType.APPLICATION_JSON_VALUE)
    public String simpanProgres(@RequestBody List<ModelDetailProgres> detailProgres) {
        for (ModelDetailProgres mdp : detailProgres){
            serviceDetailProgres.save(mdp);
        }
        return "succeed";
    }

    @GetMapping("/hapusProgresNotulensiBy/{id}")
    public String hapusProgresByIdNotulensi(@PathVariable("id") final Integer id) {
        try{
            List<ModelDetailProgres> listDetailProgres = serviceDetailProgres.findAll();
            for (ModelDetailProgres mdp: listDetailProgres) {
                if (mdp.getNotulensi() == id){
                    serviceDetailProgres.delete(mdp);
                }
            }
            return "Berhasil";
        } catch (Exception e){
            return "Gagal";
        }
    }

//    @GetMapping("/find/{id}")
//    public ModelPekerjaan getId(@PathVariable("id") final Integer id) {
//        return servicePekerjaan.findById(id);
//    }

    @GetMapping("/cariProgresNotulensiBy/{id}")
    public List<ModelDetailProgres> getProgresByIdNotulensi(@PathVariable("id") final Integer id) {
        List<ModelDetailProgres> listDetailProgres = serviceDetailProgres.findAll();
        List<ModelDetailProgres> listKirim = new ArrayList<>();
        for (ModelDetailProgres mdp: listDetailProgres) {
            if (mdp.getNotulensi() == id){
                listKirim.add(mdp);
            }
        }
        return listKirim;
    }

}
