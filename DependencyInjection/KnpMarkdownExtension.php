<?php

namespace Knp\Bundle\MarkdownBundle\DependencyInjection;

use Knp\Bundle\MarkdownBundle\MarkdownParserInterface;
use Michelf\MarkdownInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\DependencyInjection\Alias;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\Templating\EngineInterface;

class KnpMarkdownExtension extends Extension
{
    /**
     * Handles the knp_markdown configuration.
     *
     * @param array            $configs   The configurations being loaded
     * @param ContainerBuilder $container
     *
     * @throws InvalidConfigurationException When Sundown parser was selected, but extension is not available
     */
    public function load(array $configs , ContainerBuilder $container)
    {
        $configuration = new Configuration();

        $config = $this->processConfiguration($configuration, $configs);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('parser.xml');
        // BC to support the PHP templates in the Templating component
        if (interface_exists(EngineInterface::class)) {
            $loader->load('helper.xml');
        }
        $loader->load('twig.xml');

        if ('markdown.parser.sundown' == $config['parser']['service']) {
            if (!class_exists('Sundown\\Markdown')) {
                throw new InvalidConfigurationException('Sundown parser selected, but required extension is not installed or configured.');
            }

            $loader->load('sundown.xml');

            $definition = $container->getDefinition('markdown.parser.sundown');
            $definition->addTag('markdown.parser', array('alias' => 'sundown'));

            $container->setParameter('markdown.sundown.extensions', $config['sundown']['extensions']);
            $container->setParameter('markdown.sundown.render_flags', $config['sundown']['render_flags']);
        }

        $container->setAlias('markdown.parser', new Alias($config['parser']['service'], true));
        $container->setAlias(MarkdownParserInterface::class, 'markdown.parser');
        $container->setAlias(MarkdownInterface::class, 'markdown.parser');
    }
}
