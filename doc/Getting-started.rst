Getting started
===============

Initializing the PIM with a XLSX file
-------------------------------------

Create an InstallerBundle
~~~~~~~~~~~~~~~~~~~~~~~~~

You can create your own InstallerBundle by following the instructions from the documentation :
https://docs.akeneo.com/1.6/cookbook/setup_data/customize_dataset.html

Copy the fixtures
~~~~~~~~~~~~~~~~~

All minimal fixtures are located in the **src/Resources/fixtures/minimal** folder inside the **ExcelInitBundle**.

All these fixtures can't be set in the init.xslx files.
Be sure to use the very same name/code in both the init.xslx files and the YML files.

Place them in the same directory inside your InstallerBundle. Here is a description of what each files contains:

CE edition
^^^^^^^^^^

+------------------------+-------------------------------------------------------------------------+
| File                   | Description                                                             |
+========================+=========================================================================+
| **currencies.csv**     | Contains all currencies used (and the ones that are removed)             |
+------------------------+-------------------------------------------------------------------------+
| **init.xslx**          | Contains the whole Catalog description, see init.xslx structure below   |
+------------------------+-------------------------------------------------------------------------+
| **locales.csv**        | Defines the used locales and their currency                              |
+------------------------+-------------------------------------------------------------------------+
| **user\_groups.csv**   | Defines all user groups (code + label)                                   |
+------------------------+-------------------------------------------------------------------------+
| **user\_roles.csv**    | Defines all user roles (code + label)                                    |
+------------------------+-------------------------------------------------------------------------+
| **users.csv**          | Defines users list                                                       |
+------------------------+-------------------------------------------------------------------------+

You can still have a look at the `Akeneo PIM minimal fixtures
<https://github.com/akeneo/pim-community-dev/tree/1.4/src/Pim/Bundle/InstallerBundle/Resources/fixtures/minimal>`__
set to get a full list of the files and their expected format.

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
To do so, add the following lines in the ``parameters.yml``. If this file does not exist,
create it in ``Acme/Bundle/InstallerBundle/Resources/config/parameters.yml``
and make sure that the file is loaded inside ``DependencyInjection/AcmeBundleInstallerExtension.php`` :

.. code:: php
    <?php

    namespace Acme\Bundle\InstallerBundle\DependencyInjection;

    use Symfony\Component\DependencyInjection\ContainerBuilder;
    use Symfony\Component\Config\FileLocator;
    use Symfony\Component\HttpKernel\DependencyInjection\Extension;
    use Symfony\Component\DependencyInjection\Loader;

    /**
     * This is the class that loads and manages your bundle configuration
     *
     * To learn more see {@link http://symfony.com/doc/1.6/cookbook/bundles/extension.html}
     */
    class AcmeInstallConnectorExtension extends Extension
    {
        /**
         * {@inheritDoc}
         */
        public function load(array $configs, ContainerBuilder $container)
        {
            $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
            // ...
            $loader->load('parameters.yml');
        }
    }


.. code:: yml

    parameters:
        pim_installer.fixture_loader.job_loader.config_file: 'PimExcelInitBundle/Resources/config/fixtures_jobs.yml'


Define the data used by the installer :
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

.. code:: yml

    # app/config/parameters.yml
    parameters:
        ...
        installer_data: 'AcmeDemoBundle:minimal'
