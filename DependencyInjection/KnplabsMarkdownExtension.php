<?php

namespace Knplabs\Bundle\MarkdownBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\Extension\Extension;
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
        $config = array();
        foreach($configs as $c) {
            $config = array_merge($config, $c);
        }

        if(array_key_exists('parser', $config)) {
            $this->parserLoad($config, $container);
        }
        
        if(array_key_exists('helper', $config)) {
            $this->helperLoad($config, $container);
        }

        if(array_key_exists('twig', $config)) {
            $this->twigLoad($config, $container);
        }
    }

    /**
     * Handles the parser configuration.
     *
     * @param array $config The configurations being loaded
     * @param ContainerBuilder $container
     */
    public function parserLoad($config, ContainerBuilder $container)
    {
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('parser.xml');

        if(isset($config['class'])) {
            $container->setParameter('markdown.parser.class', $config['class']);
        }
    }

    /**
     * Handles the helper configuration.
     *
     * @param array $config The configurations being loaded
     * @param ContainerBuilder $container
     */
    public function helperLoad($config, ContainerBuilder $container)
    {
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('helper.xml');
    }

    /**
     * Handles the twig configuration.
     *
     * @param array $config The configurations being loaded
     * @param ContainerBuilder $container
     */
    public function twigLoad($config, ContainerBuilder $container)
    {
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('twig.xml');
    }

    /**
     * Returns the base path for the XSD files.
     *
     * @return string The XSD base path
     */
    public function getXsdValidationBasePath()
    {
        return null;
    }

    /**
     * @see Symfony\Component\DependencyInjection\Extension\ExtensionInterface
     */
    public function getNamespace()
    {
        return 'http://www.symfony-project.org/schema/dic/markdown';
    }

    /**
     * @see Symfony\Component\DependencyInjection\Extension\ExtensionInterface
     */
    public function getAlias()
    {
        return 'knplabs_markdown';
    }
}
