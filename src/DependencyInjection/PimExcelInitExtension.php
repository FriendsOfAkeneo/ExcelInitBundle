<?php

namespace Pim\Bundle\ExcelInitBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class PimExcelInitExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $container->setParameter('pim_excel_installer.root_dir', sprintf('%s/..', __DIR__));

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('iterators.yml');
        $loader->load('jobs.yml');
        $loader->load('steps.yml');
        $loader->load('readers.yml');
        $loader->load('mappers.yml');
        $loader->load('array_converters.yml');
    }
}
