FROM mysql:latest
ENV MYSQL_ROOT_PASSWORD=root_password
ENV MYSQL_DATABASE=moffat_db
ENV MYSQL_USER=moffat_user
ENV MYSQL_PASSWORD=moffat_password
COPY init.sql /docker-entrypoint-initdb.d/
EXPOSE 3306