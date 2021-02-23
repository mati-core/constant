# Mati-Core | Constant

[![Downloads this Month](https://img.shields.io/packagist/dm/mati-core/constant.svg)](https://packagist.org/packages/mati-core/constant)
[![Build Status Windows](https://ci.appveyor.com/api/projects/status/github/mati-core/constant?branch=main&svg=true)](https://packagist.org/packages/mati-core/constant)
[![Latest Stable Version](https://poser.pugx.org/mati-core/constant/v/stable)](https://github.com/mati-core/constant/releases)
[![License](https://img.shields.io/badge/license-MIT-yellow.svg)](https://github.com/mati-core/constant/blob/master/license.md)

Database constants for Mati-Core

Install
-------

```bash
composer require mati-core/constant
```

Using
-----

**Include to presenter**
```php
class *Presenter extends BasePresenter{

    /**
    *   @var \MatiCore\Core\Constant\ConstantManagerAccessor
    *   @include 
    */
    public $constantManager;

}
```

**Load constant value**

```php
$this->constantManager->get()->get('constant-key');
```

**Set constant value**

```php
$this->constantManager->get()->set('constant-key', $value);
```
