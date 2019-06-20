package com.skripsi.simasjid.services;

import com.skripsi.simasjid.model.ModelPekerjaan;
import org.springframework.data.jpa.repository.JpaRepository;

public interface ServicePekerjaan extends JpaRepository<ModelPekerjaan, Integer> {

}
