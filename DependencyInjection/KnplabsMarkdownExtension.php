<?php

namespace Knplabs\MarkdownBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class KnplabsMarkdownExtension extends Extension
{

    public function load(array $configs , ContainerBuilder $container)
    {
        $config = array();
        foreach($configs as $c) {
            $config = array_merge($config, $c);
        }

        if(isset($config['parser'])) {
            $this->parserLoad($config, $container);
        }
        
        if(isset($config['helper'])) {
            $this->helperLoad($config, $container);
        }

        if(isset($config['twig'])) {
            $this->twigLoad($config, $container);
        }
    }


    public function parserLoad($config, ContainerBuilder $container)
    {
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('parser.xml');

        if(isset($config['class'])) {
            $container->setParameter('markdown.parser.class', $config['class']);
        }
    }

    public function helperLoad($config, ContainerBuilder $container)
    {
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('helper.xml');
    }

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

    public function getNamespace()
    {
        return 'http://www.symfony-project.org/schema/dic/symfony';
    }

    public function getAlias()
    {
        return 'knplabs_markdown';
    }

}
