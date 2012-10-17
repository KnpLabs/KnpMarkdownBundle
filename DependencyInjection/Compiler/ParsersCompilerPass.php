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

        if (!$definition = $container->findDefinition('markdown.parser')) {
            return;
        }

        $defaultAlias = current($definition->getTag('markdown.parser'));
        $defaultAlias = $defaultAlias['alias'];
        $definition   = $container->getDefinition('templating.helper.markdown');

        foreach ($container->findTaggedServiceIds('markdown.parser') as $id => $tags) {
            foreach ($tags as $attributes) {
                $alias = empty($attributes['alias']) ? $id : $attributes['alias'];
                if ($defaultAlias == $alias) {
                    $definition->addMethodCall('addParser', array(new Reference($id), 'default'));
                } else {
                    $definition->addMethodCall('addParser', array(new Reference($id), $alias));
                }
            }
        }
    }
}
