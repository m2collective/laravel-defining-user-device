# Defining User Device

A package for detecting the user's device.

![Laravel](https://img.shields.io/badge/laravel-^13.0-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/php-^8.3-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)

___

## Installation

You can install the package via composer:

```shell
composer require m2collective/laravel-defining-user-device
```

The package will automatically register itself.

## Usage

By installing the package, determine the user's device type.

### Dependency injection

An example of using a package with the dependency injection:

```php
use M2Collective\DefiningUserDevice\DefiningUserDevice;

final class Example 
{
    /**
     * @var DefiningUserDevice 
     */
    protected DefiningUserDevice $definingUserDevice;
    
    /**
     * @param DefiningUserDevice $definingUserDevice
     */
    public function __construct(
        DefiningUserDevice $definingUserDevice
    ) {
        $this->definingUserDevice = $definingUserDevice;
    }
    
    /**
     * @return mixed
     */
    public function isDevice(): mixed {
        if($this->definingUserDevice->isDesktop()) {
            //...
        } else {
            if($this->definingUserDevice->isMobile()) {
                //...
            } else {
                if($this->definingUserDevice->isTablet()) {
                    //...
                } else {
                    //...
                }
            }
        }
    }
}
```

### Facades

An example of using a package with the facades:

```php
use M2Collective\DefiningUserDevice\Facades\DefiningUserDevice;

final class Example 
{
    /**
     * @return mixed
     */
    public function isDevice(): mixed {
        if(DefiningUserDevice::isDesktop()) {
            //...
        } else {
            if(DefiningUserDevice::isMobile()) {
                //...
            } else {
                if(DefiningUserDevice::isTablet()) {
                    //...
                } else {
                    //...
                }
            }
        }
    }
}
```

### Blade Directives

An example of using a package with the blade directive:

```bladehtml
@isDesktop
    //...
@elseIsDesktop
    //...
@endIsDesktop
```

or 

```bladehtml
@isMobile
    //...
@elseIsMobile
    //...
@endIsMobile
```

or 

```bladehtml
@isTablet
    //...
@elseIsTablet
    //...
@endIsTablet
```

## License

The MIT License (MIT). Please see the [License file](LICENSE.txt) for more information.
