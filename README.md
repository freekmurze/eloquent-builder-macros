# Eloquent builder macros

[![License](https://poser.pugx.org/exyplis/eloquent-builder-macros/license)](https://packagist.org/packages/exyplis/eloquent-builder-macros)
[![StyleCI](https://styleci.io/repos/115618166/shield?branch=master)](https://styleci.io/repos/115618166)


This package contains few helpful Eloquent builder macros.
Compatible with Laravel v5.4+

## Installation

You can install the package via composer:

```bash
composer require exyplis/eloquent-builder-macros
```
### Laravel 5.4
Add this entry to `providers` array in your `config/app.php` file.
```php
Exyplis\EloquentBuilderMacros\EloquentBuilderMacrosServiceProvider::class
```

### Laravel 5.5+
The package will automatically register itself, so you don't need to do anything else.

## Available macros
 - [`notEmptyWhere`](#notEmptyWhere)
 - [`notEmptyWhereIn`](#notEmptyWhereIn)

### `notEmptyWhere`
Check is passed parameter empty, and if not, adds `where` condition on `$column` to exiting query.
Useful when you have complex query, with a lot of constructions like


##### Signature:
```php
notEmptyWhere($column,$param)
```

##### Example:
```php
DummyModel::where('some_column','some_value')->notEmptyWhere('column',$request->input('key'))->get();
```
Same as:

```php
DummyModel::where('some_column','some_value')->when('$request->has('key'), function($query){
    return $query->where('column',$request->input('key');
})->get();
```

### `notEmptyWhereIn`
Check is passed parameter empty, and if not, adds `whereIn` condition on `$column` to exiting query.
In this case, `$param` should be array.

##### Signature:
```php
notEmptyWhereIn($column,$params)
```
##### Example:
```php
DummyModel::where('some_column','some_value')->notEmptyWhereIn('column',$request->input('user_ids'))->get()
```
// Same as:
```php
DummyModel::where('some_column','some_value')->when('$request->has('user_ids'), function($query){
    return $query->whereIn('user_id', $request->input('user_ids');
})->get();
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email bks@exyplis.com instead of using the issue tracker.

## Credits

- [Kostiantyn Bozhko](https://github.com/bozhkos)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
