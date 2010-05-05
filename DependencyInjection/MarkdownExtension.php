<?php

namespace Application\MarkdownBundle\DependencyInjection;

use Symfony\Components\DependencyInjection\Loader\LoaderExtension;
use Symfony\Components\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Components\DependencyInjection\BuilderConfiguration;

class MarkdownExtension extends LoaderExtension
{
  
  public function configLoad($config)
  {
    $configuration = new BuilderConfiguration();

    $loader = new XmlFileLoader(__DIR__.'/../Resources/config');
    $configuration->merge($loader->load('config.xml'));

    return $configuration;
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
