# Laravel Scopes

[![Latest Version on Packagist](https://img.shields.io/packagist/v/curly-deni/laravel-scopes.svg?style=flat-square)](https://packagist.org/packages/curly-deni/laravel-scopes)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/curly-deni/laravel-scopes/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/curly-deni/laravel-scopes/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/curly-deni/laravel-scopes.svg?style=flat-square)](https://packagist.org/packages/curly-deni/laravel-scopes)

**Laravel Scopes** provides a set of reusable Eloquent global scopes to control model visibility based on user ownership and public/private status.  
It is designed for easy integration with Laravel's authorization policies.

---

## Features

- ✅ Simple and lightweight integration
- ✅ Reusable Eloquent scopes for ownership and visibility
- ✅ Works seamlessly with Laravel Policies
- ✅ No manual query building required
- ✅ Clean separation of concerns between data and authorization

---

## Installation

Install the package via Composer:

```bash
composer require curly-deni/laravel-scopes
```

---

## Usage

All traits are located under the `Aesis\Scopes\Traits` namespace.

### Available traits

- `HasOwnershipScope` — restricts access to models owned by the current user (`user_id` field required).
- `HasPublicScope` — restricts access to public models (`public` field required).
- `HasPrivateScope` — restricts access to private models (`private` field required).
- `HasSelfScope` — allows users to see their own models in addition to public/private ones (`user_id` field required).

---

## Usage Scenarios

### 1. Restrict models to the owner only

Use `HasOwnershipScope` when users should only see their own models.

```php
use Aesis\Scopes\Traits\HasOwnershipScope;

class Post extends Model
{
    use HasOwnershipScope;
}
```

---

### 2. Restrict models based on public/private status

Use `HasPublicScope` or `HasPrivateScope` to filter models by their visibility flag.  
Optionally, add `HasSelfScope` to also allow users to see their own models.

```php
use Aesis\Scopes\Traits\HasPublicScope;
use Aesis\Scopes\Traits\HasSelfScope;

class Post extends Model
{
    use HasPublicScope, HasSelfScope;
}
```

---

## Trait Selection Guide

| Use Case | Required Traits |
|:---------|:----------------|
| Users should see **only their own models** | `HasOwnershipScope` |
| Users should see **only public models** | `HasPublicScope` |
| Users should see **only private models** | `HasPrivateScope` |
| Users should see **public models** and **their own private models** | `HasPublicScope` + `HasSelfScope` |
| Users should see **private models** and **their own private models** | `HasPrivateScope` + `HasSelfScope` |

---

## Database Requirements

| Trait | Required Field |
|:------|:---------------|
| `HasPublicScope` | `public` |
| `HasPrivateScope` | `private` |
| `HasOwnershipScope` | `user_id` |
| `HasSelfScope` | `user_id` |

---

## Policy Requirements

When using scopes, you should define the following permissions in your model policies:

| Method | Purpose |
|:-------|:--------|
| `viewPrivate(User $user)` | Allows a user to view **private models** (e.g., admins or users with special roles). |
| `viewForeign(User $user)` | Allows a user to view **other users' models** (in addition to their own, if `HasSelfScope` is used). |

Example policy:

```php
class PostPolicy
{
    public function viewPrivate(User $user): bool
    {
        // Allow access to private models for admins
        return $user->is_admin;
    }

    public function viewForeign(User $user): bool
    {
        // Allow users to view models owned by others
        return $user->can('view-others-posts');
    }
}
```

---

## Restrictions

- `HasOwnershipScope` **cannot** be combined with any other traits.
- `HasPublicScope` and `HasPrivateScope` **cannot** be used together.
- `HasSelfScope` **requires** either `HasPublicScope` or `HasPrivateScope`.

---

## Credits

- [Danila Mikhalev](https://github.com/curly-deni)
- [All Contributors](../../contributors)

---

## License

The MIT License (MIT).  
Please see the [LICENSE.md](LICENSE.md) file for more information.

---

## Summary

Laravel Scopes help you automatically filter models by ownership or visibility status without writing repetitive query logic.  
Combined with authorization policies, it provides flexible and secure access control at the Eloquent level.
