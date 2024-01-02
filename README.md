# Content Management System (CMS) in PHP
Welcome to the Content Management System (CMS) project built in PHP, utilizing modern Object-Oriented Programming (OOP) patterns, including Routing, Primitive Active Record, Validation with Password Hashing, an Administrative Panel for editing and deleting pages, all following the Model-View-Controller (MVC) architecture. The project also adheres to the Singleton pattern for MySQL database connections and the Open-Closed Principle.

# Tech Stack
- PHP: The primary programming language.
- MySQL: Database management system.
- HTML/CSS: Front-end styling and structure.
- MVC: Model-View-Controller architecture for organized and maintainable code.

# Prerequisites
Ensure you have the following installed on your local machine:

- PHP: Download and Install PHP
- MySQL: Download and Install MySQL
- Web Server: You can use Xampp, Apache, Nginx, or any other web server of your choice.

# Database Setup
The CMS project relies on three tables in the database: pages, users, and routes. Below are details about each table and specific instructions for setting up the database.

- pages Table: Fields: id (Primary Key), title, content
- users Table: Fields: id (Primary Key), name, username, hashed_password
- routes Table: 
Fields: id (Primary Key), module, action, entity_id, normal_url

# Database Configuration
- Create a new MySQL Database: Open phpMyAdmin.
Create a new database (e.g., cms_db) and add all the tables above (fill with relevnt information).
- Generate User Password:
  - The initial hashed password for the admin user can be generated using the index-tmp.php file.
  - After generating the user for the first time, add the user information to the users table.
  - The information will be displayed using var_dump on the page with the url corresponding to the location of this file in the project folder. You can delete the index-tmp.php file afterward.
- Configure Database Connection: Update the database connection details in my.ini file and in myPhpAdmin user settings (if using Xampp server) with your database credentials.
- Access Admin Login Page:
  - Open your web browser and navigate to the following URL: http://localhost:8012/CMS/public/admin/index.php?module=dashboard&action=login
  - The port may vary based on your server settings.
  - After successful login you will be able to access admin dashboard to edit and delete pages.
 
<img width="913" alt="Screenshot 2024-01-03 005858" src="https://github.com/catychelpan/CMS/assets/110096019/aa332d30-1296-4f42-a8d1-214c5921e6c6">
<img width="957" alt="Screenshot 2024-01-03 005942" src="https://github.com/catychelpan/CMS/assets/110096019/2402b97b-c763-474e-a09e-7db04f8e63c8">
<img width="960" alt="Screenshot 2024-01-03 005957" src="https://github.com/catychelpan/CMS/assets/110096019/4333162d-1389-45ce-b74d-b236def31db4">


  
  
