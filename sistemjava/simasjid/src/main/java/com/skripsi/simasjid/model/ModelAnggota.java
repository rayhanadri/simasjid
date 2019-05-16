package com.skripsi.simasjid.model;

import javax.persistence.*;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;

@Entity
public class ModelAnggota {

    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private long id;

    @Column(nullable = false)
    private String username;

    @Column(nullable = false)
    private String password;

    private int aktif;

    private String roles;

    private String permissions;

    public ModelAnggota(String username, String password, Integer aktif, String roles, String permissions) {
        this.username = username;
        this.password = password;
        this.aktif = aktif;
        this.roles = roles;
        this.permissions = permissions;
    }

    protected ModelAnggota(){}

    public List<String> getRolesList(){
        if (this.roles.length() > 0 ){
            return Arrays.asList(this.roles.split(","));
        } return new ArrayList<>();
    }

    public List<String> getPermissionsList(){
        if (this.permissions.length() > 0 ){
            return Arrays.asList(this.permissions.split(","));
        } return new ArrayList<>();
    }

    public long getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getUsername() {
        return username;
    }

    public void setUsername(String username) {
        this.username = username;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public int getAktif() {
        return aktif;
    }

    public void setAktif(int aktif) {
        this.aktif = aktif;
    }

    public String getRoles() {
        return roles;
    }

    public void setRoles(String roles) {
        this.roles = roles;
    }

    public String getPermissions() {
        return permissions;
    }

    public void setPermissions(String permissions) {
        this.permissions = permissions;
    }
}
