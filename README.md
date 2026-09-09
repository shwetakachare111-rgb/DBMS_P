# 🌱 Seed Quality & Performance Feedback System

A **PHP and MySQL-based web application** designed to collect, manage, and evaluate user feedback on seed quality and performance.

---

## 📌 Project Overview

The **Seed Quality & Performance Feedback System** provides a simple platform where registered users can submit feedback about different **crops and seed varieties**.

Users can provide information about:

* 🌾 Crop name
* 🌱 Seed variety
* 🌿 Germination performance
* 📈 Plant growth
* ⭐ Rating
* 💬 Written feedback

The system also provides **user registration, secure login, session-based access control, feedback submission, feedback viewing, and logout functionality**.

---

## ✨ Features

### 👤 User Registration

* Create a new account using an email address and password.
* Prevents duplicate email registrations.
* Passwords are securely hashed using PHP's `password_hash()` function.

### 🔐 User Login

* Authenticates users using their registered email and password.
* Uses PHP's `password_verify()` function to verify passwords.
* Creates a session after successful authentication.
* Prevents unauthorized access to protected pages.

### 🌱 Seed Feedback Submission

Users can submit detailed information about seed performance, including:

| Field            | Description                         |
| ---------------- | ----------------------------------- |
| **Name**         | Name of the user                    |
| **Email**        | User's email address                |
| **Crop Name**    | Name of the crop being evaluated    |
| **Seed Variety** | Variety of the seed                 |
| **Germination**  | Germination performance             |
| **Growth**       | Growth observation                  |
| **Rating**       | Rating from 1 to 5                  |
| **Feedback**     | Additional comments or observations |

The feedback is stored in the MySQL database using **prepared SQL statements**.

### 📊 Feedback Viewing

The application provides an option to view submitted seed feedback through `view_feedback.php`.

### 🛡️ Session Protection

Protected pages check whether the user is logged in. Unauthorized users are redirected to the login page.

### 🚪 Logout

Users can securely log out of the application. The active PHP session is destroyed and the user is redirected to the login page.

### 🎨 Responsive Styling

The application uses a shared CSS stylesheet that provides:

* Clean green-themed design
* Styled forms
* Modern buttons
* Feedback tables
* Input focus effects
* Smooth animations
* Responsive layout

---

## 🛠️ Technologies Used

| Technology       | Purpose                           |
| ---------------- | --------------------------------- |
| **PHP**          | Server-side application logic     |
| **MySQL**        | Database management and storage   |
| **MySQLi**       | PHP-to-MySQL database connection  |
| **HTML5**        | Web page structure                |
| **CSS3**         | User interface and styling        |
| **PHP Sessions** | Authentication and access control |

---

## 📂 Project Structure

```text
Seed-Quality-Feedback-System/
│
├── db.php
├── index.php
├── login.php
├── register.php
├── logout.php
├── feedback.php
├── view_feedback.php
├── style.css
└── index2.html
```

### 📄 File Descriptions

| File                | Description                                                                          |
| ------------------- | ------------------------------------------------------------------------------------ |
| `db.php`            | Establishes the MySQL database connection.                                           |
| `index.php`         | Authenticated home page containing links to feedback, feedback viewing, and logout.  |
| `register.php`      | Handles new user registration and password hashing.                                  |
| `login.php`         | Authenticates registered users and creates a session.                                |
| `logout.php`        | Clears and destroys the current user session.                                        |
| `feedback.php`      | Provides the seed feedback form and stores submitted feedback in the database.       |
| `view_feedback.php` | Intended to display submitted feedback.                                              |
| `style.css`         | Contains the application's visual design, forms, buttons, tables, and animations.    |
| `index2.html`       | Default InfinityFree hosting page and not part of the application's functional code. |

> **Note:** `view_feedback.php` was referenced by the provided application files but was not included in the uploaded project files.

---

## 🔄 Application Flow

```text
                         ┌───────────────┐
                         │     User      │
                         └───────┬───────┘
                                 │
                ┌────────────────┴────────────────┐
                │                                 │
                ▼                                 ▼
        ┌───────────────┐                  ┌───────────────┐
        │    Register   │                  │     Login     │
        └───────┬───────┘                  └───────┬───────┘
                │                                  │
                ▼                                  ▼
        ┌───────────────┐                  ┌───────────────┐
        │ Account Created│                 │ Session Created│
        └───────────────┘                  └───────┬───────┘
                                                   │
                                                   ▼
                                          ┌─────────────────┐
                                          │    index.php    │
                                          └────────┬────────┘
                                                   │
                        ┌──────────────────────────┼──────────────────────┐
                        │                          │                      │
                        ▼                          ▼                      ▼
                ┌───────────────┐         ┌───────────────┐       ┌─────────────┐
                │ Give Feedback │         │ View Feedback │       │   Logout    │
                └───────┬───────┘         └───────────────┘       └──────┬──────┘
                        │                                                │
                        ▼                                                ▼
                ┌───────────────┐                               ┌────────────────┐
                │  MySQL DB     │                               │ Session Destroyed│
                └───────────────┘                               └────────────────┘
```

---

## 🗄️ Database Requirements

The application requires a **MySQL database** containing at least the following tables:

### `users` Table

The registration and login functionality expects a `users` table with the following fields:

| Column     | Description                     |
| ---------- | ------------------------------- |
| `id`       | Unique identifier for each user |
| `email`    | Registered user's email address |
| `password` | Hashed user password            |

The registration process checks whether an email already exists before creating a new account.

Passwords are stored using PHP's `password_hash()` function.

### `feedback` Table

The feedback form stores the following information:

| Column         | Description          |
| -------------- | -------------------- |
| `name`         | User's name          |
| `email`        | User's email address |
| `crop_name`    | Crop being evaluated |
| `seed_variety` | Seed variety         |
| `germination`  | Germination result   |
| `growth`       | Growth observation   |
| `rating`       | Rating from 1 to 5   |
| `feedback`     | Written feedback     |

> **Note:** The provided project files do not contain the SQL schema for creating these tables. Make sure the database structure and column types match the PHP code before deployment.

---

## ⚙️ Installation & Setup

### 1. Install a PHP/MySQL Environment

Install a local PHP and MySQL development environment such as:

* XAMPP
* WAMP
* LAMP
* Any PHP-compatible web server

### 2. Create the Database

Create a MySQL database and add the required:

* `users` table
* `feedback` table

Ensure that the column names match those expected by the PHP application.

### 3. Configure Database Connection

Open:

```text
db.php
```

Configure the database connection using your own:

```text
Database Host
Database Username
Database Password
Database Name
```

> ⚠️ **Security:** Never publish database passwords or other private credentials in a public GitHub repository.

### 4. Upload the Project

Place the project files inside your web server's document root.

For **InfinityFree hosting**, website files are placed inside the `/htdocs` directory.

Make sure your custom:

```text
index.php
```

is used as the application's home page.

The default `index2.html` file supplied by InfinityFree can be removed when the custom application is ready.

### 5. Run the Application

Open the application in your browser and follow these steps:

1. Create a new account.
2. Log in using your registered credentials.
3. Submit seed performance feedback.
4. View the submitted feedback.
5. Log out of the application.

---

## 🔐 Security

The project already implements several useful security practices.

### Implemented

* Password hashing using `password_hash()`.
* Password verification using `password_verify()`.
* Prepared SQL statements for database operations.
* PHP sessions for authentication.
* Access protection for authenticated pages.

### Recommended Improvements

For production deployment, consider implementing:

* CSRF protection for forms.
* Stronger server-side input validation.
* Output escaping for all user-generated content.
* Secure session cookie settings.
* Login rate limiting.
* Improved error handling.
* Environment variables for database credentials.
* Authorization controls for the feedback viewing page.

---

## 🧪 Testing Checklist

Before deploying the application, verify the following:

* [ ] New users can register successfully.
* [ ] Duplicate email registration is rejected.
* [ ] Registered users can log in.
* [ ] Incorrect passwords are rejected.
* [ ] Unauthenticated users cannot access protected pages.
* [ ] Users can submit seed feedback.
* [ ] Ratings are restricted to the intended 1–5 range.
* [ ] Submitted feedback is stored correctly.
* [ ] Submitted feedback can be viewed.
* [ ] Logout successfully destroys the session.
* [ ] Database connection errors are handled properly.
* [ ] Database credentials are not exposed publicly.

---

## ⚠️ Important Deployment Note

The database configuration file contains database credentials.

**Do not commit database credentials to GitHub.**

Before publishing this project publicly:

1. Remove sensitive credentials from the source code.
2. Store credentials using environment variables or a protected configuration file.
3. If credentials have already been exposed publicly, **change/rotate the database password immediately**.

---

## 🚀 Future Improvements

The project can be further enhanced with the following features:

* 👨‍💼 Admin dashboard
* 🔎 Search and filtering by crop or seed variety
* 📊 Average seed rating statistics
* 📈 Germination and growth charts
* 👤 User profile management
* 🔑 Password reset functionality
* 📄 Pagination for large feedback datasets
* 📱 Improved mobile navigation
* ✅ Advanced form validation
* 💬 Improved error and success messages
* 🗃️ Database migration files
* 📋 Complete SQL database schema

---

## 📄 License

No license information was included with the provided project.

If this project is intended for public distribution or open-source use, add an appropriate license such as **MIT License**.

---

## 👨‍💻 Project Summary

The **Seed Quality & Performance Feedback System** is a PHP and MySQL web application developed to collect structured feedback about **seed quality, germination, growth, and overall performance**.

The system provides a straightforward workflow:

```text
Registration
     ↓
Login
     ↓
Authenticated Dashboard
     ↓
Submit Seed Feedback
     ↓
Store Data in MySQL
     ↓
View Feedback
     ↓
Logout
```

The project is suitable for **academic projects, demonstrations, and small web application prototypes**. It can be further developed with administrative features, analytics, improved validation, reporting, and production-level security.

---

### 🌱 Built for Better Seed Evaluation
