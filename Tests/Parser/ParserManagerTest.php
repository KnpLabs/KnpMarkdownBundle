<?php

namespace Knp\Bundle\MarkdownBundle\Tests\Parser;

use Knp\Bundle\MarkdownBundle\Helper\MarkdownHelper;
use Knp\Bundle\MarkdownBundle\Tests\fixtures\app\TestKernel;
use Knp\Bundle\MarkdownBundle\Parser\ParserManager;

class ParserManagerTest extends \PHPUnit_Framework_TestCase
{
    public function testIntegration()
    {
        require_once __DIR__.'/../fixtures/app/TestKernel.php';

        $kernel = new TestKernel('dev', true);
        $kernel->boot();
        $container = $kernel->getContainer();

        /** @var ParserManager $parserManager */
        $parserManager = $container->get('markdown.parser.parser_manager.public');

        $actual = $parserManager->transform('*hi*');
        $this->assertEquals("<p><em>hi</em></p>\n", $actual, 'There is a default parser');

        $actual = $parserManager->transform('*hi*', 'light');
        $this->assertEquals("<p><em>hi</em></p>\n", $actual, 'Specific parsers are registered');
    }
}
