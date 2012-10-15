<?php

namespace Knp\Bundle\MarkdownBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class ParsersCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('templating.helper.markdown')) {
            return;
        }

        if (!$container->hasDefinition('markdown.parser')) {
            return;
        }

        $defaultParserTag = $container->getDefinition('markdown.parser')->getTag('markdown.parser');

        $definition = $container->getDefinition('templating.helper.markdown');

        foreach ($container->findTaggedServiceIds('markdown.parser') as $id => $tags) {
            if ($defaultParserTag == $id) {
                $definition->addMethodCall('addParser', array(new Reference($id), 'default'));
                continue;
            }

            foreach ($tags as $attributes) {
                $alias = empty($attributes['alias']) ? $id : $attributes['alias'];
                $definition->addMethodCall('addParser', array(new Reference($id), $alias));
            }
        }
    }
}
