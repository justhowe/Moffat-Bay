FROM gradle:jdk17
WORKDIR /app
COPY build.gradle settings.gradle /app/
COPY gradle /app/gradle
COPY gradlew /app/
RUN ./gradlew
COPY src /app/src
RUN ./gradlew build
CMD ["java", "-jar", "build/libs/moffat-0.0.1-SNAPSHOT.jar"]
EXPOSE 80