# Patio Management System

A PHP + MySQL web application for managing the menu of Patio Café.

## Project Description

This system allows staff to manage menu items, categories, prices, and availability for a café. It demonstrates CRUD operations, secure coding, search with Ajax, authentication, and a responsive, café-themed UI. Customers can view the menu; only admins can manage items.

## Folder Structure

```
project_root/
│── config/
│    └── db.php
│── public/
│    ├── index.php
│    ├── add.php
│    ├── edit.php
│    ├── delete.php
│    ├── search.php
│    ├── menu.php
│    ├── login.php
│    └── logout.php
│── templates/ (if template engine is used)
│── assets/
│    ├── css/
│    └── js/
└── includes/
     ├── header.php
     ├── footer.php
     ├── functions.php
     └── auth.php
```

## Setup Instructions

1. Import `patio_db.sql` into your MySQL server to create the menu table and sample data.
2. Import `admins.sql` to create the admin user table and a default admin.
3. Place the project folder in your web server root (e.g., `htdocs` for XAMPP).
4. Update database credentials in `config/db.php` if needed.
5. Access the admin panel via `http://localhost/final-ass/public/login.php`.
   - **Admin Username:** `root_admin`
   - **Admin Password:** `123456789`
6. Access the public menu via `http://localhost/final-ass/public/menu.php`.

## Database Credentials (default for XAMPP)

- Host: `localhost`
- Database: `patio_db`
- User: `root`
- Password: _(empty)_

## Features

- Add, view, edit, and delete menu items (admin only)
- Search by name or category (with Ajax live search, admin only)
- Responsive, café-style UI
- Secure coding: PDO, prepared statements, XSS protection
- Server-side and client-side validation
- Public menu page for customers
- Admin authentication (login/logout)

## Known Issues

- No CSRF protection (can be added for extra security)
- No user registration (admin user must be added in DB)

---

**Developed for academic assignment use.**
