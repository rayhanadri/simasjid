package com.skripsi.simasjid.model;

import javax.persistence.*;
import java.util.HashSet;
import java.util.Set;

@Entity
@Table(name="anggota")
public class ModelAnggota {

    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private Integer id;

    @Column(name = "id_jabatan")
    private Integer idJabatan;

    @OneToMany(mappedBy = "anggota", fetch = FetchType.LAZY)
    private Set<ModelPekerjaan> pekerjaans = new HashSet<>();;

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

    public Set<ModelPekerjaan> getPekerjaans() {
        return pekerjaans;
    }

    public void setPekerjaans(Set<ModelPekerjaan> pekerjaans) {
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
