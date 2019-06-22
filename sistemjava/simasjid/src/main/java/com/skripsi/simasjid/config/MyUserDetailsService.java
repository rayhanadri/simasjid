package com.skripsi.simasjid.config;

import com.skripsi.simasjid.model.ModelAnggota;
import com.skripsi.simasjid.services.ServiceAnggota;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.core.userdetails.User;
import org.springframework.security.core.userdetails.UserDetails;
import org.springframework.security.core.userdetails.UserDetailsService;
import org.springframework.security.core.userdetails.UsernameNotFoundException;
import org.springframework.stereotype.Service;

@Service
public class MyUserDetailsService implements UserDetailsService {

    @Autowired
    ServiceAnggota serviceAnggota;

    public MyUserDetailsService() {
    }

    @Override
    public UserDetails loadUserByUsername(String username) throws UsernameNotFoundException {
        ModelAnggota user = serviceAnggota.findByUsername(username);
        if (user == null) {
            throw new UsernameNotFoundException("User not found by name: " + username);
        }
        UserDetails ud = User.builder()
                .username(username)
                // This should contain the hashed password for the requested user
                .password(user.getPassword())
                // If you don't need roles, just provide a default one, eg. "USER"
                .roles("USER")
                .build();


        return ud;
    }
}