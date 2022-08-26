# Gcp Cloud Identity Debug

Some apps for debugging cloud identity (binding IAM role to GKE pods and without authentication requirements in your implementations).

* [Python version](./python)
* [Java Springboot version](./java)

## Test locally

```shell
cd {techno}
gcloud auth login
cp ../../.config/gcloud/application_default_credentials.json credentials.json 
cp ../.env.example .env # Change the values inside
docker-compose -f docker-compose-local.yml up --build
```

Explanations: 
* when you're in localhost, you have to set both `GOOGLE_CLOUD_PROJECT` (name of the gcp project) and `GOOGLE_APPLICATION_CREDENTIALS` (which is the path to your credentials json file).
* when you're using docker or other container runtime locally and you have perform gcloud auth login outside the container, you have to mount the credential json file as a volume and the `GOOGLE_APPLICATION_CREDENTIALS` must be set with the internal path (inside the container) of this json file.
