# Imagen base de PHP con extensiones necesarias
FROM php:8.4-cli

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libsqlite3-dev \
    sqlite3 \
    nodejs \
    npm \
    && rm -rf /var/lib/apt/lists/*

# Instalar extensiones de PHP
RUN docker-php-ext-install pdo pdo_sqlite

# Copiar Composer desde imagen oficial
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Directorio de trabajo
WORKDIR /app

# Copiar código fuente
COPY . .

# Instalar dependencias de PHP
RUN composer install --no-dev --optimize-autoloader

# Crear base de datos SQLite vacía
RUN mkdir -p database && touch database/database.sqlite

# Instalar dependencias de Node y compilar assets
RUN npm install && npm run build

# Verificar que los assets se generaron
RUN ls -la public/build && ls -la public/build/assets

# Ejecutar migraciones
RUN php artisan migrate --force

# Exponer puerto
EXPOSE 10000

# Servir aplicación desde public (mejor que artisan serve)
CMD php -S 0.0.0.0:10000 -t public
