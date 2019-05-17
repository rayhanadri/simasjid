package com.skripsi.simasjid.services;

import com.skripsi.simasjid.model.ModelAnggota;

import java.util.List;

public interface ServiceAnggota {

    List<ModelAnggota> listAnggota();
    ModelAnggota saveOrUpdate(ModelAnggota mahasiswa);
    void hapus(Integer id);
    ModelAnggota getIdAnggota(Integer id);

}
