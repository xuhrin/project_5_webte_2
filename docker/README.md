# Build standalone docker

Configure database and server.

- Database: standalone
- User: standalone
- Password: standalone

Nginx:

```
server {
        listen 80;
        listen [::]:80;

        server_name [URL_HERE];

        rewrite ^ https://$server_name$request_uri? permanent;
}


server {
        listen 443 ssl;
        listen [::]:443 ssl;

        server_name [URL_HERE];

        access_log /var/log/nginx/access.log;
        error_log  /var/log/nginx/error.log info;

        root /var/www/[URL_HERE];
        index index.php index.html;

        ssl on;
        ssl_certificate /etc/ssl/certs/webte_fei_stuba_sk.pem;
        ssl_certificate_key /etc/ssl/private/webte.fei.stuba.sk.key;

        location = /favicon.ico { access_log off; log_not_found off; }
        location = /robots.txt  { access_log off; log_not_found off; }

        location / {
                proxy_pass http://localhost:8000;
                proxy_set_header Host $host;
                proxy_set_header X-Real-IP $remote_addr;
                proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
                proxy_set_header X-Forwarded-Proto $scheme;
        }
}
```

Docker (wihout docker-compose) requires database and user:

```sh
sudo mysql
```

```sql
CREATE DATABASE standalone;
CREATE USER 'standalone'@'localhost' IDENTIFIED BY 'standalone';
GRANT ALL PRIVILEGES ON standalone.* TO 'standalone'@'localhost';
FLUSH PRIVILEGES;
exit
```

Build container:

```sh
cd ./docker
docker build -t app:app . && docker run -d -e APP_URL=[URL_HERE] --network host --name app app:app
```

Or with docker-compose:

```sh
cd ./docker
APP_URL=[URL_HERE] docker-compose up -d
```

Remove container:

```sh
docker stop app && docker rm app
```
