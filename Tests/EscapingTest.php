<?php

namespace Knplabs\Bundle\MarkdownBundle\Tests;

use Knplabs\Bundle\MarkdownBundle\Parser\MarkdownParser as Parser;

class EscapingTest extends \PHPUnit_Framework_TestCase
{
    protected $parser;

    public function setUp()
    {
        $this->parser = new Parser();
    }

    public function testHtmlEscaping()
    {
        $text = '<a>a tag injection</a>';
        $html = '<p>&lt;a&gt;a tag injection&lt;/a&gt;</p>';

        $this->assertSame($html, $this->parser->transform($text));
    }

    public function testScriptEscaping()
    {
        $text = '<script>alert("haha");</script>';
        $html = '&lt;script&gt;alert("haha");&lt;/script&gt;';

        $this->assertSame($html, $this->parser->transform($text));
    }
}
