<?php

namespace Knp\Bundle\MarkdownBundle\Tests;

use Knp\Bundle\MarkdownBundle\KnpMarkdownBundle;
use Knp\Bundle\MarkdownBundle\Parser\MarkdownParser;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Routing\RouteCollectionBuilder;

class IntegrationTest extends \PHPUnit_Framework_TestCase
{
    public function testServicesAvailable()
    {
        $kernel = new IntegrationKernel('dev', true);
        $kernel->boot();
        $container = $kernel->getContainer();

        $this->assertInstanceOf(MarkdownParser::class, $container->get('markdown.parser'));
    }
}

class IntegrationKernel extends Kernel
{
    use MicroKernelTrait;

    private $cacheDir;

    public function registerBundles()
    {
        return [
            new FrameworkBundle(),
            new KnpMarkdownBundle(),
        ];
    }

    protected function configureRoutes(RouteCollectionBuilder $routes)
    {
    }

    protected function configureContainer(ContainerBuilder $c, LoaderInterface $loader)
    {
        $c->setParameter('kernel.secret', '1234');
    }

    public function getCacheDir()
    {
        if (null === $this->cacheDir) {
            $this->cacheDir = sys_get_temp_dir().'/'.rand(100, 999);
        }

        return $this->cacheDir;
    }
}
