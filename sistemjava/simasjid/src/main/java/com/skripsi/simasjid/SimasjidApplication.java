package com.skripsi.simasjid;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;

@SpringBootApplication
public class SimasjidApplication {

	public static void main(String[] args) {
		SpringApplication.run(SimasjidApplication.class, args);
		System.out.println("== Running Well at http://localhost:8080! == ");
	}

}
