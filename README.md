# 📚 Bookwise

![License](https://img.shields.io/badge/license-MIT-blue.svg)
![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
![SQLite](https://img.shields.io/badge/sqlite-%2307405e.svg?style=for-the-badge&logo=sqlite&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/tailwindcss-%2338B2AC.svg?style=for-the-badge&logo=tailwind-css&logoColor=white)

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
├── controllers/    # Route control logic
├── models/         # Database access classes (Active Record pattern)
├── views/          # HTML/PHP Templates
├── public/         # Web server root (Assets, index.php)
├── database.sqlite # Local database
└── config.php      # General configuration
```

## 👨‍💻 Author

<img style="border-radius: 50%;" src="https://avatars.githubusercontent.com/u/30784471?v=4" width="100px;" alt=""/>

Made with 💜 by **[Rafael Dias Zendron](https://github.com/rafaumeu)**

[![Linkedin Badge](https://img.shields.io/badge/-Rafael-blue?style=flat-square&logo=Linkedin&logoColor=white&link=https://www.linkedin.com/in/rafael-dias-zendron/)](https://www.linkedin.com/in/rafael-dias-zendron/) 
[![Gmail Badge](https://img.shields.io/badge/-mmmarckos@gmail.com-c14438?style=flat-square&logo=Gmail&logoColor=white&link=mailto:mmmarckos@gmail.com)](mailto:mmmarckos@gmail.com)
