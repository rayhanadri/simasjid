package com.skripsi.simasjid.rest;

import com.skripsi.simasjid.model.ModelDetailProgres;
import com.skripsi.simasjid.model.ModelKomentarNotulensi;
import com.skripsi.simasjid.model.ModelNotulensi;
import com.skripsi.simasjid.services.ServiceKomentarNotulensi;
import com.skripsi.simasjid.services.ServiceNotulensi;
import com.skripsi.simasjid.services.ServicePekerjaan;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.MediaType;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.*;

import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.Date;
import java.util.List;

@RestController
@RequestMapping("/rest/notulensi")
public class RestNotulensi {

    @Autowired
    ServiceNotulensi serviceNotulensi;

    @Autowired
    ServiceKomentarNotulensi serviceKomentarNotulensi;

    @Autowired
    ServicePekerjaan servicePekerjaan;

    @GetMapping("/all")
    public List<ModelNotulensi> getAll() {
        return serviceNotulensi.findAll();
    }

    @RequestMapping(value = "/simpan", method = RequestMethod.POST, consumes = MediaType.APPLICATION_JSON_VALUE)
    public String simpanNotulensi(@RequestBody ModelNotulensi modelNotulensi) {
        System.out.println("body : " + modelNotulensi.getIdNotulen());
        serviceNotulensi.save(modelNotulensi);
        return "" + modelNotulensi.getId();
    }

    @RequestMapping(value = "/update", method = RequestMethod.POST, consumes = MediaType.APPLICATION_JSON_VALUE)
    public String updateNotulensi(@RequestBody ModelNotulensi modelNotulensi) {
        System.out.println("body : " + modelNotulensi.getIdNotulen());
        ModelNotulensi tempMn = serviceNotulensi.getOne(modelNotulensi.getId());
        modelNotulensi.setCreated(tempMn.getCreated());
        modelNotulensi.setKomentarNotulensi(tempMn.getKomentarNotulensi());
        serviceNotulensi.save(modelNotulensi);
        return "" + modelNotulensi.getId();
    }

    @GetMapping("/hapus/{id}")
    public String getId(@PathVariable("id") final Integer id) {
        try {
            serviceNotulensi.deleteById(id);
            return "Berhasil";
        } catch (Exception e) {
            return "Gagal";
        }
    }

    @RequestMapping(value = "/simpanKomentar", method = RequestMethod.POST, consumes = MediaType.APPLICATION_JSON_VALUE)
    public String simpanKomentarNotulensi(@RequestBody ModelKomentarNotulensi komentarNotulensi) {
        System.out.println("body : " + komentarNotulensi.getNotulensi());
        serviceKomentarNotulensi.save(komentarNotulensi);
        return "berhasil";
    }

    @RequestMapping(value = "/cari/{tanggal}/{pekerjaan}/{keyword}", method = RequestMethod.GET)
    public List<ModelNotulensi> cariNotulensi(Model model, @PathVariable String tanggal, @PathVariable String pekerjaan, @PathVariable String keyword) {
        return getListingNotulensi(tanggal, pekerjaan, keyword);
    }

    private List<ModelNotulensi> getListingNotulensi(String tanggal, String pekerjaan, String keywords) {
        Date awal = new Date();
        Date akhir = new Date();
        ;
        String[] keyword = {""};
        boolean issetDate = false;
        boolean issetDateAkhir = false;
        boolean issetPekerjaan = false;
        boolean issetKeywords = false;

        System.out.println("Tanggal : " + tanggal);
        System.out.println("Pekerjaan : " + pekerjaan);
        System.out.println("Keyword : " + keywords);

        if (!tanggal.equalsIgnoreCase("-")) {
            System.out.println("Cek tanggal ");
            if (tanggal.contains("-")) {
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
                    System.out.println("Tanggal : " + awal.toString());
                } catch (ParseException e) {
                    e.printStackTrace();
                }
            }
            issetDate = true;
        }
        if (!pekerjaan.equalsIgnoreCase("-")) {
            issetPekerjaan = true;
        }
        if (!keywords.equalsIgnoreCase("-")) {
            keyword = keywords.split(" ");
            issetKeywords = true;
        }

        List<ModelNotulensi> modelNotulensiList = serviceNotulensi.findAll();
        List<ModelNotulensi> notulensiFilter = new ArrayList<ModelNotulensi>();
        List<ModelDetailProgres> tempDetaiProgres;

        for (ModelNotulensi nf : modelNotulensiList) {
            boolean addNotulen = false;

            if (issetKeywords) {

                String tempCatatan = nf.getCatatan().toLowerCase();
                for (String key : keyword) {
                    if (tempCatatan.contains(key)) {
                        addNotulen = true;
                    }
                }

                tempDetaiProgres = nf.getDetailProgres();
                for (ModelDetailProgres mdp : tempDetaiProgres) {
                    String keterangan;
                    try {
                        keterangan = mdp.getKeterangan().toLowerCase();
                    } catch (Exception e) {
                        keterangan = "";
                    }
                    String masukkan;
                    try {
                        masukkan = mdp.getMasukkan().toLowerCase();
                    } catch (Exception e) {
                        masukkan = "";
                    }
                    String keputusan;
                    try {
                        keputusan = mdp.getKeputusan().toLowerCase();
                    } catch (Exception e) {
                        keputusan = "";
                    }
                    String namaPekerjaan = servicePekerjaan.getOne(mdp.getPekerjaan()).getNamaPekerjaan();
                    try {
                        namaPekerjaan = namaPekerjaan.toLowerCase();
                    } catch (Exception e) {
                        namaPekerjaan = "";
                    }

                    for (String key : keyword) {
                        if (keterangan.contains(key) || masukkan.contains(key) || keputusan.contains(key) || namaPekerjaan.contains(key)) {
                            addNotulen = true;
                            if (nf.getKeyword() == null) {
                                nf.setKeyword(key);
                            } else {
                                if (!nf.getKeyword().contains(key)) {
                                    nf.setKeyword(nf.getKeyword() + " " + key);
                                }
                            }
                        }
                    }
                }
            }

            if (issetPekerjaan) {
//                System.out.println("Cek pekerjaan");
                tempDetaiProgres = nf.getDetailProgres();
                for (ModelDetailProgres mdp : tempDetaiProgres) {
                    /*System.out.println("Cek id pekerjaan : "+pekerjaan);
                    System.out.println("Cek id pekerjaan notulen : "+mdp.getPekerjaan().toString());*/
                    if (mdp.getPekerjaan().toString().equalsIgnoreCase(pekerjaan)) {
                        addNotulen = true;
                    }
                }
            }

            if (issetDate) {
                Calendar calCreated = Calendar.getInstance();
                Calendar calAwal = Calendar.getInstance();
                Calendar calAkhir = Calendar.getInstance();
                if (issetDateAkhir) {
                    calCreated.setTime(nf.getCreated());
                    calAwal.setTime(nf.getCreated());
                    calAkhir.setTime(nf.getCreated());
                    boolean sameDayAwal = calCreated.get(Calendar.DAY_OF_YEAR) == calAwal.get(Calendar.DAY_OF_YEAR) &&
                            calCreated.get(Calendar.YEAR) == calAwal.get(Calendar.YEAR);
                    boolean sameDayAkhir = calCreated.get(Calendar.DAY_OF_YEAR) == calAkhir.get(Calendar.DAY_OF_YEAR) &&
                            calCreated.get(Calendar.YEAR) == calAkhir.get(Calendar.YEAR);
                    if (nf.getCreated().before(awal) || nf.getCreated().after(akhir)) {
                        if (sameDayAwal || sameDayAkhir) {
                            addNotulen = true;
                        } else {
                            addNotulen = false;
                        }
                    } else {
                        addNotulen = true;
                    }
                } else {
                    calCreated.setTime(nf.getCreated());
                    calAwal.setTime(awal);
                    boolean sameDay = calCreated.get(Calendar.DAY_OF_YEAR) == calAwal.get(Calendar.DAY_OF_YEAR) &&
                            calCreated.get(Calendar.YEAR) == calAwal.get(Calendar.YEAR);
                    if (sameDay) {
                        addNotulen = true;
                    } else {
                        addNotulen = false;
                    }
                }

            }
            if (addNotulen) {
                nf.setConvertedDateCari(nf.getCreated());
                notulensiFilter.add(nf);
                System.out.println("Add : " + nf.getNamaMusyawarah());
            }
        }
        return notulensiFilter;
    }

}
