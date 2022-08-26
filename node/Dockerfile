FROM node:18-alpine3.15 AS node-debug

WORKDIR /node-debug

COPY . /node-debug

RUN npm i

CMD ["node", "/node-debug/main.js"]
