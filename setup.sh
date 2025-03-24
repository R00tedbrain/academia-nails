#!/bin/bash

# Script de instalación para Academia Nails
# Este script configura el entorno de desarrollo para la plataforma de cursos

# Colores para output
GREEN='\033[0;32m'
RED='\033[0;31m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

echo -e "${GREEN}=== Iniciando configuración de Academia Nails ===${NC}"
echo -e "${YELLOW}Este script configurará un entorno de desarrollo completo para la plataforma.${NC}"

# Verificar si Docker está instalado
if ! command -v docker &> /dev/null; then
    echo -e "${RED}Docker no está instalado. Por favor, instala Docker antes de continuar.${NC}"
    echo "Puedes descargarlo desde: https://www.docker.com/products/docker-desktop"
    exit 1
fi

# Verificar si Docker Compose está instalado
if ! command -v docker-compose &> /dev/null; then
    echo -e "${RED}Docker Compose no está instalado. Por favor, instala Docker Compose antes de continuar.${NC}"
    echo "Consulta: https://docs.docker.com/compose/install/"
    exit 1
fi

echo -e "${GREEN}✓ Docker y Docker Compose están instalados${NC}"

# Crear estructura de directorios si no existen
echo -e "${YELLOW}Creando estructura de directorios...${NC}"
mkdir -p public_html
mkdir -p docs

echo -e "${GREEN}✓ Estructura de directorios creada${NC}"

# Iniciar contenedores
echo -e "${YELLOW}Iniciando contenedores Docker...${NC}"
docker-compose up -d

# Esperar a que MySQL esté listo
echo -e "${YELLOW}Esperando a que MySQL esté listo...${NC}"
sleep 15

# Verificar si los contenedores están funcionando
if [ $(docker ps -q -f name=academia_nails_wp) ] && [ $(docker ps -q -f name=academia_nails_db) ]; then
    echo -e "${GREEN}✓ Contenedores iniciados correctamente${NC}"
else
    echo -e "${RED}Error: Uno o más contenedores no se iniciaron correctamente.${NC}"
    echo "Por favor, revisa los logs con: docker-compose logs"
    exit 1
fi

# Verificar extensiones PHP en el contenedor WordPress
echo -e "${YELLOW}Verificando extensiones PHP requeridas...${NC}"
docker exec academia_nails_wp bash -c "php -m" > php_extensions.txt
required_extensions=("mysqli" "PDO" "pdo_mysql" "xml" "mbstring" "zip" "intl" "opcache" "gd")
missing_extensions=()

for ext in "${required_extensions[@]}"; do
    if ! grep -i "$ext" php_extensions.txt > /dev/null; then
        missing_extensions+=("$ext")
    fi
done

if [ ${#missing_extensions[@]} -eq 0 ]; then
    echo -e "${GREEN}✓ Todas las extensiones PHP requeridas están instaladas${NC}"
    rm php_extensions.txt
else
    echo -e "${RED}Faltan las siguientes extensiones PHP:${NC}"
    for ext in "${missing_extensions[@]}"; do
        echo "  - $ext"
    done
    echo -e "${YELLOW}Intentando instalar extensiones faltantes...${NC}"
    docker exec academia_nails_wp bash -c "apt-get update && apt-get install -y libzip-dev libpng-dev libxml2-dev && docker-php-ext-install ${missing_extensions[*]}"
    echo -e "${GREEN}✓ Se han instalado las extensiones faltantes${NC}"
    rm php_extensions.txt
fi

# Información de acceso
echo -e "\n${GREEN}=== Instalación completada ===${NC}"
echo -e "${YELLOW}Accesos:${NC}"
echo -e "WordPress: http://localhost:8000"
echo -e "PhpMyAdmin: http://localhost:8080"
echo -e "  - Usuario: academia_user"
echo -e "  - Contraseña: academia_password"
echo -e "\n${YELLOW}Próximos pasos:${NC}"
echo -e "1. Finaliza la instalación de WordPress en el navegador"
echo -e "2. Instala los plugins recomendados en docs/plugins-recomendados.md"
echo -e "3. Configura Tutor LMS y WooCommerce según docs/configuracion-lms-ecommerce.md"
echo -e "4. Diseña el frontend según docs/configuracion-frontend.md"
echo -e "\n${GREEN}¡Buena suerte con tu proyecto!${NC}" 