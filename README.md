# Excel Init Bundle

[![Build Status](https://travis-ci.org/akeneo/ExcelInitBundle.svg?branch=master)](https://travis-ci.org/akeneo/ExcelInitBundle)

![alt text](./doc/pictures/bundle_icon.jpg "")

This bundle adds support of Excel XSLX files as a source for initializing catalog structure for [Akeneo PIM](https://github.com/akeneo/pim-community-standard).

This extension replaces the [ExcelConnectorBundle](https://github.com/akeneo-labs/ExcelConnectorBundle) for Akeneo PIM >= 1.6.
Be carefull to use the new `init.xlsx` file of this bundle as there are some structure modifications.

**Note**: this bundle is not compatible with Excel 2003 xls files. Editing the XLSX file with LibreOffice/OpenOffice is also not supported as it can lead to unwanted behavior.

## Requirements

| ExcelInitBundle | Akeneo PIM Community Edition |
|:---------------:|:----------------------------:|
| v2.0.*          | v2.1.*                       |
| v1.2.*          | v1.7.*                       |
| v1.1.*          | v1.6.*                       |
| v1.0.*          | v1.6.*                       |

## Installation

From your application root:

```bash
    php composer.phar require --prefer-dist akeneo/excel-init-bundle:2.0.*
```

Enable the bundle in the `app/AppKernel.php` file in the `registerProjectBundles()` method:

```php
    $bundles = [
        // ...
        new Pim\Bundle\ExcelInitBundle\PimExcelInitBundle(),
    ]
```

Now let's clean your cache and dump your assets:

```bash
    php app/console cache:clear --env=prod
    php app/console pim:installer:assets --env=prod
```

## Documentation

### Getting started

See [doc/Getting started](./doc/Getting-started.rst) for more details on how to set your catalog structure
using the [init.xslx](./src/Resources/fixtures/minimal/init.xlsx) file.

See [doc folder](./doc/Home.rst) for more details on how to set your catalog structure.

### Supported file

Input file must follow [init.xslx](./src/Resources/fixtures/minimal/init.xlsx) structure.

Note that the file should be opened with Excel.
LibreOffice/OpenOffice are not fully in compliance with validations data that are available in the spreadsheet.

## Troubleshooting

### The import fails when importing families

Check that your channels names are correct in both family and channel tabs.
You might have a typo in the channels tab and not in the family tab.
You will have to remove the mispelled channel once you corrected this.

## Dev notes

### Unit tests

You can launch the PHPSpec tests with the provided `docker-compose.yml` file:

```bash
docker-compose pull
docker-compose up -d
docker-compose exec fpm composer install --prefer-dist
docker-compose exec fpm ./bin/phpspec run
```
