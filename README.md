# E-Voting with Laravel 8
## Description
This is E-Voting uses Laravel 8.

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
	
![Home Page](public/images/screenshot/index.png)
</details>

<details>
	<summary>Kandidat</summary>
	
![Kandidat](public/images/screenshot/kandidat.png)
</details>

<details>
	<summary>Detail Kandidat</summary>
	
![Detail Kandidat](public/images/screenshot/detail-kandidat.png)
</details>

<details>
	<summary>Pilih Kandidat</summary>
	
![Pilih Kandidat](public/images/screenshot/vote-kandidat.png)
</details>

<details>
	<summary>Jumlah Vote</summary>
	
![Jumlah Vote](public/images/screenshot/jumlah-vote.png)
</details>

<details>
	<summary>Notify</summary>
	
![Notify](public/images/screenshot/notify.png)
</details>

## Installation
### Clone Repo

```bash
git clone https://github.com/GrahadiM/e-voting.git
```
### Go to folder

```bash
cd e-voting
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
