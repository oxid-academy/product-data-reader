# OXID Academy Product Data Reader

[![Latest Version](https://img.shields.io/packagist/v/oxid-academy/product-data-reader?logo=composer&label=latest&color=orange)](https://packagist.org/packages/oxid-academy/product-data-reader)
[![PHP Version](https://img.shields.io/packagist/php-v/oxid-academy/product-data-reader)](https://github.com/oxid-academy/product-data-reader)

This package is part of the **OXID Academy Training Development Basics**. Please see our website for current training offers in [german](https://www.oxid-esales.com/ressourcen/academy/schulungen/) or [english](https://www.oxid-esales.com/en/resources/academy/training-courses/) language.

## Description

This extension is an **OXID eShop Component**. It introduces a service to read title, price and SEO URL of a product selected by its item number. The extension also provides a console command to run the service directly on the CLI.

## Compatibility

### Versions

- 1.x.x version is compatible with OXID eShop 7.0

### Branches

- b-7.0.x branch is compatible with OXID eShop compilation b-7.0.x

## Installation

### Production

In your shop's root directory, execute the following Composer command:
```console
composer require oxid-academy/product-data-reader:^1.0.0
```

### Development

In your shop's root directory, execute the following commands:
```console
git clone -b b-7.0.x https://github.com/oxid-academy/product-data-reader.git
composer config repositories.oxac-pdr path ./product-data-reader
composer require oxid-academy/product-data-reader:b-7.0.x
```

## Usage

### Service

Information about the usage of services in the OXID eShop can be found in our [online documentation](https://docs.oxid-esales.com/developer/en/latest/development/modules_components_themes/module/module_services.html).

### Command

Your can simply run the command on your CLI by using the [OE Console](https://docs.oxid-esales.com/developer/en/latest/development/tell_me_about/console.html):

```console
./vendor/bin/oe-console oxac:product-data:read <item-number>
```

## Troubleshooting

If you encounter any issues after installation, clear your `source/tmp` directory. You can do this by running the `oe:cache:clear` command:

```console
./vendor/bin/oe-console oe:cache:clear
```
