Getting started
===============

Initializing the PIM with a XLSX file
-------------------------------------

Create a fixtures directory
~~~~~~~~~~~~~~~~~~~~~~~~~~~

You have to create a directory containing all the installer fixtures.

.. code:: bash

    mkdir /home/akeneo/installer/fixtures/my_company

Copy the fixtures
~~~~~~~~~~~~~~~~~

All minimal fixtures are located in the **src/Resources/fixtures/minimal** folder inside the **ExcelInitBundle**.

For an Enterprise edition, the fixtures are located in the **src/Resources/fixtures/minimal_EE** folder.

All these fixtures can't be set in the init.xslx files.
Be sure to use the very same name/code in both the init.xslx files and the YML files.

Place them in your fixtures directory. Here is a description of what each files contains:

CE edition
^^^^^^^^^^

+------------------------+-------------------------------------------------------------------------+
| File                   | Description                                                             |
+========================+=========================================================================+
| **init.xslx**          | Contains the whole Catalog description, see init.xslx structure below   |
+------------------------+-------------------------------------------------------------------------+
| **locales.csv**        | Defines the used locales and their currency                             |
+------------------------+-------------------------------------------------------------------------+

EE edition (incl. CE files)
^^^^^^^^^^^^^^^^^^^^^^^^^^^

EE edition adds support of ACL, please refer to the minimal fixtures set
located in the InstallerBundle to see the structure and the content of
the files. Note that you cannot define ACL in the init.xslx file and
will have to define them separately.

+---------------------------------------+-------------------------------------+
| File                                  | Description                         |
+=======================================+=====================================+
| **attribute\_groups\_accesses.csv**   | Contains ACL for attribute groups   |
+---------------------------------------+-------------------------------------+
| **product\_category\_accesses.yml**   | Contains ACL for product categories |
+---------------------------------------+-------------------------------------+
| **locale\_accesses.csv**              | Contains ACL for locales            |
+---------------------------------------+-------------------------------------+
| **job\_profile\_accesses.csv**        | Contains ACL for jobs               |
+---------------------------------------+-------------------------------------+
| **asset\_categories.csv**             | Contains assets master category     |
+---------------------------------------+-------------------------------------+
| **asset\_category\_accesses.yml**     | Contains ACL for assets categories  |
+---------------------------------------+-------------------------------------+

Customize init.xslx !
~~~~~~~~~~~~~~~~~~~~~

Edit the init.xlsx file to match your needs following the instructions inside
the file itself. The file is composed of various tabs that allow you to
set your catalog structure:

- channels
- categories
- group types
- association types
- attributes
- attribute groups
- attribute options
- families (as many tabs as required)

See `tab description section <Home.rst#define-the-structure-of-your-catalog>`__
for more details on how to customize the init.xslx file.

Change PIM parameter to use your custom installation
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

You have to override ``pim_installer.fixture_loader.job_loader.config_file``.
To do so, add the following lines in the ``parameters.yml`` of your custom installer.

.. code:: yml

    parameters:
        pim_installer.fixture_loader.job_loader.config_file: 'PimExcelInitBundle/Resources/config/fixtures_jobs.yml'

And for Enterprise Edition:

.. code:: yml

    parameters:
        pim_installer.fixture_loader.job_loader.config_file: 'PimExcelInitBundle/Resources/config/fixtures_jobs_ee.yml'

Define the data used by the installer :
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Here you will tell the installer to use the fixtures in your own fixtures folder:

.. code:: yml

    # app/config/parameters.yml
    parameters:
        ...
        installer_data: '/home/akeneo/installer/fixtures/my_company'


Alternatively, if you use a custom installer bundle, you can alos use the bundle notation:

.. code:: yml

    # app/config/parameters.yml
    parameters:
        ...
        installer_data: 'YourCustomeInstallerBundle:minimal'
