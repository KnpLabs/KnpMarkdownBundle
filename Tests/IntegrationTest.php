<?php

namespace Knp\Bundle\MarkdownBundle\Tests;

use JetBrains\PhpStorm\Pure;
use Knp\Bundle\MarkdownBundle\KnpMarkdownBundle;
use Knp\Bundle\MarkdownBundle\Parser\MarkdownParser;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Routing\RouteCollectionBuilder;

class IntegrationTest extends TestCase
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

    #[Pure]
    public function registerBundles(): array
    {
        return [
            new FrameworkBundle(),
            new KnpMarkdownBundle(),
        ];
    }

    protected function configureRoutes(RouteCollectionBuilder $routes)
    {
    }

    protected function configureContainer(ContainerBuilder $container, LoaderInterface $loader)
    {
        $container->setParameter('kernel.secret', '1234');
        $container->setParameter('framework.router.utf8', 'true');
    }

    public function getCacheDir(): string
    {
        if (null === $this->cacheDir) {
            $this->cacheDir = sys_get_temp_dir().'/'.rand(100, 999);
        }

        return $this->cacheDir;
    }
}
