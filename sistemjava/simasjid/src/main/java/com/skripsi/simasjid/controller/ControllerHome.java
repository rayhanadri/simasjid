package com.skripsi.simasjid.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;

import java.security.Principal;

@Controller
@RequestMapping("/")
public class ControllerHome {

    @RequestMapping(value = "/home")
    public String home(Model model, Principal principal) {
        System.out.println("cek prinsip : "+principal.getName());
        return "home";
    }


}
