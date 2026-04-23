---
title: Filament
weight: 2
---

## Add Plugin to Panel

Register the plugin in your Filament panel provider:

```php
->plugins([
    PackagePlugin::make(),
])
```

Update `PackagePlugin` to the package plugin class.
