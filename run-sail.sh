#!/bin/sh

docker run --rm --interactive --tty -v $(pwd):/app composer install

# Copy env
cp .env.example .env

# Alias
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'

# Build containers
sail up -d

# Create tables
sail artisan migrate

# Install node packages
sail npm install

# Build resources
sail npx vite build

# Seed database
sail artisan db:seed

# Cache routes
sail artisan route:cache
