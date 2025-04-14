# Progress Indicators

# This is a fork from [filaprogress](https://github.com/atmonshi/filaprogress), fully maintained and up to date.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/lara-zeus/progress.svg?style=flat-square)](https://packagist.org/packages/lara-zeus/progress)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/lara-zeus/progress/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/lara-zeus/progress/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/lara-zeus/progress/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/lara-zeus/progress/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/lara-zeus/progress.svg?style=flat-square)](https://packagist.org/packages/lara-zeus/progress)

The Progress Management Package for FilamentPHP provides a flexible and easy-to-use solution for tracking and visualizing progress within Filament admin panels. It includes custom Filament components for displaying linear and circular progress indicators directly in your admin interface. This package is designed to seamlessly integrate with Filament's existing tools, offering dynamic and customizable progress bars and circles to represent task completion, project milestones, or any metric that requires visual progress tracking. Perfect for enhancing the user experience in admin dashboards with intuitive, real-time progress displays.

## Support us

[!["Buy Me A Coffee"](https://www.buymeacoffee.com/assets/img/custom_images/orange_img.png)](https://buymeacoffee.com/LaraZeus)

<a href="https://youtu.be/n9A5FUWPWO8" target="_blank">Youtube Video</a>

<br />

[![Total Downloads](https://raw.githubusercontent.com/filamentphp/filamentphp.com/dec76a6d43253f6e5947b3bcb99370c5a2509760/content/plugins/images/lara-zeus-progress.jpg)](https://packagist.org/packages/lara-zeus/progress)

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

## Testing

```bash
composer test
```

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Lara Zeus](https://github.com/lara-zeus)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
