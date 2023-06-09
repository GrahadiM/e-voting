# Job Finder with Laravel 8
## Description
This is Job Finder uses Laravel 8.

## Technologies
### Frontend
- HTML
- CSS
- JavaScript
- Bootstrap

### Backend
- Laravel 8
- Node Js
### Database or Data
- MySQL
## Folder Structure
- app
  - Http
    - Controllers
    - Middleware
  - Models
  - Providers
- database
  - data
  - migrations
  - seeders
- public
  - user
    - assets
- resources
  - views
- routes
  - web.php

## Demo *(in development)*

<details>
	<summary>Home Page</summary>
	
![Home Page](public/images/home.png)
</details>

<details>
	<summary>Category</summary>
	
![Category](public/images/category.png)
</details>

<details>
	<summary>Job List</summary>
	
![Job List](public/images/job-list.png)
</details>

<details>
	<summary>Job Detail</summary>
	
![Job Detail](public/images/job-detail.png)
</details>

<details>
	<summary>About</summary>
	
![About](public/images/about.png)
</details>

<details>
	<summary>Contact</summary>
	
![Contact](public/images/contact.png)
</details>

## Installation
### Clone Repo

```bash
git clone https://github.com/GrahadiM/job-finder.git
```
### Go to folder

```bash
cd job-finder
```
### Install App with composer

```bash
composer install
```
or
```bash
composer update
```
### Clone and Setting file .env

```bash
cp .env.example .env
```
### Push Migration or Database

```bash
php artisan migrate:fresh --seed
```
### Install and build App with npm

```bash
npm install
```
and
```bash
npm run dev
```
### Run App

```bash
php artisan serve
```
