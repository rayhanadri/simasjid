package com.skripsi.simasjid.model;

import javax.persistence.*;
import java.util.HashSet;
import java.util.Set;

@Entity
@Table(name="pekerjaan")
public class ModelPekerjaan {

    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    @Column(name = "pekerjaan_id")
    private Integer id;

    @Column(name = "anggota_id")
    private Integer anggota;

    @Column(name = "id_status",columnDefinition = "integer DEFAULT 0")
    private String idStatus;

    @Column(name = "nama_pekerjaan")
    private String namaPekerjaan;

    private String deskripsi;

    @Column(columnDefinition = "integer DEFAULT 0")
    private Integer aktif;

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    public Integer getAnggota() {
        return anggota;
    }

    public void setAnggota(Integer anggota) {
        this.anggota = anggota;
    }

    public String getIdStatus() {
        return idStatus;
    }

    public void setIdStatus(String idStatus) {
        this.idStatus = idStatus;
    }

    public String getNamaPekerjaan() {
        return namaPekerjaan;
    }

    public void setNamaPekerjaan(String namaPekerjaan) {
        this.namaPekerjaan = namaPekerjaan;
    }

    public String getDeskripsi() {
        return deskripsi;
    }

    public void setDeskripsi(String deskripsi) {
        this.deskripsi = deskripsi;
    }

    public Integer getAktif() {
        return aktif;
    }

    public void setAktif(Integer aktif) {
        this.aktif = aktif;
    }

}
