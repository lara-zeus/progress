<p align="center">
<a href="https://larazeus.com"><img src="https://larazeus.com/images/lara-zeus-progress.webp?v=3" /></a>
</p>

## This is a fork from [filaprogress](https://github.com/ibrahimBougaoua/filaprogress), fully maintained and up to date.

<h4 align="center">The Progress Management Package for FilamentPHP provides a flexible and easy-to-use solution for tracking and visualizing progress within Filament admin panels. It includes custom Filament components for displaying linear and circular progress indicators directly in your admin interface. This package is designed to seamlessly integrate with Filament's existing tools, offering dynamic and customizable progress bars and circles to represent task completion, project milestones, or any metric that requires visual progress tracking. Perfect for enhancing the user experience in admin dashboards with intuitive, real-time progress displays.</h4>

<p align="center">

[![Latest Version on Packagist](https://img.shields.io/packagist/v/lara-zeus/progress.svg?style=flat-square)](https://packagist.org/packages/lara-zeus/progress)
[![Tests](https://img.shields.io/github/actions/workflow/status/lara-zeus/progress/run-tests.yml?label=tests&style=flat-square&branch=main)](https://github.com/lara-zeus/progress/actions?query=workflow%3Arun-tests+branch%3Amain)
[![Code Style](https://img.shields.io/github/actions/workflow/status/lara-zeus/progress/fix-php-code-style-issues.yml?label=code-style&flat-square)](https://github.com/lara-zeus/progress/actions?query=workflow%3Afix-php-code-style-issues+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/lara-zeus/progress.svg?style=flat-square)](https://packagist.org/packages/lara-zeus/progress)
[![Total Stars](https://img.shields.io/github/stars/lara-zeus/progress?style=flat-square)](https://github.com/lara-zeus/progress)

</p>

## Support Filament

<a href="https://github.com/sponsors/danharrin">
<img alt="filament-logo" src="https://larazeus.com/images/filament-sponsor-banner.webp">
</a>

## Installation

You can install the package via composer:

```bash
composer require lara-zeus/progress
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="progress-views"
```

## Usage

```php
// For infolist
use LaraZeus\Progress\Infolists\Components\CircleProgressEntry;
use LaraZeus\Progress\Infolists\Components\ProgressBarEntry;

return $infolist
    ->schema([
        CircleProgressEntry::make('circle')
            ->getStateUsing(function ($record) {
                $total = $record->items()->count();
                $progress = $record->countPaidItems();
                return [
                    'total' => $total,
                    'progress' => $progress,
                ];
            })
            ->hideProgressValue(),
        ProgressBarEntry::make('bar')
            ->getStateUsing(function ($record) {
                $total = $record->items()->count();
                $progress = $record->countPaidItems();
                return [
                    'total' => $total,
                    'progress' => $progress,
                ];
            })
            ->hideProgressValue(),

```

```php
// For table
use LaraZeus\Progress\Tables\Columns\CircleProgress;
use LaraZeus\Progress\Tables\Columns\ProgressBar;

return $table
    ->columns([
        CircleProgress::make('circle')
            ->getStateUsing(function ($record) {
                $total = $record->items()->count();
                $progress = $record->countPaidItems();
                return [
                    'total' => $total,
                    'progress' => $progress,
                ];
            })
            ->hideProgressValue(),
        ProgressBar::make('bar')
            ->getStateUsing(function ($record) {
                $total = $record->items()->count();
                $progress = $record->countPaidItems();
                return [
                    'total' => $total,
                    'progress' => $progress,
                ];
            })
            ->hideProgressValue(),
```

## Demo

> Visit our demo site: https://translatable.larazeus.com/admin/books


## Full Documentation

> Visit our website to get the complete documentation: https://larazeus.com/docs/progress

## Testing

```bash
composer test
```

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Lara Zeus](https://github.com/lara-zeus)
- [ibrahimBougaoua](https://github.com/ibrahimBougaoua/filaprogress)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
