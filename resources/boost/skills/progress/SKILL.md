---
name: zeus-progress
description: Use when rendering progress bars or circular progress indicators in Filament tables and infolists with lara-zeus/progress.
---

# Lara Zeus Progress

## Overview & Requirements
`lara-zeus/progress` provides progress bar and circular progress components for FilamentPHP Tables and Infolists.
- **PHP**: `^8.2`
- **Filament**: `^5.0`
- **Package Name**: `lara-zeus/progress` (Service Provider: `LaraZeus\Progress\ProgressServiceProvider`)

## Installation
```bash
composer require lara-zeus/progress
```

## Configuration & Migrations
No migrations or config files are required.

Optionally publish the views:
```bash
php artisan vendor:publish --tag="lara-zeus-progress-views"
```

When using Tailwind CSS v4 with a custom Filament theme, add the view source path to your CSS entry file:
```css
@source "../../vendor/lara-zeus/progress/resources/views/**/*.blade.php";
```

## Filament Panel Registration
No panel plugin registration is required. Use the table columns and infolist entries directly.

## Core Usage & Examples

### State Shape & Color Thresholds
Both `Progress::getProgressData(array $state)` and `ProgressEntry::getProgressData(array $state)` expect an array with `'total'` and `'progress'` keys and automatically calculate percentage and color:
- `100%`: `#2980b9` (blue)
- `> 50%`: `#27ae60` (green)
- `> 25%`: `#f39c12` (orange)
- `<= 25%`: `#e74c3c` (red)

### Table Columns (`CircleProgress`, `ProgressBar`)
```php
use LaraZeus\Progress\Tables\Columns\CircleProgress;
use LaraZeus\Progress\Tables\Columns\ProgressBar;

CircleProgress::make('circle')
    ->getStateUsing(fn ($record): array => [
        'total' => $record->items()->count(),
        'progress' => $record->completedItems()->count(),
    ]);

ProgressBar::make('bar')
    ->getStateUsing(fn ($record): array => [
        'total' => 100,
        'progress' => $record->completion_percentage,
    ])
    ->hideProgressValue();
```

### Infolist Entries (`CircleProgressEntry`, `ProgressBarEntry`)
```php
use LaraZeus\Progress\Infolists\Components\CircleProgressEntry;
use LaraZeus\Progress\Infolists\Components\ProgressBarEntry;

CircleProgressEntry::make('circle')
    ->getStateUsing(fn ($record): array => [
        'total' => $record->total_tasks,
        'progress' => $record->done_tasks,
    ]);

ProgressBarEntry::make('bar')
    ->getStateUsing(fn ($record): array => [
        'total' => $record->total_tasks,
        'progress' => $record->done_tasks,
    ])
    ->hideProgressValue();
```

## Common Pitfalls / Anti-Patterns
- **Missing array state**: Leaving the column/entry bound to an integer or `null` attribute without `->getStateUsing(...)` causes a `TypeError` in `getProgressData(array $state)`.
- **Zero total**: When `'total' => 0`, percentage safely evaluates to `0` (`$total > 0 ? ($progress / $total) * 100 : 0`).
