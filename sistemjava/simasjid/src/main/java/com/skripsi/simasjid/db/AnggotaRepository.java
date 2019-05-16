package com.skripsi.simasjid.db;

import com.skripsi.simasjid.model.ModelAnggota;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface AnggotaRepository extends JpaRepository<ModelAnggota, Long> {
    ModelAnggota cariBerdasarkanUsername(String username);

}
