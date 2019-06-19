package com.skripsi.simasjid.rest;

import com.skripsi.simasjid.model.ModelDetailProgres;
import com.skripsi.simasjid.model.ModelPekerjaan;
import com.skripsi.simasjid.services.ServiceDetailProgres;
import com.skripsi.simasjid.services.ServicePekerjaan;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.MediaType;
import org.springframework.web.bind.annotation.*;

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
        List<ModelPekerjaan> modelPekerjaanList = servicePekerjaan.findAll();
        List<ModelPekerjaan> data = new ArrayList<>();
        for (ModelPekerjaan mp : modelPekerjaanList) {
            if (mp.getAktif() == 1){
                data.add(mp);
            }
        }
        return data;
    }

    @RequestMapping(value = "/simpan", method = RequestMethod.POST, consumes=MediaType.APPLICATION_JSON_VALUE)
    public String simpanPekerjaan(@RequestBody ModelPekerjaan modelPekerjaan){
        System.out.println("body : "+modelPekerjaan.getNamaPekerjaan());
        modelPekerjaan.setIdStatus("0");
        modelPekerjaan.setAktif(1);
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

    @RequestMapping(value = "/updateprogres", method = RequestMethod.POST, consumes = MediaType.APPLICATION_JSON_VALUE)
    public String updateProgres(@RequestBody List<ModelDetailProgres> detailProgres) {
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

    //setiap notulensi ke hapus, ternyata detailnya juga ikut kehapus. jadi yang bawah gaperlu diakses
    @GetMapping("/hapusDetailNotulensi/{id}")
    public String hapusDetailNotulensi(@PathVariable("id") final Integer id) {
        List<ModelDetailProgres> listDetailProgres = serviceDetailProgres.findAll();
        for (ModelDetailProgres mdp: listDetailProgres) {
            if (mdp.getNotulensi() == id){
                serviceDetailProgres.delete(mdp);
            }
        }
        return "berhasil";
    }

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

    @GetMapping("/cariProgresPekerjaanBy/{id}")
    public List<ModelDetailProgres> getProgresByIdPekerjaan(@PathVariable("id") final Integer id) {
        List<ModelDetailProgres> listDetailProgres = serviceDetailProgres.findAll();
        List<ModelDetailProgres> listKirim = new ArrayList<>();
        for (ModelDetailProgres mdp: listDetailProgres) {
            if (mdp.getPekerjaan() == id){
                listKirim.add(mdp);
            }
        }
        return listKirim;
    }

}
