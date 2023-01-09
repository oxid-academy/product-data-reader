# OXID Academy Product Data Reader
This package is part of the **OXID Academy Training Development Basics**. Please see our website for current training offers in [german](https://www.oxid-esales.com/ressourcen/academy/schulungen/) or [english](https://www.oxid-esales.com/en/resources/academy/training-courses/) language.

## Description
This extension is an **OXID eShop Component**. It introduces a service to read title, price and SEO URL of a product by a given item number. The extension also provides a console command to run this service directly on the CLI.

## Installation
You only need to run a single Composer command to install this extension in your OXID eShop:
```
composer require oxid-academy/product-data-reader
```

## Usage

### Service
Information about the usage of services in the OXID eShop can be found in our [online documentation](https://docs.oxid-esales.com/developer/en/latest/development/modules_components_themes/module/module_services.html). The service can be used by [autowiring](https://docs.oxid-esales.com/developer/en/latest/development/modules_components_themes/module/module_services.html#inject-own-third-party-module-or-shop-services) it in your own service or by using the [container factory](https://docs.oxid-esales.com/developer/en/latest/development/modules_components_themes/module/module_services.html#use-services-in-standard-classes).

### Command
Your can simply run the command on your CLI by using the [OE Console](https://docs.oxid-esales.com/developer/en/latest/development/tell_me_about/console.html):

```
./vendor/bin/oe-console oxac:product-data:read <item-number>
```

Example:
```
./vendor/bin/oe-console oxac:product-data:read 1402
```

## Troubleshooting
If you encounter any issues after installation, please clear your `source/tmp` directory. You can do this by running the `oe:cache:clear` command:

```
./vendor/bin/oe-console oe:cache:clear
```
