FROM python:3-alpine AS debug

ENV PYTHONUNBUFFERED=1 \
    PYTHONIOENCODING=UTF-8

COPY ./api ./manifest.json /

RUN pip3 install --upgrade pip && \
    pip3 install -r /requirements.txt

CMD ["python3", "debug.py"]
