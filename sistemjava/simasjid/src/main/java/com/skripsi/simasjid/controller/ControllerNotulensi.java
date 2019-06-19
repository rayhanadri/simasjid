package com.skripsi.simasjid.controller;

import com.skripsi.simasjid.model.*;
import com.skripsi.simasjid.services.*;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.*;

import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.*;

@Controller
public class ControllerNotulensi {

    @Autowired
    private ServicePekerjaan servicePekerjaan;

    @Autowired
    private ServiceNotulensi serviceNotulensi;

    @Autowired
    private ServiceKomentarNotulensi serviceKomentarNotulensi;

    @Autowired
    private ServiceDetailProgres serviceDetailProgres;

    @Autowired
    private ServiceAnggota2 serviceAnggota2;

    /*Iterasi Dalam 1*/

    @RequestMapping("/notulensi")
    public String index(Model model){
        List<ModelNotulensi> data = serviceNotulensi.findAll();
        for (ModelNotulensi mn: data) {
            System.out.println("MA get by id : "+mn.getIdAmir());
            ModelAnggota ma = serviceAnggota2.getOne(mn.getIdAmir());
            mn.setNamaAmirMusyawarah(ma.getNama());
            mn.setConvertedDate(mn.getCreated());
        }

        model.addAttribute("notulensis",data);
        return "notulensi/daftar_notulensi";
    }

    @RequestMapping("/notulensi/buat")
    public String buatNotulensi(Model model){
        model.addAttribute("anggotas", getAnggotaAktif());
        model.addAttribute("pekerjaans",getPekerjaanAktif());
        return "notulensi/form_notulensi";
    }

    @RequestMapping("/notulensi/edit/{id}")
    public String editNotulensi(@PathVariable Integer id, Model model){
        model.addAttribute("anggotas", getAnggotaAktif());
        ModelNotulensi mn = serviceNotulensi.getOne(id);
        System.out.println("Cek id mn : "+mn.getId());
        model.addAttribute("notulensi", mn);

        model.addAttribute("progress", getProgres(id));
        return "notulensi/form_notulensi_edit";
    }

    @RequestMapping("/notulensi/simpan")
    public String simpanNotulensi(){
        return "redirect:/notulensi";
    }

    @RequestMapping(value = "/notulensi/simpankomentar" , method = RequestMethod.POST)
    public String komentarNotulensi(@ModelAttribute("ModelKomentarNotulensi") ModelKomentarNotulensi mk, BindingResult result){
        System.out.println("id notulensi "+mk.getNotulensi());
        System.out.println("id anggota "+mk.getAnggota());
        serviceKomentarNotulensi.save(mk);
        return "notulensi/detail/"+mk.getNotulensi();
    }

    @RequestMapping(value = "/notulensi/detail/{id}", method = RequestMethod.GET)
    public String detailNotulensi(@PathVariable Integer id, Model model){
        ModelNotulensi mn = serviceNotulensi.getOne(id);
        mn.setNamaAmirMusyawarah(serviceAnggota2.getOne(mn.getIdAmir()).getNama());
        mn.setNamaNotulen(serviceAnggota2.getOne(mn.getIdNotulen()).getNama());
        mn.setConvertedDate(mn.getCreated());
        System.out.println("Cek id mn : "+mn.getId());
        model.addAttribute("notulensi", mn);

        model.addAttribute("progress", getProgres(id));

        List<ModelKomentarNotulensi> listKomentar = serviceKomentarNotulensi.findAll();
        List<ModelKomentarNotulensi> listKomentarUsed = new ArrayList<>();
        for (ModelKomentarNotulensi mk: listKomentar) {
            if (mk.getNotulensi() == id){
                mk.setNamaAnggota(serviceAnggota2.getOne(mk.getAnggota()).getNama());
                mk.setConvertedDate(mk.getCreated());
                listKomentarUsed.add(mk);
            }
        }
        model.addAttribute("komentars", listKomentarUsed);
        return "notulensi/detail_notulensi";
    }

    @RequestMapping("/notulensi/hapus/{id}")
    public String hapusNotulensi(@PathVariable Integer id){
        serviceNotulensi.deleteById(id);
        return "redirect:/notulensi";
    }

    /*Iterasi Luar 2*/

    @RequestMapping(value = "/notulensi/setStatus/{idNotulensi}/{idStatus}", method = RequestMethod.GET)
    public String setStatusNotulensi(@PathVariable Integer idNotulensi, @PathVariable Integer idStatus){
        ModelNotulensi mn = serviceNotulensi.getOne(idNotulensi);
        mn.setIdStatus(idStatus);
        serviceNotulensi.save(mn);
        return "redirect:/notulensi/detail/"+idNotulensi;
    }

    @RequestMapping(value = "/notulensi/cari", method = RequestMethod.GET)
    public String formNotulensi(Model model){
        model.addAttribute("pekerjaans",getPekerjaanAktif());
        return "notulensi/form_cari_notulensi";
    }

    /*@RequestMapping(value = "/notulensi/cari/{tanggal}/{pekerjaan}/{keyword}", method = RequestMethod.GET)
    public String cariNotulensi(Model model, @PathVariable String tanggal, @PathVariable String pekerjaan, @PathVariable String keyword){
        model.addAttribute("pekerjaans",getPekerjaanAktif());
        System.out.println("Data "+getListingNotulensi(tanggal, pekerjaan, keyword));
        model.addAttribute("notulensis",getListingNotulensi(tanggal, pekerjaan, keyword));
        return "notulensi/form_cari_notulensi";
    }*/

    /*GET LIST*/

    private List<ModelAnggota> getAnggotaAktif(){
        List<ModelAnggota> maList = serviceAnggota2.findAll();
        List<ModelAnggota> maUsed = new ArrayList<>();
        for (ModelAnggota ma: maList) {
            if (ma.getAktif() == 1){
                maUsed.add(ma);
            }
        }
        return maUsed;
    }

    private List<ModelDetailProgres> getProgres(int id){
        List<ModelDetailProgres> listDetailProgres = serviceDetailProgres.findAll();
        List<ModelDetailProgres> listDpUsed = new ArrayList<>();
        for (ModelDetailProgres mdp: listDetailProgres) {

            if (mdp.getNotulensi() == id){
                mdp.setNamaPekerjaan(servicePekerjaan.getOne(mdp.getPekerjaan()).getNamaPekerjaan());
                listDpUsed.add(mdp);
            }
        }
        return listDpUsed;
    }

    private List<ModelPekerjaan> getPekerjaanAktif() {
        List<ModelPekerjaan> modelPekerjaanList = servicePekerjaan.findAll();
        List<ModelPekerjaan> data = new ArrayList<>();
        for (ModelPekerjaan mp : modelPekerjaanList) {
            if (mp.getAktif() == 1){
                data.add(mp);
            }
        }
        return data;
    }

    /*private List<ModelNotulensi> getListingNotulensi(String tanggal, String pekerjaan, String keywords){
        Date awal = new Date();
        Date akhir= new Date();;
        String[] keyword = {""};

        boolean issetDate = false;
        boolean issetDateAkhir = false;
        boolean issetPekerjaan = false;
        boolean issetKeywords = false;

        System.out.println("Tanggal : "+tanggal);
        System.out.println("Pekerjaan : "+pekerjaan);
        System.out.println("Keyword : "+keywords);

        if (!tanggal.equalsIgnoreCase("-")){
            System.out.println("Cek tanggal ");
            if (tanggal.contains("-")){
                System.out.println("duo tanggal ");
                String[] tanggals = tanggal.split("-");
                try {
                    awal = new SimpleDateFormat("dd_MM_yyyy").parse(tanggals[0]);
                    akhir = new SimpleDateFormat("dd_MM_yyyy").parse(tanggals[1]);
                    issetDateAkhir = true;
                } catch (ParseException e) {
                    e.printStackTrace();
                }
            } else {
                System.out.println("single tanggal ");
                try {
                    awal = new SimpleDateFormat("dd_MM_yyyy").parse(tanggal);
                    System.out.println("Tanggal : "+awal.toString());
                } catch (ParseException e) {
                    e.printStackTrace();
                }
            }
            issetDate = true;
        }
        if(!pekerjaan.equalsIgnoreCase("-")){
            issetPekerjaan = true;
        }
        if(!keywords.equalsIgnoreCase("-")){
            keyword = keywords.split(" ");
            issetKeywords = true;
        }

        List<ModelNotulensi> modelNotulensiList = serviceNotulensi.findAll();
        List<ModelNotulensi> notulensiFilter = new ArrayList<ModelNotulensi>();
        List<ModelDetailProgres> tempDetaiProgres;

        for (ModelNotulensi nf: modelNotulensiList) {
            boolean addNotulen = false;

            if(issetKeywords){
//                System.out.println("Cek keyword");
                tempDetaiProgres = nf.getDetailProgres();
                for (ModelDetailProgres mdp: tempDetaiProgres) {
                    String keterangan;
                    try{
                        keterangan = mdp.getKeterangan().toLowerCase();
                    } catch (Exception e){
                        keterangan = "";
                    }
                    String masukkan;
                    try{
                        masukkan = mdp.getMasukkan().toLowerCase();
                    } catch (Exception e){
                        masukkan = "";
                    }
                    String keputusan;
                    try{
                        keputusan = mdp.getKeputusan().toLowerCase();
                    } catch (Exception e){
                        keputusan = "";
                    }
                    for (String key: keyword) {
                        *//*System.out.println("\n==== Cek id progres : "+mdp.getId());
                        System.out.println("Cek keyword : "+key);
                        System.out.println("Cek laporan : "+keterangan);
                        System.out.println("Cek masukkan : "+masukkan);
                        System.out.println("Cek keputusan : "+keputusan);*//*
                        if(keterangan.contains(key) || masukkan.contains(key) ||keputusan.contains(key)){
                            addNotulen = true;
                            if(nf.getKeyword() == null){
                                nf.setKeyword(key);
                            } else {
                                if(!nf.getKeyword().contains(key)){
                                    nf.setKeyword(nf.getKeyword()+" "+key);
                                }
                            }

                        }
                    }
                }
            }

            if(issetPekerjaan){
//                System.out.println("Cek pekerjaan");
                tempDetaiProgres = nf.getDetailProgres();
                for (ModelDetailProgres mdp: tempDetaiProgres) {
                    *//*System.out.println("Cek id pekerjaan : "+pekerjaan);
                    System.out.println("Cek id pekerjaan notulen : "+mdp.getPekerjaan().toString());*//*
                    if (mdp.getPekerjaan().toString().equalsIgnoreCase(pekerjaan)){
                        addNotulen = true;
                    }
                }
            }

            if(issetDate){
                Calendar calCreated = Calendar.getInstance();
                Calendar calAwal = Calendar.getInstance();
                Calendar calAkhir = Calendar.getInstance();
                if(issetDateAkhir){
                    calCreated.setTime(nf.getCreated());
                    calAwal.setTime(nf.getCreated());
                    calAkhir.setTime(nf.getCreated());
                    boolean sameDayAwal = calCreated.get(Calendar.DAY_OF_YEAR) == calAwal.get(Calendar.DAY_OF_YEAR) &&
                            calCreated.get(Calendar.YEAR) == calAwal.get(Calendar.YEAR);
                    boolean sameDayAkhir = calCreated.get(Calendar.DAY_OF_YEAR) == calAkhir.get(Calendar.DAY_OF_YEAR) &&
                            calCreated.get(Calendar.YEAR) == calAkhir.get(Calendar.YEAR);
                    if(nf.getCreated().before(awal) || nf.getCreated().after(akhir)){
                        if(sameDayAwal || sameDayAkhir){
                            addNotulen = true;
                        } else {
                            addNotulen = false;
                        }
                    } else {
                        addNotulen = true;
                    }
                } else{
                    calCreated.setTime(nf.getCreated());
                    calAwal.setTime(awal);
                    boolean sameDay = calCreated.get(Calendar.DAY_OF_YEAR) == calAwal.get(Calendar.DAY_OF_YEAR) &&
                            calCreated.get(Calendar.YEAR) == calAwal.get(Calendar.YEAR);

                    if(sameDay){
                        addNotulen = true;
                    } else {
                        addNotulen = false;
                    }
                }

            }


            if(addNotulen){
                nf.setConvertedDateCari(nf.getCreated());
                notulensiFilter.add(nf);
                System.out.println("Add : "+nf.getNamaMusyawarah());
            }
        }
        return notulensiFilter;
    }*/

}
