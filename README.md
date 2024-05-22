# AppRoq-test

## Installation

### Step 1: Install Dependencies

```sh
composer install
```

### Step 2: Configure Environment Variables

```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```
### Step 3: Run Migrations and Seed the Database
```sh
php artisan migrate --seed
```

### Usage: Starting the Development Server
```sh
php artisan serve
```
Visit http://localhost:8000 in your web browser to see the application in action.


### File Upload
To test the PDF upload functionality, you can use a tool like Postman or an HTML form. Ensure that the file is a PDF and contains the word "Proposal".
### Routes

#### Upload Route: 
```sh
POST /upload
```
Form added to the main page http://localhost:8000
#### Users by Country Route:
```sh
GET /users/by-country/{country}
```
Visit for example http://localhost:8000/users/by-country/Canada
