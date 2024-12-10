# CIRT-ENT

How to install this project:

## Clonning from repo

Using Http

```bash
git clone https://github.com/Webmaster-ENT/ent-cirt.git
```

Using SSH

```bash
git clone git@github.com:Webmaster-ENT/ent-cirt.git
```

## Setup Project

Download dependencies

```bash
composer install
npm install
```

Copy .env-example

> Setting your environment

```bash
cp .env-example .env
```

Generate app key

```bash
php artisan key:generate
```

Migrate database and seeder the database

```bash
php artisan migrate --seed
```

## Run program

Laravel

```bash
php artisan serve
```

NPM

```bash
npm run dev
```

## Login

username: admin@ent.pens.ac.id <br>
password: password
