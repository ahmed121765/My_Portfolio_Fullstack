# 🚀 My Portfolio Fullstack

<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="350" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  A dynamic personal portfolio website built with Laravel, PHP, and MySQL.
  <br>
  Showcase professional information, skills, services, projects, education, experience, and blog posts through a dynamic website with an administrative dashboard.
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-13-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel 13">
  <img src="https://img.shields.io/badge/PHP-8.3-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP 8.3">
  <img src="https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/Status-Completed-success?style=for-the-badge" alt="Project Status">
</p>

---

## 📌 About The Project

**My Portfolio Fullstack** is a completed full-stack personal portfolio website developed using Laravel, PHP, and MySQL.

The application provides a dynamic platform for showcasing professional information, technical skills, services, portfolio projects, educational background, work experience, and blog articles.

It includes an administrative dashboard that allows administrators to manage website content without manually editing frontend templates.

The project demonstrates practical experience in Laravel backend development, database management, authentication, file uploads, CRUD operations, and dynamic content rendering using Laravel Blade.

## ✨ Features

### 🌐 Frontend

- Dynamic personal profile and introduction.
- Hero section with profile information and social media links.
- About section.
- Technical skills showcase.
- Services section.
- Portfolio projects.
- Education and work experience.
- Blog listing and individual blog post pages.
- Contact form for visitor inquiries.
- Dynamic website logo and contact information.
- Dynamic footer content.

### 🛠️ Admin Dashboard

- Administrator authentication.
- Manage profile information and social media links.
- Manage skills and skill icons.
- Create, update, and delete portfolio projects.
- Manage services and related portfolio projects.
- Manage educational background.
- Manage work experience.
- Create, edit, and delete blog posts.
- View and manage visitor comments.
- Mark comments as read or unread.
- Manage contact messages.
- Update website settings.
- Manage website logo, phone number, email, address, and footer information.

### 🗄️ Backend & Database

- Laravel MVC architecture.
- Eloquent ORM for database operations.
- Database migrations and seeders.
- Form validation and request handling.
- Database relationships between application models.
- Protected backend routes.
- Separate administrator authentication guard.
- File uploads and image management.
- Dynamic content rendering with Blade templates.

## 🧰 Tech Stack

| Technology | Purpose |
|---|---|
| PHP 8.3 | Server-side programming |
| Laravel 13 | Backend framework |
| MySQL | Relational database |
| Laravel Blade | Dynamic page rendering |
| HTML5 | Page structure |
| CSS3 | Styling |
| JavaScript | Frontend interactions |
| Bootstrap | Responsive UI components |
| Composer | PHP dependency management |
| npm | Frontend package management, if required |
| Git & GitHub | Version control |

## ⚙️ Requirements

Before installing the project, make sure you have:

- PHP 8.3 or a compatible version supported by the installed Laravel dependencies.
- Composer.
- MySQL.
- Git.
- Node.js and npm if frontend asset compilation is required.

## 🚀 Installation

Follow these steps to run the project locally.

### 1. Clone the Repository

```bash
git clone https://github.com/ahmed121765/My_Portfolio_Fullstack.git
```

Navigate to the project directory:

```bash
cd My_Portfolio_Fullstack
```

### 2. Install Dependencies

Install PHP dependencies:

```bash
composer install
```

If the project includes a `package.json`, install the frontend dependencies:

```bash
npm install
```

### 3. Configure the Environment

Create your environment file:

```bash
copy .env.example .env
```

Generate the Laravel application key:

```bash
php artisan key:generate
```

### 4. Configure the Database

Create a MySQL database named:

```text
my_portfolio_fullstack
```

Update your `.env` file with your local database credentials:

```env
APP_NAME="My Portfolio Fullstack"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=my_portfolio_fullstack
DB_USERNAME=root
DB_PASSWORD=
```

Update the database username and password according to your local environment.

### 5. Run Database Migrations

```bash
php artisan migrate
```

To populate the database with the project's configured sample data, run:

```bash
php artisan db:seed
```

Review the seeders before running them, particularly if they truncate tables or replace existing records.

### 6. Create the Storage Link

```bash
php artisan storage:link
```

This allows files stored on Laravel's public storage disk to be accessed through the public directory.

### 7. Build Frontend Assets

If the project uses Vite or another npm-based asset pipeline, run:

```bash
npm run build
```

### 8. Start the Application

```bash
php artisan serve
```

Open the application in your browser:

**Frontend:** http://127.0.0.1:8000

The administrator dashboard and login pages are available through the routes configured in the application.

## 📂 Project Structure

```text
My_Portfolio_Fullstack/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── backend/
│   │       └── frontend/
│   ├── Models/
│   └── Traits/
├── bootstrap/
├── config/
├── database/
│   ├── migrations/
│   └── seeders/
├── public/
│   ├── backend/
│   └── frontend/
├── resources/
│   └── views/
│       ├── admin/
│       └── frontend/
├── routes/
│   ├── web.php
│   └── Backend.php
├── storage/
├── tests/
├── .env.example
├── artisan
├── composer.json
├── package.json
└── README.md
```

*Note: This structure highlights the main application directories. Some folders may differ depending on the actual repository contents.*

## 🔐 Authentication & Security

- Administrator authentication through a dedicated guard.
- Protected backend routes.
- Environment-based application configuration.
- Laravel's request validation and authentication mechanisms.

**Security Notes:**

- Never commit the `.env` file or real credentials.
- Do not publish administrator passwords or secret API keys.
- Configure an administrator account before accessing the dashboard.
- Use `APP_DEBUG=false` in production.

## 📸 Screenshots

Screenshots of the application can be added here to showcase the frontend and administrative dashboard.

<!--
Upload screenshots to your repository and replace the examples below.

![Homepage](docs/images/homepage.png)

![Admin Dashboard](docs/images/admin-dashboard.png)

![Portfolio Projects](docs/images/portfolio-projects.png)

![Blog Management](docs/images/blog-management.png)
-->

## 🎯 Learning Outcomes

This project helped me develop practical experience with:

- Laravel MVC architecture.
- PHP and object-oriented programming.
- MySQL database design.
- Eloquent ORM and model relationships.
- Authentication guards and protected routes.
- CRUD operations.
- Database migrations and seeders.
- Form validation and request handling.
- File uploads and storage management.
- Dynamic Blade templates.
- Organizing controllers, models, views, and routes.
- Version control using Git and GitHub.

## 👨‍💻 Author

**Ahmed Ashraf**

Computer Science Student | Laravel Backend Developer

- GitHub: [@ahmed121765](https://github.com/ahmed121765)
- Project Repository: [My_Portfolio_Fullstack](https://github.com/ahmed121765/My_Portfolio_Fullstack)

I am a Computer Science student passionate about backend development, PHP, and Laravel. I continuously work on practical projects to improve my programming skills and build reliable web applications.

## 📚 Useful Resources

- [Laravel Documentation](https://laravel.com/docs)
- [PHP Documentation](https://www.php.net/docs.php)
- [MySQL Documentation](https://dev.mysql.com/doc/)
- [Git Documentation](https://git-scm.com/doc)

---

<p align="center">
  Built with ❤️ using Laravel.
</p>
