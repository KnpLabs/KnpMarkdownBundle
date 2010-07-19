<?php

namespace Bundle\MarkdownBundle;

use Bundle\MarkdownBundle\DependencyInjection\MarkdownExtension;
use Symfony\Framework\Bundle\Bundle as BaseBundle;
use Symfony\Components\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Components\DependencyInjection\ContainerBuilder;

class MarkdownBundle extends BaseBundle
{

    public function buildContainer(ParameterBagInterface $parameterBag)
    {
        ContainerBuilder::registerExtension(new MarkdownExtension());
    }

}
