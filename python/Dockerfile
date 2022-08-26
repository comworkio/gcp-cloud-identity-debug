FROM python:3-alpine

ENV PYTHONUNBUFFERED=1 \
    PYTHONIOENCODING=UTF-8

COPY ./main.py ./common_utils.py ./requirements.txt /

RUN pip3 install --upgrade pip && \
    pip3 install -r /requirements.txt

CMD ["python3", "/main.py"]
