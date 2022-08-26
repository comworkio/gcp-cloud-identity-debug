#!/bin/bash

REPO_PATH="${PROJECT_HOME}/gcp-cloud-identity-debug/"

cd "${REPO_PATH}" && git pull origin main || :
git push github main 
git push internal main
exit 0
