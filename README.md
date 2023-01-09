# OXID Academy Product Data Reader
This package is part of the **OXID Academy Training Development Basics**. Please see our website for current training offers in [german](https://www.oxid-esales.com/ressourcen/academy/schulungen/) or [english](https://www.oxid-esales.com/en/resources/academy/training-courses/) language.

## Description
This extension is an **OXID eShop Component**. It introduces a service to read title, price and SEO URL of a product selected by its item number. The extension also provides a console command to run the service directly on the CLI.

## Installation
In your shop's root directory, execute the following Composer command:
```console
composer require oxid-academy/product-data-reader
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
