<?php

namespace Knp\Bundle\MarkdownBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class KnpMarkdownExtension extends Extension
{
    /**
     * Handles the knp_markdown configuration.
     *
     * @param array $configs The configurations being loaded
     * @param ContainerBuilder $container
     */
    public function load(array $configs , ContainerBuilder $container)
    {
        $configuration = new Configuration();

        $config = $this->processConfiguration($configuration, $configs);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('parser.xml');
        $loader->load('helper.xml');
        $loader->load('twig.xml');

        $container->setParameter('markdown.sundown.extensions', $config['sundown']['extensions']);
        $container->setParameter('markdown.sundown.render_flags', $config['sundown']['render_flags']);
        $container->setAlias('markdown.parser', $config['parser']['service']);

        if ($config['parser']['service'] == 'markdown.parser.sundown' && !class_exists('Sundown\Markdown')) {
                throw new InvalidConfigurationException('<strong>Sundown</strong> extension not installed or configured.');
        }
    }
}
