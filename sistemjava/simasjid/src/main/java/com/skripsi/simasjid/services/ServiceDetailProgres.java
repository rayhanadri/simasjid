package com.skripsi.simasjid.services;

import com.skripsi.simasjid.model.ModelDetailProgres;
import com.skripsi.simasjid.model.ModelNotulensi;
import org.springframework.data.jpa.repository.JpaRepository;

public interface ServiceDetailProgres extends JpaRepository<ModelDetailProgres, Integer> {

}
