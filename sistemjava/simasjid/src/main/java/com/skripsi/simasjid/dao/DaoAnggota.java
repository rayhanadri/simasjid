package com.skripsi.simasjid.dao;

import com.skripsi.simasjid.model.ModelAnggota;
import com.skripsi.simasjid.services.ServiceAnggota;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.ui.Model;

import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;
import java.util.List;

@Service
public class DaoAnggota implements ServiceAnggota {

    private EntityManagerFactory emf;

    @Autowired
    public void setEmf(EntityManagerFactory emf) {
        this.emf = emf;
    }


    @Override
    public List<ModelAnggota> listAnggota() {
        //entity manajer untuk ngambil data nya
        EntityManager em = emf.createEntityManager();
        /*create query buat ambil result list mahasiswa*/
        return em.createQuery("from ModelAnggota", ModelAnggota.class).getResultList();
    }

    @Override
    public ModelAnggota saveOrUpdate(ModelAnggota mahasiswa) {
        EntityManager em = emf.createEntityManager();
        em.getTransaction().begin();
        ModelAnggota saved = em.merge(mahasiswa);
        em.getTransaction().commit();
        return saved;
    }

    @Override
    public void hapus(Integer id) {
        EntityManager em = emf.createEntityManager();
        em.getTransaction().begin();
        em.remove(em.find(ModelAnggota.class, id));
        em.getTransaction().commit();
    }

    @Override
    public ModelAnggota getIdAnggota(Integer id) {
        EntityManager em = emf.createEntityManager();
        return em.find(ModelAnggota.class, id);
    }
}
