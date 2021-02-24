# Mati-Core | Constant

[![Latest Stable Version](https://poser.pugx.org/mati-core/constant/v)](//packagist.org/packages/mati-core/constant)
[![Total Downloads](https://poser.pugx.org/mati-core/constant/downloads)](//packagist.org/packages/mati-core/constant)
![Integrity check](https://github.com/mati-core/constant/workflows/Integrity%20check/badge.svg)
[![Latest Unstable Version](https://poser.pugx.org/mati-core/constant/v/unstable)](//packagist.org/packages/mati-core/constant)
[![License](https://poser.pugx.org/mati-core/constant/license)](//packagist.org/packages/mati-core/constant)

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
use \MatiCore\Constant\ConstantManagerAccessor;

class *Presenter extends BasePresenter
{

    /**
    *   @var ConstantManagerAccessor
    *   @inject 
    */
    public ConstantManagerAccessor $constantManager;

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
