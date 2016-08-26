# Excel Installer Bundle

[![Build Status](https://travis-ci.org/akeneo/ExcelInitBundle.svg?branch=master)](https://travis-ci.org/akeneo/ExcelInitBundle)

![alt text](./doc/pictures/akeneo_excel.png "")

This bundle adds support of Excel XSLX files as a source for initializing catalog structure for [Akeneo PIM](https://github.com/akeneo/pim-community-standard).

**Note**: this bundle is not compatible with Excel 2003 xls files.

## Requirements

| ExcelInitBundle | Akeneo PIM Community Edition |
|:---------------:|:----------------------------:|
| v1.0.*          | v1.6.*                       |

## Installation

From your application root:

```bash
    php composer.phar require --prefer-dist akeneo/excel-init-bundle:1.0.*
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
Note that the file must be opened with Excel.
LibreOffice/OpenOffice are not in compliance with validations data that are available in the spreadsheet.

### Importation job

This bundle allows you to import products files directly in the UI through Import > Import jobs.
Please note that the init.xlsx import is also available via the UI.
However, it should not be used as an import system for entities available within this file (families, categories, etc.) once the catalog structure has been set.

## Troubleshooting

###The import fails when importing families

Check that your channels names are correct in both family and channel tabs.
You might have a typo in the channels tab and not in the family tab.
You will have to remove the mispelled channel once you corrected this.
