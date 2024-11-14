Integrative Project: Hotel Reservation Management for Laravel Suite with Email

STEPS ON HOW TO SETUP:

Ensure that you have XAMPP installed.

After cloning the repository, create a .env file inside the laraviel-suite folder.

After creating the .env file, change the values for MySQL:

Database Name: laraviel_suite
The root, password, and port depend on the credentials of your XAMPP.
Remove the comments first (#).

Default values:
DB_CONNECTION: mysql,
DB_DATABASE: laraviel_suite (database name)
DB_HOST: 127.0.0.1
DB_USERNAME: root
DB_PASSWORD: none/empty

For the email to work, make sure you have configured your app in Google:
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME="username goes here same with your email"
MAIL_PASSWORD="your app password goes here"
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="email you made for the website or your personal email"
MAIL_FROM_NAME="laraviel-suite"
Open terminal and run these commands:

cd laraviel-suite
composer install
php artisan migrate

After running these commands, serve the project:
php artisan serve
