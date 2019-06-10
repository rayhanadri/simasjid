package com.skripsi.simasjid.controller;

import com.skripsi.simasjid.model.ModelAnggota;
import com.skripsi.simasjid.model.ModelPekerjaan;
import com.skripsi.simasjid.services.ServiceAnggota;
import com.skripsi.simasjid.services.ServicePekerjaan;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

@Controller
public class ControllerPekerjaan {

//    private ServicePekerjaan servicePekerjaan;

    private ServiceAnggota serviceAnggota;

//    @Autowired
//    public void setServicePekerjaan(ServicePekerjaan servicePekerjaan) {
//        this.servicePekerjaan = servicePekerjaan;
//    }

    @Autowired
    public void setServiceAnggota(ServiceAnggota mahasiswaService) {
        this.serviceAnggota = mahasiswaService;
    }

    @RequestMapping("/pekerjaan")
    public String index(Model model){
//        model.addAttribute("pekerjaans",servicePekerjaan.listPekerjaan());
        return "pekerjaan/daftar_pekerjaan";
    }

    @RequestMapping(value = "/pekerjaan/detail/{id}", method = RequestMethod.GET)
    public String lihatDetailPekerjaan(@PathVariable Integer id, Model model){
//        model.addAttribute("pekerjaans", servicePekerjaan.getDetailById(id));
        return "pekerjaan/detail_pekerjaan";
    }

    @RequestMapping(value = "/pekerjaan/simpan", method = RequestMethod.POST)
    public String simpanBaru(Model model, ModelPekerjaan pekerjaan){
        System.out.println("Cek Pekerjaan : "+pekerjaan.getNamaPekerjaan());
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
//        model.addAttribute("pekerjaan", servicePekerjaan.getDetailById(id));
        model.addAttribute("anggotas",serviceAnggota.listAnggota());
        return "pekerjaan/form_pekerjaan";
    }

    @RequestMapping("/pekerjaan/hapus")
    public String hapusPekerjaan(){
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
        model.addAttribute("pekerjaan", new ModelPekerjaan());
        model.addAttribute("anggotas",serviceAnggota.listAnggota());
        return "pekerjaan/form_pekerjaan";
    }
}
