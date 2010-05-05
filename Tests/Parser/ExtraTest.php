<?php

namespace Bundle\MarkdownBundle\Tests\Parser;

use Bundle\MarkdownBundle\Parser\Extra as Parser;

require_once 'PHPUnit/Framework.php';
require_once __DIR__.'/../../Parser/Extra.php';

class ExtraTest extends \PHPUnit_Framework_TestCase
{
  public function testTransform()
  {
    $parser = new Parser();

    $this->assertType('Markdown_Parser', $parser);

    $this->assertEquals("\n", $parser->transform(''));

    $this->assertEquals("<p><em>normal emphasis with asterisks</em></p>

<p><em>normal emphasis with underscore</em></p>

<p><strong>strong emphasis with asterisks</strong></p>

<p><strong>strong emphasis with underscore</strong></p>

<p>This is some text <em>emphased</em> with asterisks.</p>
", $parser->transform("*normal emphasis with asterisks*

_normal emphasis with underscore_

**strong emphasis with asterisks**

__strong emphasis with underscore__

This is some text *emphased* with asterisks."));
  }
}