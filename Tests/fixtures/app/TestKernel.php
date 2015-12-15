<?php

namespace Knp\Bundle\MarkdownBundle\Tests\fixtures\app;

use Knp\Bundle\MarkdownBundle\KnpMarkdownBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\BundleInterface;
use Symfony\Component\HttpKernel\Kernel;

class TestKernel extends Kernel
{
    public function registerBundles()
    {
        return array(
            new FrameworkBundle(),
            new KnpMarkdownBundle(),
        );
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(function(ContainerBuilder $c) {
            $c->loadFromExtension('framework', array(
                'secret' => 'MarkdownTesting'
            ));
        });
    }
}