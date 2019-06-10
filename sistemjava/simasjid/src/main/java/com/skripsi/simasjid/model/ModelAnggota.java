package com.skripsi.simasjid.model;

import javax.persistence.*;
import java.util.HashSet;
import java.util.List;
import java.util.Set;

@Entity
@Table(name="anggota")
public class ModelAnggota {

    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    @Column(name = "anggota_id")
    private Integer id;

    @Column(name = "id_jabatan")
    private Integer idJabatan;

    @OneToMany(cascade = CascadeType.ALL)
    @JoinColumn(name = "anggota_id", referencedColumnName = "anggota_id")
    private List<ModelPekerjaan> pekerjaans;

    private String nama;

    private String username;

    private String password;

    @Column(columnDefinition = "integer DEFAULT 0")
    private Integer aktif;

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    public Integer getIdJabatan() {
        return idJabatan;
    }

    public void setIdJabatan(Integer idJabatan) {
        this.idJabatan = idJabatan;
    }

    public List<ModelPekerjaan> getPekerjaans() {
        return pekerjaans;
    }

    public void setPekerjaans(List<ModelPekerjaan> pekerjaans) {
        this.pekerjaans = pekerjaans;
    }

    public String getNama() {
        return nama;
    }

    public void setNama(String nama) {
        this.nama = nama;
    }

    public String getUsername() {
        return username;
    }

    public void setUsername(String username) {
        this.username = username;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public Integer getAktif() {
        return aktif;
    }

    public void setAktif(Integer aktif) {
        this.aktif = aktif;
    }
}
