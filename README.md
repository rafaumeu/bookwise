<div align="center">
  <img width="100%" src="https://capsule-render.vercel.app/api?type=waving&color=FF0080&height=180&section=header&text=BookWise&fontSize=42&fontColor=fff&animation=fadeIn&fontAlignY=35&desc=PHP%20Book%20Management%20System&descSize=18&descAlignY=52"/>
</div>

<p align="center">
  <img src="https://img.shields.io/badge/PHP_8.3-777BB4?style=for-the-badge&logo=php" alt="PHP 8.3"/>
  <img src="https://img.shields.io/badge/SQLite-003B57?style=for-the-badge&logo=sqlite" alt="SQLite"/>
  <img src="https://img.shields.io/badge/PHPStan-263238?style=for-the-badge" alt="PHPStan"/>
  <img src="https://img.shields.io/badge/Clean_Architecture-FF0080?style=for-the-badge" alt="Clean Architecture"/>
  <img src="https://img.shields.io/badge/SOLID-4CAF50?style=for-the-badge" alt="SOLID"/>
</p>

## Overview

A book management system built with **PHP 8.3** and **SQLite**, applying **Clean Architecture** and **SOLID principles**. Designed as a reference implementation for writing maintainable, testable PHP code with strict typing.

## Features

- Book CRUD operations with validation
- Student management and tracking
- Book rental/return system
- Strict types enforcement throughout
- PHPStan level 8+ static analysis
- Clean separation of concerns (Entities, Use Cases, Repositories)

## Tech Stack

| Technology | Purpose |
|---|---|
| **PHP 8.3** | Core language with strict types |
| **SQLite** | Lightweight embedded database |
| **PHPStan** | Static analysis tool |
| **PHPUnit/Pest** | Testing framework |

## Architecture

```
src/
├── Entities/          # Domain entities (Book, Student)
├── UseCases/          # Application business rules
├── Repositories/      # Data access interfaces
└── Infra/             # Infrastructure implementations
```

## Getting Started

```bash
git clone https://github.com/rafaumeu/bookwise.git
cd bookwise
composer install
php artisan serve
```

## What I Learned

- Clean Architecture applied to PHP
- SOLID principles in practice
- Value Objects and Entity design
- Repository pattern for data access
- Static analysis with PHPStan

## License

MIT

<div align="center">
  <img width="100%" src="https://capsule-render.vercel.app/api?type=waving&color=FF0080&height=100&section=footer"/>
  <br/>
  <sub>Built with ❤️ by <a href="https://github.com/rafaumeu">Rafael Zendron</a></sub>
</div>
