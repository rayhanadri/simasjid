package com.skripsi.simasjid.controller;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;

@Controller
public class ControllerHome {

    @RequestMapping(value = "/")
    public String home(){
        return "home";
    }

}
