# ShopHub — E-commerce REST API

A production-minded e-commerce backend built with **Laravel 12** and **PHP 8.4**. Powers a storefront frontend with products, cart, checkout, orders, payments, reviews, coupons, and authentication (including Google OAuth).

This project is a portfolio piece focused on **correctness and security**, not just feature count — money math, race conditions, authorization, and data leakage were each audited and tested.

---

## Tech Stack

| Layer      | Choice                                                                               |
| ---------- | ------------------------------------------------------------------------------------ |
| Framework  | Laravel 12 (streamlined structure — no `Http/Kernel`, config in `bootstrap/app.php`) |
| Language   | PHP 8.4                                                                              |
| Auth       | Laravel Sanctum (token), Laravel Socialite (Google OAuth)                            |
| Database   | PostgreSQL                                                                           |
| Testing    | PHPUnit 11 — 58 feature/unit tests                                                   |
| Formatting | Laravel Pint                                                                         |
| API docs   | Scribe (HTML docs + Postman collection)                                              |

---

## Features

- **Catalog** — products, categories, brands, product images; search, filtering, sorting, pagination.
- **Cart & checkout** — cart items, shipping methods, coupon validation, order placement.
- **Orders & payments** — order lifecycle, simulated payment gateway, refunds.
- **Reviews** — per-product reviews with one-review-per-user constraint and idempotent "helpful" voting.
- **Accounts** — registration, login, Google OAuth, addresses, wishlist, profile.
- **Admin** — product/category/brand management behind an admin role gate.

---

## API Design

- Versioned under `/v1/*`.
- Consistent JSON envelope: `{ "success": true, "data": ..., "meta": ... }`.
- List endpoints paginated, `per_page` capped to prevent DoS.
- Eloquent API Resources hide internal fields (`cost_price`, `stock`, timestamps) from public responses.
- Public product pages resolve by **slug**, not numeric id (SEO-friendly URLs).
- Validation isolated in Form Request classes.
- Errors always rendered as JSON for `/v1/*`; exception messages are not leaked to clients.

### Example endpoints

```
GET  /v1/products                    # paginated, filterable list
GET  /v1/products/{slug}             # product detail + images
GET  /v1/products/{slug}/related     # up to 4 same-category products
POST /v1/auth/login                  # rate-limited (5 attempts / IP)
POST /v1/coupons/validate            # authenticated
```

Full reference: import `postman-collection.json` into Postman, or run `php artisan scribe:generate` for HTML docs.

---

## Engineering Highlights

- **Money math** — all monetary values handled with `bcmath` at scale 2; no float arithmetic on prices, discounts, or refunds.
- **Concurrency** — order stock decrement and payment processing wrapped in DB transactions; `random_bytes`-based identifiers instead of collision-prone `uniqid()`.
- **Authorization** — admin routes gated; mass-assignment hardened (`role` / `is_active` removed from `$fillable`).
- **Data integrity** — unique constraints on OAuth `provider_id` and on `reviews(user_id, product_id)`.
- **Service layer** — business logic (`OrderService`, `PaymentService`, `CartService`, `CouponService`) kept out of controllers.
- **Security audit** — exception-message leakage, unbounded pagination, OAuth account-linking, and sort-field injection were each found and fixed (see git history).

---

## Getting Started

### Requirements

- PHP 8.4, Composer
- PostgreSQL
- Node.js (for asset build, optional for API-only use)

### Setup

composer install
cp .env.example .env
php artisan key:generate

# configure DB credentials in .env, then:

php artisan migrate --seed

php artisan serve # http://localhost:8000

````

### Google OAuth (optional)
Set `GOOGLE_CLIENT_ID`, `GOOGLE_CLIENT_SECRET`, `GOOGLE_REDIRECT_URI` in `.env`.

---

## Testing

```bash
php artisan test                                  # full suite (58 tests)
php artisan test --filter=ProductDetailTest       # single class
````

Tests cover happy paths, failure paths, and edge cases — pagination caps, field-leak prevention, refund accounting, review uniqueness, and authorization.

---

## Project Structure

```
app/Http/Controllers   # thin controllers, grouped (Product/, Auth/)
app/Http/Requests      # Form Request validation
app/Http/Resources     # API Resources (response shaping)
app/Services           # OrderService, PaymentService, CartService, CouponService
app/Models             # 16 Eloquent models
database/migrations    # 25 migrations
tests/Feature          # feature tests
routes/api.php         # versioned API routes + middleware groups
```

---

## License

MIT.
