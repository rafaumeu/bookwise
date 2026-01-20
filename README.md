# 📚 Bookwise

![License](https://img.shields.io/badge/license-MIT-blue.svg?style=for-the-badge&logoScale=20)
[![Fix Code Style](https://img.shields.io/github/actions/workflow/status/rafaumeu/bookwise/lint.yml?branch=main&label=Build&logo=github&style=for-the-badge&logoScale=20)](https://github.com/rafaumeu/bookwise/actions/workflows/lint.yml)
![PHP](https://img.shields.io/badge/php-8.3-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white&logoScale=20)
![SQLite](https://img.shields.io/badge/sqlite-%2307405e.svg?style=for-the-badge&logo=sqlite&logoColor=white&logoScale=20)
![TailwindCSS](https://img.shields.io/badge/tailwindcss-%2338B2AC.svg?style=for-the-badge&logo=tailwind-css&logoColor=white&logoScale=20)

**Bookwise** is a comprehensive platform for book management and reviews. The project offers a fluid experience for cataloging your readings, sharing opinions, and discovering new titles.

Built with **Modern PHP**, Bookwise implements a secure and organized architecture, serving as a robust solution for tracking your literary journey.

## ✨ Features

- **🔐 Secure Authentication**: Complete Login and Registration system, protecting sensitive routes.
- **📚 Explore & Discover**: Visual book catalog with informative cards, average ratings, and authors.
- **🔍 Smart Search**: Find books by title, author, or keywords in the description.
- **⭐ Ratings & Reviews**: Rate books (1-5 stars) and write detailed reviews.
- **📸 Cover Uploads**: Register new books by uploading custom cover images.
- **📂 Public-Facing Architecture**: Directory structure optimized for security, isolating application logic from public access.

## 🚀 How to Run

### Prerequisites
- PHP 8.2 or higher
- SQLite3 extension enabled in `php.ini`

### Step by Step

1. **Clone the repository**
   ```bash
   git clone https://github.com/rafaumeu/bookwise.git
   cd bookwise
   ```

2. **Start the Server**
   Use the built-in PHP server pointing to the public folder:
   ```bash
   php -S localhost:8888 -t public
   ```

3. **Access the Project**
   Open your favorite browser at:
   [http://localhost:8888](http://localhost:8888)

## 🛠️ Tech Stack

- **Language**: PHP 8.3 (Focus on Typing and Modern Features)
- **Database**: SQLite (Lightweight and fast, no separate server needed)
- **Styling**: TailwindCSS (Modern and responsive design)
- **Pattern**: Simplified MVC (Model-View-Controller)

## 📂 Project Structure

```
bookwise/
├── App/                # Application Logic
│   ├── Controllers/    # HTTP Request Handlers
│   ├── Middlewares/    # Route Protection
│   └── Models/         # Data Entities
├── Core/               # Framework Core (Lockbox Standard)
│   ├── Database.php, Route.php, Session.php...
├── config/             # Configuration & Routes
├── public/             # Entry Point (index.php)
└── views/              # Frontend Templates
```

## 👨‍💻 Author
<div align="center">
<img style="border-radius: 50%;" src="https://avatars.githubusercontent.com/u/30784471?v=4" width="100px;" alt=""/>

Made with 💜 by **[Rafael Dias Zendron](https://github.com/rafaumeu)**

[![Linkedin Badge](https://img.shields.io/badge/-Rafael-blue?style=flat-square&logo=Linkedin&logoColor=white&link=https://www.linkedin.com/in/rafael-dias-zendron/)](https://www.linkedin.com/in/rafael-dias-zendron/) 
[![Gmail Badge](https://img.shields.io/badge/-mmmarckos@gmail.com-c14438?style=flat-square&logo=Gmail&logoColor=white&link=mailto:mmmarckos@gmail.com)](mailto:mmmarckos@gmail.com)
</div>