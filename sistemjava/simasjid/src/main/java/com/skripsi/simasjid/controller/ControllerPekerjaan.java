package com.skripsi.simasjid.controller;

import com.skripsi.simasjid.model.ModelAnggota;
import com.skripsi.simasjid.model.ModelDetailProgres;
import com.skripsi.simasjid.model.ModelPekerjaan;
import com.skripsi.simasjid.services.ServiceAnggota;
import com.skripsi.simasjid.services.ServiceAnggota2;
import com.skripsi.simasjid.services.ServiceDetailProgres;
import com.skripsi.simasjid.services.ServicePekerjaan;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

import java.util.ArrayList;
import java.util.List;
import java.util.Optional;

@Controller
public class ControllerPekerjaan {

    @Autowired
    private ServicePekerjaan servicePekerjaan;

    @Autowired
    private ServiceDetailProgres serviceDetailProgres;

    @Autowired
    private ServiceAnggota2 serviceAnggota2;

    private ServiceAnggota serviceAnggota;

    @Autowired
    public void setServiceAnggota(ServiceAnggota mahasiswaService) {
        this.serviceAnggota = mahasiswaService;
    }

    @RequestMapping("/pekerjaan")
    public String index(Model model){
        return "pekerjaan/daftar_pekerjaan";
    }

    @RequestMapping(value = "/pekerjaan/detail/{id}", method = RequestMethod.GET)
    public String lihatDetailPekerjaan(@PathVariable Integer id, Model model){

        Optional <ModelPekerjaan> modelPekerjaan = servicePekerjaan.findById(id);
        String pic = serviceAnggota2.getOne(modelPekerjaan.get().getAnggota()).getNama();
        System.out.println("nama pekerjaan : "+modelPekerjaan.get().getNamaPekerjaan());
        model.addAttribute("namaPekerjaan", modelPekerjaan.get().getNamaPekerjaan());
        model.addAttribute("deskripsiPekerjaan", modelPekerjaan.get().getDeskripsi());
        model.addAttribute("statusPekerjaan", modelPekerjaan.get().getIdStatus());
        model.addAttribute("pic", pic);
        model.addAttribute("idPekerjaan", id);
        try{
            List<ModelDetailProgres> mdpList = serviceDetailProgres.findAll();
            List<ModelDetailProgres> mdpById = new ArrayList<>();
            for (ModelDetailProgres mdp: mdpList) {
                if (mdp.getPekerjaan() == id){
                    mdp.setConvertedDate(mdp.getCreated());
                    mdpById.add(mdp);
                }
            }
            System.out.println("Berhasil memasukkan prores");
            model.addAttribute("progress",mdpById);
        } catch (Exception e){
            System.out.println("ERROR : "+e);
            List<ModelDetailProgres> mdpList = new ArrayList<>();
            model.addAttribute("progress",mdpList);
        }

        return "pekerjaan/detail_pekerjaan";
    }

    @RequestMapping(value = "/pekerjaan/simpan", method = RequestMethod.POST)
    public String simpanPekerjaan(@ModelAttribute("ModelPekerjaan") ModelPekerjaan modelPekerjaan, BindingResult result){
        servicePekerjaan.save(modelPekerjaan);
        return "redirect:/pekerjaan";
    }

    @RequestMapping(value = "/pekerjaan/hapusprogres/{idPekerjaan}/{idProgres}", method = RequestMethod.GET)
    public String tambahUpdateProgres(@PathVariable Integer idPekerjaan,@PathVariable Integer idProgres){
        serviceDetailProgres.deleteById(idProgres);
        return "redirect:/pekerjaan/detail/"+idPekerjaan;
    }

    @RequestMapping("/pekerjaan/setselesai")
    public String setPekerjaanSelesai(){
        return "redirect:/pekerjaan/detail";
    }

    @RequestMapping(value = "/pekerjaan/edit/{id}", method = RequestMethod.GET)
    public String updateDataPekerjaan(@PathVariable Integer id, Model model){
        model.addAttribute("pekerjaan", servicePekerjaan.findById(id));
        model.addAttribute("anggotas",serviceAnggota.listAnggota());
        return "pekerjaan/form_pekerjaan";
    }

    @RequestMapping(value = "/pekerjaan/hapus/{id}", method = RequestMethod.GET)
    public String hapusPekerjaan(@PathVariable Integer id){
        servicePekerjaan.deleteById(id);
        return "redirect:/pekerjaan";
    }

    @RequestMapping("/pekerjaan/setstatus")
    public String setStatusPekerjaan(){
        return "redirect:/pekerjaan/detail";
    }

    @RequestMapping(value = "/pekerjaan/cari")
    public String cariPekerjaan(){
        return "pekerjaan/form_cari_pekerjaan";
    }


    @RequestMapping(value = "/pekerjaan/form")
    public String formAnggota(Model model){
        model.addAttribute("anggotas",serviceAnggota.listAnggota());
        model.addAttribute("pekerjaan", new ModelPekerjaan());
        return "pekerjaan/form_pekerjaan";
    }
}
