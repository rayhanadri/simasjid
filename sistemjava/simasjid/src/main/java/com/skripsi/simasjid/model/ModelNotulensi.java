package com.skripsi.simasjid.model;

import javax.persistence.*;
import java.util.List;

@Entity
@Table(name="master_notulensi")
public class ModelNotulensi {

    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    @Column(name = "id_notulensi")
    private Integer id;

    @Column(name = "id_amir")
    private Integer idAmir;

    @Column(name = "id_notulen")
    private Integer idNotulen;

    @Column(name = "id_status")
    private Integer idStatus;

    @OneToMany(cascade = CascadeType.ALL)
    @JoinColumn(name = "id_notulensi", referencedColumnName = "id_notulensi")
    private List<ModelDetailProgres> detailProgres;

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    public Integer getIdAmir() {
        return idAmir;
    }

    public void setIdAmir(Integer idAmir) {
        this.idAmir = idAmir;
    }

    public Integer getIdNotulen() {
        return idNotulen;
    }

    public void setIdNotulen(Integer idNotulen) {
        this.idNotulen = idNotulen;
    }

    public Integer getIdStatus() {
        return idStatus;
    }

    public void setIdStatus(Integer idStatus) {
        this.idStatus = idStatus;
    }

    public List<ModelDetailProgres> getDetailProgres() {
        return detailProgres;
    }

    public void setDetailProgres(List<ModelDetailProgres> detailProgres) {
        this.detailProgres = detailProgres;
    }
}
