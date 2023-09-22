## Installation
#### Clone the repository
```
git clone https://github.com/itbdrasel/mediusware-2.git 
```

#### composer update
```
composer update
```

#### create database
### Configuration
Create a `.env` file by copying the `.env.example` file:

Configure your database connection in the `.env` file:<br>

```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password
```

Replace `your_database_name`, `your_database_user`, and `your_database_password` with your actual database credentials.

####Generate a unique application key:

```
php artisan key:generate
```
####Migrate the database and seed initial data:

```
php artisan migrate
```

#### Run project :

```
php artisan serve
```

##### Create user & and login :