package com.skripsi.simasjid.services;

import com.skripsi.simasjid.model.ModelNotulensi;
import com.skripsi.simasjid.model.ModelPekerjaan;
import org.springframework.data.jpa.repository.JpaRepository;

public interface ServiceNotulensi extends JpaRepository<ModelNotulensi, Integer> {

}
