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

        server_name site237.webte.fei.stuba.sk;

        rewrite ^ https://$server_name$request_uri? permanent;
}


server {
        listen 443 ssl;
        listen [::]:443 ssl;

        server_name site237.webte.fei.stuba.sk;

        access_log /var/log/nginx/access.log;
        error_log  /var/log/nginx/error.log info;

        root /var/www/site237.webte.fei.stuba.sk;
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

Build docker:

```sh
cd ./docker
docker build -t app:app .
docker network create -d bridge --subnet 192.168.0.0/24 --gateway 192.168.0.1 app-network
docker run -d -p 8000:80 -e APP_URL=<URL_HERE> --network app-network -v <STORAGE_FOLDER>:/var/www/html/project_5_webte_2/storage --name app app:app
```
