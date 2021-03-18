# Filter Eloquent results via query URL

[![Latest Version on Packagist](https://img.shields.io/packagist/v/smartisan/laravel-query-filter.svg?style=flat-square)](https://packagist.org/packages/smartisan/laravel-query-filter)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/smartisan/laravel-query-filter/run-tests?label=tests)](https://github.com/iamohd/laravel-query-filter/actions?query=workflow%3ATests+branch%3Amaster)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/smartisan/laravel-query-filter/Check%20&%20fix%20styling?label=code%20style)](https://github.com/iamohd/laravel-query-filter/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/smartisan/laravel-query-filter.svg?style=flat-square)](https://packagist.org/packages/smartisan/laravel-query-filter)


Laravel query filter is a simple package that allows you to filter Eloquent results via URL query params.

## Installation

You can install the package via composer:

```bash
composer require smartisan/laravel-query-filter
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Smartisan\QueryFilter\QueryFilterServiceProvider" --tag="config"
```

## Usage
1. Create a new filter class using the following command
```bash
php artisan make:filter UserFilter
```

2. Prepare your model with filter trait
```php
use Smartisan\QueryFilter\HasFilters;

class User extends Model
{
    use HasFilters;
}
```

3. Add a new filter method with your logic to the generated filter class
```php
namespace App\Filters;

use Smartisan\QueryFilter\QueryFilter;

class UserFilter extends QueryFilter
{
    public function status($value)
    {
        return $this->builder->where('status', $value);
    }
}
```

4. To trigger the filter method, do the following in your controller
```php
public function index(UserFilter $filter)
{
    User::filter($filter)->get();
}
```

the status filter method will be triggered automatically when the URL contains the following query param ```?status=value```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Mohammed Isa](https://github.com/iamohd)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
