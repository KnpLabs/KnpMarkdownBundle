<?php

namespace Bundle\MarkdownBundle\DependencyInjection;

use Symfony\Components\DependencyInjection\Loader\LoaderExtension;
use Symfony\Components\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Components\DependencyInjection\BuilderConfiguration;

class MarkdownExtension extends LoaderExtension
{
    public function parserLoad($config, BuilderConfiguration $configuration)
    {
        $loader = new XmlFileLoader(__DIR__.'/../Resources/config');
        $configuration->merge($loader->load('parser.xml'));
    }

    public function helperLoad($config, BuilderConfiguration $configuration)
    {
        $loader = new XmlFileLoader(__DIR__.'/../Resources/config');
        $configuration->merge($loader->load('parser.xml'));
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
        return 'markdown';
    }

}
