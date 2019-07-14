package com.skripsi.simasjid.controller;

import com.skripsi.simasjid.model.ModelAnggota;
import com.skripsi.simasjid.model.ModelDetailProgres;
import com.skripsi.simasjid.model.ModelPekerjaan;
import com.skripsi.simasjid.services.*;
import org.springframework.beans.factory.annotation.Autowired;

import java.security.Principal;
import java.util.ArrayList;
import java.util.List;

public class BaseController {

    @Autowired
    protected ServicePekerjaan servicePekerjaan;

    @Autowired
    protected ServiceNotulensi serviceNotulensi;

    @Autowired
    protected ServiceKomentarNotulensi serviceKomentarNotulensi;

    @Autowired
    protected ServiceDetailProgres serviceDetailProgres;

    @Autowired
    protected ServiceAnggota serviceAnggota;

    protected int cekRoleUsername(String username){
        try{
            return getIdJabatanByUsername(username);
        } catch (Exception e){
            return -1;
        }
    }

    protected int idLogged(Principal p){
        return getIdUserByUsername(p.getName());
    }

    protected String role(Principal p){
        int previlege = cekRoleUsername(p.getName());
        switch (previlege){
            case 1: {
                return "ketua";
            }
            case 2: {
                return "sekertaris";
            }
            case 3:{
                return "ketua rumah tangga";
            }
            default: {
                return "anggota";
            }
        }
    }

    protected int getIdJabatanByUsername(String username) throws Exception{
        return serviceAnggota.findByUsername(username).getIdJabatan();
    }

    protected int getIdUserByUsername(String username){
        return serviceAnggota.findByUsername(username).getId();
    }

    protected List<ModelAnggota> getAnggotaAktif() {
        List<ModelAnggota> maList = serviceAnggota.findAll();
        List<ModelAnggota> maUsed = new ArrayList<>();
        for (ModelAnggota ma : maList) {
            if (ma.getAktif() == 1) {
                maUsed.add(ma);
            }
        }
        return maUsed;
    }

    protected List<ModelDetailProgres> getProgres(int id) {
        List<ModelDetailProgres> listDetailProgres = serviceDetailProgres.findAll();
        List<ModelDetailProgres> listDpUsed = new ArrayList<>();
        for (ModelDetailProgres mdp : listDetailProgres) {
            try{
                if (mdp.getNotulensi() == id) {
                    mdp.setNamaPekerjaan(servicePekerjaan.getOne(mdp.getPekerjaan()).getNamaPekerjaan());
                    listDpUsed.add(mdp);
                }
            } catch (Exception e){
                System.out.println("Notulensi Gagal Masuk : "+e);
            }
        }
        return listDpUsed;
    }

    protected List<ModelPekerjaan> getPekerjaanAktif() {
        List<ModelPekerjaan> modelPekerjaanList = servicePekerjaan.findAll();
        List<ModelPekerjaan> data = new ArrayList<>();
        for (ModelPekerjaan mp : modelPekerjaanList) {
            if (mp.getAktif() == 1) {
                data.add(mp);
            }
        }
        return data;
    }

}
