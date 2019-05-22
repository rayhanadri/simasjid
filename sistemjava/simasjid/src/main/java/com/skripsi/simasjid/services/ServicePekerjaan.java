package com.skripsi.simasjid.services;

import com.skripsi.simasjid.model.ModelAnggota;
import com.skripsi.simasjid.model.ModelPekerjaan;
import com.skripsi.simasjid.model.ModelProgresPekerjaan;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import java.util.List;

public interface ServicePekerjaan{

    List<ModelPekerjaan> listPekerjaan();
    List<ModelProgresPekerjaan> getProgresById(Integer id);

    ModelPekerjaan saveOrUpdate(ModelPekerjaan pekerjaan);
    void hapus(Integer id);
    ModelPekerjaan getDetailById(Integer id);


}
