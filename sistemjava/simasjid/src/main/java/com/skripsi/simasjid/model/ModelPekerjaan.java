package com.skripsi.simasjid.model;

import javax.persistence.*;
import java.util.HashSet;
import java.util.List;
import java.util.Set;

@Entity
@Table(name="pekerjaan")
public class ModelPekerjaan {

    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    @Column(name = "id_pekerjaan")
    private Integer id;

    @Column(name = "id_anggota")
    private Integer anggota;

    @Column(name = "id_status",columnDefinition = "integer DEFAULT 0")
    private String idStatus;

    @Column(name = "nama_pekerjaan")
    private String namaPekerjaan;

    private String deskripsi;

    @Column(columnDefinition = "integer DEFAULT 0")
    private Integer aktif;

    @OneToMany(cascade = CascadeType.ALL)
    @JoinColumn(name = "id_pekerjaan", referencedColumnName = "id_pekerjaan")
    private List<ModelDetailProgres> detailProgres;

    public List<ModelDetailProgres> getDetailProgres() {
        return detailProgres;
    }

    public void setDetailProgres(List<ModelDetailProgres> detailProgres) {
        this.detailProgres = detailProgres;
    }

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
