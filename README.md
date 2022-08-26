# Gcp Cloud Identity Debug

Some scripts for debugging cloud identity (binding IAM role to GKE pods).

* [Python version](./python)

## Test locally

```shell
cd {techno}
gcloud auth login
cp ../../.config/gcloud/application_default_credentials.json credentials.json 
cp ../.env.example .env # Change the values inside
docker-compose -f docker-compose-local.yml up --build
```
