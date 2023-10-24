FROM httpd:latest
COPY . /usr/local/apache2/htdocs/
# add JS modules to MIME types
RUN echo 'AddType application/javascript .mjs' > /usr/local/apache2/htdocs/.htaccess
EXPOSE 80