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
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;
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

    private ?string $cacheDir = null;

    #[Pure]
    public function registerBundles(): array
    {
        return [
            new FrameworkBundle(),
            new KnpMarkdownBundle(),
        ];
    }

    protected function configureContainer(ContainerConfigurator $container, LoaderInterface $loader)
    {
        // PHP equivalent of config/packages/framework.yaml
        $container->extension('framework', [
            'secret' => '1234', # => 'kernel.secret'
            'router' => ['utf8' => true]
        ]);
    }

    // we need this for symfony 4.4 (prefer-lowest)
    protected function configureRoutes(RouteCollectionBuilder $routes)
    {
    }

    public function getCacheDir(): string
    {
        if (null === $this->cacheDir) {
            $this->cacheDir = sys_get_temp_dir().'/'.rand(100, 999);
        }

        return $this->cacheDir;
    }
}
