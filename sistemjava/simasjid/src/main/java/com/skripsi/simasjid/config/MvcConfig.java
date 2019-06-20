package com.skripsi.simasjid.config;

import org.springframework.context.annotation.Configuration;
import org.springframework.web.servlet.config.annotation.ViewControllerRegistry;
import org.springframework.web.servlet.config.annotation.WebMvcConfigurer;

/*WebMvcConfigurer : semua aktifitas aplikasi melewati web mvc configurer*/
@Configuration
public class MvcConfig implements WebMvcConfigurer {

    @Override
    public void addViewControllers(ViewControllerRegistry registry) {
        registry.addViewController("/home").setViewName("home");
        registry.addViewController("/").setViewName("home");
        registry.addViewController("/admin").setViewName("admin");

        registry.addViewController("/login").setViewName("login");
    }
}
