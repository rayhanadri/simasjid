package com.skripsi.simasjid.dao;

import com.skripsi.simasjid.model.ModelAnggota;
import com.skripsi.simasjid.model.ModelPekerjaan;
import com.skripsi.simasjid.services.ServiceAnggota;
import com.skripsi.simasjid.services.ServicePekerjaan;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;
import java.util.List;

@Service
public class DaoPekerjaan implements ServicePekerjaan {

    private EntityManagerFactory emf;

    @Autowired
    public void setEmf(EntityManagerFactory emf) {
        this.emf = emf;
    }


    @Override
    public List<ModelPekerjaan> listPekerjaan() {
        EntityManager em = emf.createEntityManager();
        return em.createQuery("from ModelPekerjaan", ModelPekerjaan.class).getResultList();
    }

    @Override
    public ModelPekerjaan saveOrUpdate(ModelPekerjaan pekerjaan) {
        EntityManager em = emf.createEntityManager();
        em.getTransaction().begin();
        ModelPekerjaan saved = em.merge(pekerjaan);
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
    public ModelPekerjaan getIdAnggota(Integer id) {
        EntityManager em = emf.createEntityManager();
        return em.find(ModelPekerjaan.class, id);
    }
}
