# 🚀 My Portfolio Fullstack

<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="350" alt="Laravel Logo">
</p>

<p align="center">
  A dynamic personal portfolio website built with Laravel, PHP, and MySQL.
  <br>
  Manage portfolio content, skills, services, projects, and blog posts through an admin dashboard.
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-13-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel 13">
  <img src="https://img.shields.io/badge/PHP-8.3-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP 8.3">
  <img src="https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/Status-In%20Development-orange?style=for-the-badge" alt="Project Status">
</p>

---

## 📌 About The Project

**My Portfolio Fullstack** is a database-driven personal portfolio website developed using Laravel.

The project aims to provide a dynamic platform for showcasing professional information, technical skills, services, projects, educational background, work experience, and blog articles.

It includes an administrative dashboard that allows authorized administrators to manage website content without manually editing the frontend templates.

This project is also part of my journey as a Laravel Backend Developer, helping me improve my skills in backend development, database design, authentication, CRUD operations, and Laravel MVC architecture.

## ✨ Features

### 🌐 Frontend

- Personal profile and introduction section.
- Dynamic hero section with profile information and social media links.
- About and skills sections.
- Services showcase.
- Portfolio projects with related services.
- Education and work experience sections.
- Blog listing and individual post details.
- Contact form for visitor inquiries.
- Dynamic website logo, contact information, and footer content.

### 🛠️ Admin Dashboard

- Admin authentication.
- Manage profile information and social media links.
- Manage skills and skill icons.
- Create, update, and delete portfolio projects.
- Manage services and their related portfolio projects.
- Manage educational background and work experience.
- Create and manage blog posts.
- View and manage visitor comments.
- Mark comments as read or unread.
- Manage contact messages.
- Update website settings, including logo, phone, email, address, and footer information.

### 🗄️ Database & Backend

- Laravel MVC architecture.
- Eloquent ORM for database operations.
- Database migrations and seeders.
- Form validation and request handling.
- Relationships between related database models.
- Dynamic content rendered through Laravel Blade templates.
- Separate administrator authentication and protected backend routes.

## 🧰 Tech Stack

| Technology | Purpose |
|---|---|
| PHP | Server-side programming |
| Laravel 13 | Backend framework |
| MySQL | Relational database |
| Laravel Blade | Dynamic page rendering |
| HTML5 | Page structure |
| CSS3 | Styling |
| JavaScript | Frontend interactions |
| Bootstrap | Responsive UI components |
| Composer | PHP dependency management |
| Git & GitHub | Version control |

## ⚙️ Requirements

Before installing the project, make sure you have:

- PHP 8.3 or a compatible version.
- Composer.
- MySQL.
- Node.js and npm, if frontend assets require compilation.
- Git.

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

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Configure Environment Variables

Copy the example environment file:

```bash
copy .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

### 4. Create the Database

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

Use the credentials configured on your own machine.

### 5. Run Database Migrations

```bash
php artisan migrate
```

If the project has seeders configured for your local database, you can also run:

```bash
php artisan db:seed
```

Review the seeders before running them, especially if they delete existing records or depend on foreign-key relationships.

### 6. Link Public Storage

```bash
php artisan storage:link
```

This command creates the public storage link used by Laravel to serve files stored on its public disk.

### 7. Install Frontend Dependencies

If the project includes a `package.json`:

```bash
npm install
```

Start the frontend development server when needed:

```bash
npm run dev
```

### 8. Start the Laravel Server

```bash
php artisan serve
```

Open the following URL in your browser:

http://127.0.0.1:8000

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
│   ├── frontend/
│   ├── portfolios/
│   └── heros/
├── resources/
│   └── views/
│       ├── admin/
│       └── frontend/
├── routes/
│   ├── web.php
│   └── Backend.php
├── storage/
├── .env.example
├── artisan
├── composer.json
└── README.md
```

*Note: The structure above highlights the main application areas. Individual folders may differ as development continues.*

## 🔐 Authentication

The application includes a separate administrator authentication flow and protected backend routes.

Administrator access depends on the local database and the authentication configuration.

**Important:** Configure an administrator account before accessing the dashboard. Do not publish real passwords, API keys, or environment secrets in the repository.

## 📸 Screenshots

Screenshots of the frontend and admin dashboard will be added here.

<!-- Add screenshots after uploading them to your repository.
Example:
![Homepage](docs/images/homepage.png)
![Admin Dashboard](docs/images/admin-dashboard.png)
-->

## 🎯 Learning Objectives

Through this project, I am developing practical experience with:

- Laravel MVC architecture.
- PHP and object-oriented programming.
- MySQL database design and relationships.
- Eloquent ORM.
- Authentication and protected routes.
- CRUD operations.
- File uploads and public storage.
- Database migrations and seeders.
- Building dynamic websites using Blade.
- Organizing controllers, models, and views.
- Git and GitHub workflows.

## 🔮 Future Improvements

- Improve automated test coverage.
- Enhance validation and error handling.
- Continue improving security and authorization.
- Optimize database queries and application performance.
- Improve accessibility and responsive layouts.
- Add further enhancements to the admin dashboard.

## 👨‍💻 Author

**Ahmed Ashraf**

Computer Science Student | Laravel Backend Developer

- GitHub: [@ahmed121765](https://github.com/ahmed121765)
- Project Repository: [My_Portfolio_Fullstack](https://github.com/ahmed121765/My_Portfolio_Fullstack)

I am continuously learning and building Laravel projects to strengthen my backend development skills and gain practical software development experience.

## 📚 Resources

- [Laravel Documentation](https://laravel.com/docs)
- [PHP Documentation](https://www.php.net/docs.php)
- [MySQL Documentation](https://dev.mysql.com/doc/)
- [Git Documentation](https://git-scm.com/doc)

---

<p align="center">
  Built with ❤️ using Laravel.
</p>
