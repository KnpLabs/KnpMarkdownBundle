<?php

namespace Knplabs\Bundle\MarkdownBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class KnplabsMarkdownExtension extends Extension
{
    /**
     * Handles the knplabs_markdown configuration.
     *
     * @param array $configs The configurations being loaded
     * @param ContainerBuilder $container
     */
    public function load(array $configs , ContainerBuilder $container)
    {
        $processor = new Processor();
        $configuration = new Configuration();

        $config = $processor->process($configuration->getConfigTree(), $configs);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('parser.xml');
        $loader->load('helper.xml');
        $loader->load('twig.xml');

        $container->setAlias('markdown.parser', $config['parser']['service']);
    }
}
