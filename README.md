# Food For Farang project
## Description
This project is a web application that provides information about Thai food 
and restaurants around the UTCC campus. It is designed to help visiting lecturers and
students (farangs) find delicious Thai food.

Every logged in user can add restaurants, only admins can add food types.


## Installation instructions
1. Clone the repository to your local machine.
```bash
mkdir farangfood
cd farangfood
git clone https://github.com/ndeblauw/farangfood.git .
```
2. Install the required dependencies
```bash
composer install
```
3. Set up the environment
```bash
cp .env.example .env
php artisan key:generate
touch database\database.sqlite
```
4. Run the migrations and seed the database
```bash
php artisan migrate:fresh --seed
```

## Usage of the application
The seeders will create an **admin user** with the following credentials:
- Email: nico@deblauwe.be
- Password: password

The seeders will also create 15 **normal users** with `password` as their password. 
Look in the database for the email addresses to use.
