package com.skripsi.simasjid.model;

import javax.persistence.*;
import java.text.SimpleDateFormat;
import java.util.Date;

@Entity
@Table(name = "komentar_notulensi")
public class ModelKomentarNotulensi {

    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    @Column(name = "id_komentar_notulensi")
    private Integer id;

    @Column(name = "id_notulensi")
    private Integer notulensi;

    @Column(name = "id_anggota")
    private Integer anggota;

    @Column(name = "keterangan")
    private String keterangan;

    private Date created;

    @Transient
    private String namaAnggota;

    @Transient
    private String convertedDate;

    @PrePersist
    protected void onCreate() {
        created = new Date();
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

    public String getKeterangan() {
        return keterangan;
    }

    public void setKeterangan(String keterangan) {
        this.keterangan = keterangan;
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
        System.out.println("date : " + date);
        SimpleDateFormat format = new SimpleDateFormat("yyyy-MM-dd");
        try {
            this.convertedDate = format.format(date);
        } catch (Exception e) {
            this.convertedDate = "-";
        }
    }

    public Integer getAnggota() {
        return anggota;
    }

    public void setAnggota(Integer anggota) {
        this.anggota = anggota;
    }

    public String getNamaAnggota() {
        return namaAnggota;
    }

    public void setNamaAnggota(String namaAnggota) {
        this.namaAnggota = namaAnggota;
    }
}
