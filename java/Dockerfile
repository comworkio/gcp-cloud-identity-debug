ARG MAVEN_VERSION=3.8-openjdk-17
ARG OPENJDK_VERSION=17-jdk-slim

FROM maven:${MAVEN_VERSION} AS java_builder

WORKDIR /java-debug

COPY . /java-debug

RUN mvn clean install

FROM openjdk:${OPENJDK_VERSION} AS java_runtime

COPY --from=java_builder /java-debug/target/java-debug-1.0.jar /java-debug-1.0.jar
COPY entrypoint.sh /entrypoint.sh
ENTRYPOINT ["/entrypoint.sh"]
