# Configuración del Entorno de Producción

## Requisitos del Servidor

### Recomendaciones Mínimas
- **CPU**: 2 núcleos dedicados
- **RAM**: 4GB mínimo
- **Almacenamiento**: 30GB SSD
- **Ancho de banda**: 1TB/mes

### Configuración de Software
- Sistema Operativo: Ubuntu 22.04 LTS
- Servidor Web: Nginx 1.20+
- PHP 8.1+ con las siguientes extensiones:
  - php-fpm
  - php-mysql
  - php-xml
  - php-curl
  - php-gd
  - php-mbstring
  - php-zip
  - php-intl
  - php-opcache
  - php-xmlrpc
  - php-json
  - php-fileinfo
  - php-exif
  - php-imagick (opcional, para procesamiento avanzado de imágenes)
- MySQL 8.0+ / MariaDB 10.6+

## Pasos de Implementación

### 1. Preparación del Servidor

```bash
# Actualizar el sistema
sudo apt update && sudo apt upgrade -y

# Instalar Nginx
sudo apt install nginx -y

# Instalar PHP y extensiones
sudo apt install php8.1-fpm php8.1-mysql php8.1-xml php8.1-curl php8.1-gd php8.1-mbstring php8.1-zip php8.1-intl php8.1-opcache php8.1-xmlrpc php8.1-json php8.1-fileinfo php8.1-exif php8.1-imagick -y

# Instalar MySQL
sudo apt install mysql-server -y

# Configurar MySQL
sudo mysql_secure_installation
```

### 2. Configuración de Nginx

Crear un archivo en `/etc/nginx/sites-available/academia-nails.conf`:

```nginx
server {
    listen 80;
    server_name tudominio.com www.tudominio.com;
    
    # Redirigir a HTTPS
    return 301 https://$host$request_uri;
}

server {
    listen 443 ssl http2;
    server_name tudominio.com www.tudominio.com;
    
    # Certificados SSL
    ssl_certificate /etc/letsencrypt/live/tudominio.com/fullchain.pem;
    ssl_certificate_key /etc/letsencrypt/live/tudominio.com/privkey.pem;
    
    # Configuración SSL optimizada
    ssl_protocols TLSv1.2 TLSv1.3;
    ssl_prefer_server_ciphers on;
    ssl_ciphers ECDHE-ECDSA-AES128-GCM-SHA256:ECDHE-RSA-AES128-GCM-SHA256:ECDHE-ECDSA-AES256-GCM-SHA384:ECDHE-RSA-AES256-GCM-SHA384:DHE-RSA-AES128-GCM-SHA256:DHE-RSA-AES256-GCM-SHA384;
    ssl_session_timeout 1d;
    ssl_session_cache shared:SSL:10m;
    ssl_session_tickets off;
    
    # Configuración HSTS
    add_header Strict-Transport-Security "max-age=63072000; includeSubDomains; preload";
    
    # Raíz del sitio web
    root /var/www/academia-nails;
    index index.php index.html;
    
    # Reglas para WordPress
    location / {
        try_files $uri $uri/ /index.php?$args;
    }
    
    # Configuración PHP
    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
        fastcgi_read_timeout 300;
        fastcgi_buffer_size 128k;
        fastcgi_buffers 4 256k;
        fastcgi_busy_buffers_size 256k;
    }
    
    # Caché para recursos estáticos
    location ~* \.(js|css|png|jpg|jpeg|gif|ico|svg)$ {
        expires max;
        log_not_found off;
        access_log off;
    }
    
    # Denegar acceso a archivos sensibles
    location ~ /\. {
        deny all;
        access_log off;
        log_not_found off;
    }
    
    # Denegar acceso a wp-config.php
    location ~* wp-config\.php {
        deny all;
    }
    
    # Configuración para evitar ataques xmlrpc
    location = /xmlrpc.php {
        deny all;
        access_log off;
        log_not_found off;
    }
}
```

Activar el sitio:

```bash
sudo ln -s /etc/nginx/sites-available/academia-nails.conf /etc/nginx/sites-enabled/
sudo nginx -t
sudo systemctl restart nginx
```

### 3. Configuración de SSL con Let's Encrypt

```bash
# Instalar Certbot
sudo apt install certbot python3-certbot-nginx -y

# Obtener certificado
sudo certbot --nginx -d tudominio.com -d www.tudominio.com
```

### 4. Configuración de Optimización

#### Optimización PHP

Editar `/etc/php/8.1/fpm/php.ini`:

```ini
; Aumentar límites
memory_limit = 256M
upload_max_filesize = 64M
post_max_size = 64M
max_execution_time = 300
max_input_vars = 3000

; Optimización de OPcache
opcache.enable=1
opcache.memory_consumption=128
opcache.interned_strings_buffer=8
opcache.max_accelerated_files=4000
opcache.revalidate_freq=60
opcache.save_comments=1
```

Reiniciar PHP-FPM:
```bash
sudo systemctl restart php8.1-fpm
```

#### Optimización MySQL

Crear `/etc/mysql/conf.d/custom.cnf`:

```ini
[mysqld]
innodb_buffer_pool_size = 1G
innodb_log_file_size = 256M
innodb_flush_log_at_trx_commit = 2
innodb_flush_method = O_DIRECT
query_cache_type = 1
query_cache_size = 32M
```

Reiniciar MySQL:
```bash
sudo systemctl restart mysql
```

### 5. Seguridad Adicional

#### Firewall

```bash
sudo apt install ufw -y
sudo ufw default deny incoming
sudo ufw default allow outgoing
sudo ufw allow ssh
sudo ufw allow http
sudo ufw allow https
sudo ufw enable
```

#### Fail2Ban

```bash
sudo apt install fail2ban -y
sudo cp /etc/fail2ban/jail.conf /etc/fail2ban/jail.local
```

Editar `/etc/fail2ban/jail.local` para añadir protección a WordPress:

```ini
[wordpress]
enabled = true
port = http,https
filter = wordpress
logpath = /var/www/academia-nails/wp-content/debug.log
maxretry = 3
bantime = 3600
```

Reiniciar Fail2Ban:
```bash
sudo systemctl restart fail2ban
```

## Mantenimiento Regular

### Copias de Seguridad

1. **Base de Datos**: Configurar respaldos diarios a través de UpdraftPlus
2. **Archivos**: Respaldo semanal completo del directorio `/var/www/academia-nails`
3. **Almacenamiento Externo**: Configurar sincronización con AWS S3 o similar

### Actualización

1. Actualizar WordPress, plugins y temas regularmente
2. Mantener un entorno de staging para probar actualizaciones
3. Programar actualizaciones en horarios de bajo tráfico

### Monitorización

1. Instalar y configurar New Relic o Prometheus + Grafana
2. Configurar alertas por correo electrónico para eventos importantes
3. Revisar los logs regularmente: 