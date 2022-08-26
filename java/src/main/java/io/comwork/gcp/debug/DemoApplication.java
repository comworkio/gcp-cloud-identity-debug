package io.comwork.gcp.debug;

import com.google.cloud.storage.BlobId;
import com.google.cloud.storage.BlobInfo;
import com.google.cloud.storage.Storage;
import com.google.cloud.storage.StorageOptions;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;

import java.nio.charset.StandardCharsets;
import java.time.Instant;

@SpringBootApplication
public class DemoApplication {
	public static void main(String[] args) throws InterruptedException {
		SpringApplication.run(DemoApplication.class, args);
		Integer WAIT_TIME = Integer.valueOf(System.getenv("WAIT_TIME"));

		while(true) {
			String line = String.format("Written at %s", Instant.now());
			Storage gcs = StorageOptions.getDefaultInstance().getService();
			BlobInfo blob = BlobInfo.newBuilder(BlobId.of(System.getenv("GCS_BUCKET_NAME"), System.getenv("BUCKET_FILENAME"))).build();
			gcs.create(blob, line.getBytes(StandardCharsets.UTF_8));
			System.out.println(line);
			Thread.sleep(WAIT_TIME * 1000);
		}
	}
}
