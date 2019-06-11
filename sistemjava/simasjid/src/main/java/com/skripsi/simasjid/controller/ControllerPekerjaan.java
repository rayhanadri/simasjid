package com.skripsi.simasjid.controller;

import com.skripsi.simasjid.model.ModelAnggota;
import com.skripsi.simasjid.model.ModelPekerjaan;
import com.skripsi.simasjid.services.ServiceAnggota;
import com.skripsi.simasjid.services.ServicePekerjaan;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

import java.util.Optional;

@Controller
public class ControllerPekerjaan {

    @Autowired
    private ServicePekerjaan servicePekerjaan;

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
        model.addAttribute("id", id);
        Optional <ModelPekerjaan> modelPekerjaan = servicePekerjaan.findById(id);
        System.out.println("nama pekerjaan : "+modelPekerjaan.get().getNamaPekerjaan());
        model.addAttribute("namaPekerjaan", modelPekerjaan.get().getNamaPekerjaan());
        model.addAttribute("deskripsiPekerjaan", modelPekerjaan.get().getDeskripsi());
        model.addAttribute("statusPekerjaan", modelPekerjaan.get().getIdStatus());
        return "pekerjaan/detail_pekerjaan";
    }

    @RequestMapping(value = "/pekerjaan/simpan", method = RequestMethod.POST)
    public String simpanPekerjaan(@ModelAttribute("ModelPekerjaan") ModelPekerjaan modelPekerjaan, BindingResult result){
        servicePekerjaan.save(modelPekerjaan);
        return "redirect:/pekerjaan";
    }

    @RequestMapping("/pekerjaan/buatprogres")
    public String tambahUpdateProgres(){
        return "redirect:/pekerjaan/detail";
    }

    @RequestMapping("/pekerjaan/setselesai")
    public String setPekerjaanSelesai(){
        return "redirect:/pekerjaan/detail";
    }

    @RequestMapping(value = "/pekerjaan/update/{id}", method = RequestMethod.GET)
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
        return "pekerjaan/form_pekerjaan";
    }
}
