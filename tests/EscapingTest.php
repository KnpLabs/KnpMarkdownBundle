<?php

namespace Knp\Bundle\MarkdownBundle\Tests;

use PHPUnit\Framework\TestCase;
use Knp\Bundle\MarkdownBundle\Parser\MarkdownParser as Parser;

class EscapingTest extends TestCase
{
    protected $parser;

    protected function setUp(): void
    {
        $this->parser = new Parser();
    }

    public function testHtmlEscaping()
    {
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
