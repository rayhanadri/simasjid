package com.skripsi.simasjid.services;

import com.skripsi.simasjid.model.ModelAnggota;
import com.skripsi.simasjid.model.ModelPekerjaan;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.ui.Model;

import java.util.List;

public interface ServiceAnggota2 extends JpaRepository<ModelAnggota, Integer> {
    ModelAnggota findByUsername(String UserName);
}
