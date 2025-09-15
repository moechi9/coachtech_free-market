# 模擬案件初級_フリマアプリ

## 環境構築

### Docker ビルド

- 1.git clone git@github.com:git@github.com:Estra-Coachtech/coachtech_free-market.git
- 2.cd coachtech_free-market
- 3.DockerDesktop アプリを立ち上げる
- 4.docker-compose up -d --build

### Laravel 環境構築

- 1.docker-compose exec php bash
- 2.composer install
- 3.cp .env.example .env

```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass
```

- php artisan key:generate
- php artisan migrate
- php artisan db:seed

## 使用技術

## ER図

## URL

## ログインデータ
