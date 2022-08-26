package io.comwork.gcp.debug;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;

@SpringBootApplication
public class DemoApplication {
	public static void main(String[] args) throws InterruptedException {
		SpringApplication.run(DemoApplication.class, args);
		Integer WAIT_TIME = Integer.valueOf(System.getenv("WAIT_TIME"));

		while(true) {
			System.out.println("yo");
			Thread.sleep(WAIT_TIME * 1000);
		}
	}
}
