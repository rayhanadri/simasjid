package com.skripsi.simasjid.services;

import com.skripsi.simasjid.model.ModelNotulensi;
import org.springframework.data.jpa.repository.JpaRepository;

public interface ServiceNotulensi extends JpaRepository<ModelNotulensi, Integer> {

}
