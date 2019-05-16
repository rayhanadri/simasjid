package com.skripsi.simasjid.db;

import org.springframework.boot.CommandLineRunner;
import org.springframework.stereotype.Service;

@Service
public class DbInit implements CommandLineRunner {
    private  AnggotaRepository anggotaRepository;

    public DbInit(AnggotaRepository anggotaRepository){
        this.anggotaRepository = anggotaRepository;
    }

    @Override
    public void run(String... args) throws Exception {

    }
}
