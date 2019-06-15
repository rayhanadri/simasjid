package com.skripsi.simasjid.model;

import javax.persistence.*;

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

    @Column(name = "keputusan")
    private String keputusan;

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
}
