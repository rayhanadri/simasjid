package com.skripsi.simasjid.model;

import javax.persistence.*;
import java.text.SimpleDateFormat;
import java.util.Date;

@Entity
@Table(name="detail_progres")
public class ModelDetailProgres {

    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    @Column(name = "id_detail_progres")
    private Integer id;

    @Column(name = "id_notulensi")
    private Integer notulensi;

    @Column(name = "id_pekerjaan")
    private Integer pekerjaan;

    @Column(name = "keterangan")
    private String keterangan;

    @Column(name = "masukkan")
    private String masukkan;

    @Column(name = "keputusan")
    private String keputusan;

    private Date created;

    @Transient
    private String namaPekerjaan;

    @Transient
    private String convertedDate;

    @PrePersist
    protected void onCreate() {
        created = new Date();
    }

    public String getKeputusan() {
        return keputusan;
    }

    public void setKeputusan(String keputusan) {
        this.keputusan = keputusan;
    }

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    public Integer getNotulensi() {
        return notulensi;
    }

    public void setNotulensi(Integer notulensi) {
        this.notulensi = notulensi;
    }

    public Integer getPekerjaan() {
        return pekerjaan;
    }

    public void setPekerjaan(Integer pekerjaan) {
        this.pekerjaan = pekerjaan;
    }

    public String getKeterangan() {
        return keterangan;
    }

    public void setKeterangan(String keterangan) {
        this.keterangan = keterangan;
    }

    public String getNamaPekerjaan() {
        return namaPekerjaan;
    }

    public void setNamaPekerjaan(String namaPekerjaan) {
        this.namaPekerjaan = namaPekerjaan;
    }

    public String getMasukkan() {
        return masukkan;
    }

    public void setMasukkan(String masukkan) {
        this.masukkan = masukkan;
    }

    public Date getCreated() {
        return created;
    }

    public void setCreated(Date created) {
        this.created = created;
    }

    public String getConvertedDate() {
        return convertedDate;
    }

    public void setConvertedDate(Date date) {
        System.out.println("date : "+ date);
        SimpleDateFormat format = new SimpleDateFormat("yyyy-MM-dd");
        try{
            this.convertedDate = format.format(date);
        } catch (Exception e){
            this.convertedDate = "-";
        }
    }
}
