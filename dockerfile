# Use official PHP image with Apache
FROM php:8.1-apache

# Install necessary PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd mysqli zip \
    && apt-get clean

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Install necessary PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Set working directory to the project root (make sure the context is the project root when building)
WORKDIR /var/www/Read

# Copy the project files into the container
COPY . /var/www/html/

# Expose port 80 to access the app
EXPOSE 80

# Command to run the application (Apache will start automatically with this image)
CMD ["apache2-foreground"]
