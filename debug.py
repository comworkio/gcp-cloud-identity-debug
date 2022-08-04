from google.cloud import storage

import os

gcs_client = storage.Client()
bucket_name = os.environ['GCS_BUCKET_NAME']

while True:
    val = 
