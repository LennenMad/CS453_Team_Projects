## Building the Docker Image
- Ensure "dockerfile" has all proper commands listed and each correct file path for copy.

**Replace PATH with correct path to files**
```
FROM ubuntu:latest
ENV TZ=America/Chicago
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
WORKDIR /PATH
RUN apt-get update
# install apache web server
RUN apt-get install -y apache2
RUN apt-get install -y apache2-utils
# install php
RUN apt-get install -y php
RUN apt-get install -y php-bcmath
RUN apt-get install -y php-bz2
RUN apt-get install -y php-intl
RUN apt-get install -y php-gd
RUN apt-get install -y php-mbstring
RUN apt-get install -y php-mysql
RUN apt-get install -y php-zip
# install network commands (ip and ifconfig)
RUN apt-get install -y iproute2
RUN apt-get install -y net-tools
# copy in html and php files
COPY *.html   /PATH/
COPY *.php   /PATH/
COPY *.html /var/www/html/ 
COPY *.php /var/www/html/ 
# install file converter from Windows to Linux
RUN apt-get install -y dos2unix
RUN apt-get clean
EXPOSE 80
CMD ["apache2ctl","-D","FOREGROUND"]
```

- **cd** to the destination file from PATH

Run the container with `docker run -d -p 8080:80 webservername`

Now the container should be accesible from `localhost:8080/filename.html`

## Useful Commands for Docker

| Command | Result |
| :--- | :--- |
| docker build PATH -t="webservername" | Builds the image from the "dockerfile" |
| docker images | Displays available docker images |
| docker run -d -p 8080:80 webservername | Starts the docker container running at the stated port |
| docker ps | Displays all running containers |
| docker exec -it CONTAINERNAME /bin/bash | Enters the container from terminal |
| docker stop CONTAINERNAME | Stops the desired container |
