<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

//menubar: inventory



api install:  php artisan install:api

php artisan make:controller Api/CustomerController --api


******
prompt: 
------
You are a senior Laravel architect and Point-of-Sale (POS) system engineer with real production experience building Coffee Shop POS systems.

I have provided you with an existing Laravel Coffee Shop POS dashboard project.
The UI and folder structure already exist, but the project is not fully functional and lacks real business logic.

Your task is to analyze the existing codebase and transform it into a fully working Coffee Shop POS system, where creating an order correctly triggers all POS, inventory, invoice, and dashboard logic.

📁 Project Rules (Very Important)

Framework: Laravel

This is NOT a new project

DO NOT rewrite from scratch

DO NOT change the folder structure

Implement logic using existing directories:

app/Models

app/Http/Controllers

app/Services

database/migrations

resources/views

routes

Respect existing Blade views and routes where possible

☕ Core Business Goal

When an order is placed from the POS:

Stock is validated and deducted

Order and order items are saved

Payment is processed

Invoice is generated

Dashboard metrics update correctly

Everything must work end-to-end.

🎯 Functional Requirements
1️⃣ Products & Categories

Products belong to categories

Products have:

name

SKU

price

cost

stock quantity

image

status (active/inactive)

Only active products appear in POS

Out-of-stock products cannot be sold

2️⃣ POS Cart & Checkout

Add/remove products to cart

Update quantities

Real-time calculation of:

subtotal

tax (configurable)

discount (optional)

grand total

Prevent checkout if:

cart is empty

stock is insufficient

3️⃣ Orders & Payments

Create order with:

unique order number

cashier (if available)

payment method (cash/card)

subtotal, tax, discount, total

Save order items with quantity and price

Use database transactions

Handle failures safely

4️⃣ Inventory Management

Deduct stock on successful order

Lock rows to prevent race conditions

Maintain inventory accuracy at all times

Fail order if stock changes mid-checkout

5️⃣ Invoice / Receipt Generation

Generate invoice for each completed order

Printable (browser-friendly)

Include:

shop info

order number

items

totals

tax

payment method

date/time

6️⃣ Coffee Shop Dashboard

Dashboard must show real data, not placeholders:

Today’s sales total

Total orders today

Monthly revenue

Best-selling products

Low-stock alerts

Dashboard values must update immediately after an order is placed.

🧠 Technical Implementation Rules

Use Eloquent relationships correctly

Business logic must live in Service classes

Controllers must remain thin

Use Form Requests for validation

Use database transactions & row locking

Follow Laravel best practices

Code must be copy-paste runnable

No pseudo-code

No mock logic

📦 Required Deliverables

For each implemented feature, provide:

Database migrations

Models with relationships

Controllers

Service classes

Routes

Blade views (only where logic is required)

Seeders with realistic sample data

🚫 Hard Restrictions

Do NOT invent unrelated features

Do NOT simplify POS logic

Do NOT skip error handling

Do NOT break existing UI

Do NOT output incomplete code

📌 Output Format

Brief explanation of what is fixed/added

Then provide actual Laravel code

Split output into logical sections

If code is large, deliver in multiple parts

❓ Clarification Rule

If any business rule is unclear (tax %, currency, discounts, invoice format),
STOP and ask before proceeding.

*******
