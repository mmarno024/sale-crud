## Require

-   PHP Version 8.0 - 8.1
-   Composer
-   MySQL

## Installation

-   Clone code from GIT
-   Open terminal, cd to directory project and run <strong>composer install</strong>
-   Run <strong>php artisan key:generate</strong>
-   Create <strong>Database</strong> in MySQL
-   Copy <strong>.env.example</strong>, rename to <strong>.env</strong> and edit connection database
-   Run <strong>php artisan migrate</strong>
-   Run <strong>php artisan db:seed --class=UserSeeder</strong>
-   Run <strong>php artisan db:seed --class=ItemSeeder</strong>
-   Run <strong>php artisan cache:clear</strong>
-   Run <strong>php artisan route:clear</strong>
-   Run <strong>php artisan config:cache</strong>
-   Run <strong>php artisan serve</strong>

## Running

-   Run <strong>php artisan serve</strong>
-   Open URL in Browser

## Screenshot

1. Login
   ![Login](./screenshots/1.login.png)

2. Home
   ![Home](./screenshots/2.home.png)

3. Users
   ![Users](./screenshots/3.user-list.png)

    Create User
    ![Create User](./screenshots/4.user-create.png)

    Edit User
    ![Edit User](./screenshots/5.user-edit.png)

    Delete User
    ![Delete User](./screenshots/6.user-delete.png)

    Detail User
    ![Detail User](./screenshots/7.user-detail.png)

4. Items
   ![Items](./screenshots/8.item-list.png)

    Create Item
    ![Create Item](./screenshots/9.item-create.png)

    Edit Item
    ![Edit Item](./screenshots/10.item-edit.png)

    Delete Item
    ![Delete Item](./screenshots/11.item-delete.png)

    Detail Item
    ![Detail Item](./screenshots/12.item-detail.png)

5. Sales
   ![Sales](./screenshots/5.sale-list.png)

    Create Sale
    ![Create Sale](./screenshots/13.sale-create.png)

    Edit Sale
    ![Edit Sale](./screenshots/14.sale-edit.png)

    Delete Sale
    ![Delete Sale](./screenshots/15.sale-delete.png)

    Detail Sale
    ![Detail Sale](./screenshots/16.sale-detail.png)

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

-   **[Vehikl](https://vehikl.com/)**
-   **[Tighten Co.](https://tighten.co)**
-   **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
-   **[64 Robots](https://64robots.com)**
-   **[Cubet Techno Labs](https://cubettech.com)**
-   **[Cyber-Duck](https://cyber-duck.co.uk)**
-   **[Many](https://www.many.co.uk)**
-   **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
-   **[DevSquad](https://devsquad.com)**
-   **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
-   **[OP.GG](https://op.gg)**
-   **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
-   **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
