# Var Dumper Twig

Extend Twig with [symfony/var-dumper](https://symfony.com/doc/current/components/var_dumper.html) component functionality.

## Installation

Install the package:
```bash
composer require nxsspryker/var-dumper-twig
```

Register the service provider in `Pyz\Yves\ShopApplication\YvesBootstrap`:

```php
<?php

namespace Pyz\Yves\ShopApplication;

use NxsSpryker\Yves\VarDumperTwig\Plugin\ServiceProvider\VarDumperTwigServiceProvider;
use SprykerShop\Yves\ShopApplication\YvesBootstrap as SprykerYvesBootstrap;

class YvesBootstrap extends SprykerYvesBootstrap
{
    /**
     * @return void
     */
    protected function registerServiceProviders()
    {
        // ...
        $this->application->register(new VarDumperTwigServiceProvider());
    }
}
```