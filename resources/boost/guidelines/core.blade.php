# Lara Zeus Progress (`lara-zeus/progress`)

FilamentPHP table columns and infolist entries for visualizing progress as horizontal bars or circular rings.

## Key Classes
- **Table Columns**:
  - `LaraZeus\Progress\Tables\Columns\ProgressBar` (extends `LaraZeus\Progress\Tables\Columns\Progress`)
  - `LaraZeus\Progress\Tables\Columns\CircleProgress` (extends `LaraZeus\Progress\Tables\Columns\Progress`)
- **Infolist Entries**:
  - `LaraZeus\Progress\Infolists\Components\ProgressBarEntry` (extends `LaraZeus\Progress\Infolists\Components\ProgressEntry`)
  - `LaraZeus\Progress\Infolists\Components\CircleProgressEntry` (extends `LaraZeus\Progress\Infolists\Components\ProgressEntry`)
- **Service Provider**: `LaraZeus\Progress\ProgressServiceProvider` (`->name('lara-zeus-progress')`)

## Rules & Anti-Patterns
- **No Filament Panel Plugin**: Do not register a panel plugin; use the column/entry classes directly.
- **Required array state shape**: Both `Progress` and `ProgressEntry` call `getProgressData(array $state)` expecting `['total' => int|float, 'progress' => int|float]`. Always supply this shape via `->getStateUsing(...)` (or an array model attribute); passing `null` or a scalar triggers a `TypeError`.
- **Hide percentage label**: Call `->hideProgressValue()` (sets `$canShow = false`) when only the visual bar/circle should be shown.
- **Theme CSS**: Add `@source "../../vendor/lara-zeus/progress/resources/views/**/*.blade.php";` to your CSS when using Tailwind CSS v4.
