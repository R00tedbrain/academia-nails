# ====================================================================
# CONFIGURACIÓN DE ACADEMIA NAILS EN SISTEMA LINUX
# ====================================================================

# 1. CLONAR O COPIAR EL PROYECTO
git clone https://github.com/tu-usuario/academia-nails.git
cd academia-nails

# 2. INSTALAR DEPENDENCIAS
# Para sistemas basados en Debian/Ubuntu:
sudo apt update
sudo apt install -y docker.io docker-compose

# Para sistemas basados en RedHat/Fedora/CentOS:
# sudo dnf install -y docker docker-compose

# 3. CONFIGURAR DOCKER
sudo systemctl start docker
sudo systemctl enable docker
sudo usermod -aG docker $USER
# Importante: Cierra sesión y vuelve a iniciarla para que los cambios surtan efecto
# O ejecuta este comando para aplicar los cambios en la sesión actual:
newgrp docker

# 4. PREPARAR Y EJECUTAR EL PROYECTO
chmod +x setup.sh
./setup.sh

# 5. ESPERAR A QUE TERMINE LA CONFIGURACIÓN
# El script mostrará un mensaje cuando esté listo

# 6. ACCEDER AL SITIO
# Abre en el navegador: http://localhost:8000
# PhpMyAdmin: http://localhost:8080
# Datos de acceso a la BD:
#   - Usuario: academia_user
#   - Contraseña: academia_password

# 7. CONFIGURACIÓN WORDPRESS
# - Idioma: Español
# - Título: "Academia Nails"
# - Crear usuario administrador y contraseña
# - Correo electrónico administrador

# 8. INSTALAR PLUGINS (desde el panel de administración)
# - Ir a Plugins → Añadir nuevo
# - Instalar según docs/plugins-recomendados.md:
#   • Tutor LMS
#   • WooCommerce
#   • Elementor
#   • WPML (o Polylang para multilingüe)

# 9. ACTIVAR EL TEMA
# - Ir a Apariencia → Temas
# - Activar "Academia Nails Child Theme"

# 10. IMPORTAR CONTENIDO DE DEMOSTRACIÓN (opcional)
# - Utilizar Herramientas → Importar → WordPress

# 11. PARA DETENER EL ENTORNO CUANDO TERMINES
docker-compose down

# 12. PARA VOLVER A INICIARLO
docker-compose up -d