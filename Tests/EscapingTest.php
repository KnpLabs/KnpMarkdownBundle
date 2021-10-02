<?php

namespace Knp\Bundle\MarkdownBundle\Tests;

use Knp\Bundle\MarkdownBundle\Parser\MarkdownParser as Parser;
use PHPUnit\Framework\TestCase;

class EscapingTest extends TestCase
{
    protected Parser $parser;

    public function setUp(): void
    {
        $this->parser = new Parser();
    }

    public function testHtmlEscaping()
    {
        #$this->markTestSkipped('Wait for implemtation');
        $this->markTestIncomplete('This tests a very deep escaping capability of the wrapped library @todo');

        $text = <<<EOF
<a>a tag injection</a>
EOF;

        $html = <<<EOF
<p>&lt;a&gt;a tag injection&lt;/a&gt;</p>

EOF;

        $this->assertEquals($html, $this->parser->transform($text));
    }

    public function testScriptEscaping()
    {
        #$this->markTestSkipped('Wait for implemtation');
        $this->markTestIncomplete('This tests a very deep escaping capability of the wrapped library @todo');

        $text = <<<EOF
<script>alert("haha");</script>
EOF;

        $html = <<<EOF
&lt;script&gt;alert("haha");&lt;/script&gt;

EOF;

        $this->assertEquals($html, $this->parser->transform($text));
    }
}
