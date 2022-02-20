## Online Counsellor Platform

### Client Panel
- User Can search and find counsellors by search keyword
- User Can answer questions created by admin to find the best match for counsellor
- If user have done choosing counsellor, user can make appointment proposal to counsellor 

### Counsellor Panel
- Counsellor can edit or delete user appoinment porposal
- Counsellor can change proposal of their appointment (like changing status, date and time )
- If Counsellor comfirm appoinment , counsellor must send email and contact users to notify their appointment date and time
- Counsellor can manage their profie

### Admin Panel
- Admin can create new counsellor and manage counsellor
- Admin can manage questions 
- Admin can have dashboard

### Installation
```php
composer install
cp .env.example .env
php artisan key:generate
# create database andconfigure your database in .env

php artisan migrate --seed
php artisan serve
```
### Tech Stacks
` laravel `  ` mysql ` ` laravel/ui ` 

#### Demo Accounts 
email - user@gmail.com
password - asdfasdf

email - admin@gmail.com
password - asdfasdf
