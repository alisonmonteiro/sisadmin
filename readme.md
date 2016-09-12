# SisAdmin
> The Briba's CMS

## Getting Started
~~~bash
# Clone the project.
git clone git@bitbucket.org:briba/sisadmin.git SisAdmin

# Enter into project folder.
cd SisAdmin

# Install the PHP dependencies.
composer install

# Install the NodeJS dependencies. Gulp will automagically run.
npm install

# Configure the .env file as you need.

# Migrate and seed the database.
php artisan migrate
php artisan module:migrate

php artisan db:seed
php artisan module:seed

# Boot the server.
php artisan serve

# Access http://localhost:8000 on browser.
~~~

## License
[MIT License](http://briba.mit-license.org) © Briba
