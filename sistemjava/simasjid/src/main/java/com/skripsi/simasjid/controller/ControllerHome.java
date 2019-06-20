package com.skripsi.simasjid.controller;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;

@Controller
@RequestMapping("/")
public class ControllerHome {

    @RequestMapping(value = "/home")
    public String home() {
        return "home";
    }


}
