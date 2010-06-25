<?php

namespace Bundle\MarkdownBundle;

use Bundle\MarkdownBundle\DependencyInjection\MarkdownExtension;
use Symfony\Foundation\Bundle\Bundle as BaseBundle;
use Symfony\Components\DependencyInjection\ContainerInterface;
use Symfony\Components\DependencyInjection\Loader\Loader;

class MarkdownBundle extends BaseBundle
{

    public function buildContainer(ContainerInterface $container)
    {
        Loader::registerExtension(new MarkdownExtension());
    }

}
