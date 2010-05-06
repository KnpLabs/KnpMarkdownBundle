<?php

namespace Bundle\MarkdownBundle\Tests\Parser;

use Bundle\MarkdownBundle\Parser\Light as Parser;

require_once 'PHPUnit/Framework.php';
require_once __DIR__.'/../../Parser/Light.php';

class LightTest extends \PHPUnit_Framework_TestCase
{
  
  public function testParser()
  {
    $parser = new Parser();

    $this->assertType('MarkdownParser', $parser);

    return $parser;
  }

  /**
   * @depends testParser
   */
  public function testEmpty(Parser $parser)
  {
    $this->assertEquals("\n", $parser->transform(''));
  }

  /**
   * @depends testParser
   */
  public function testEmphasis(Parser $parser)
  {
    $text = <<<EOF
*normal emphasis with asterisks*

_normal emphasis with underscore_

**strong emphasis with asterisks**

__strong emphasis with underscore__

This is some text *emphased* with asterisks.
EOF;
    $html = '<p><em>normal emphasis with asterisks</em></p>

<p><em>normal emphasis with underscore</em></p>

<p><strong>strong emphasis with asterisks</strong></p>

<p><strong>strong emphasis with underscore</strong></p>

<p>This is some text <em>emphased</em> with asterisks.</p>
';

    $this->assertEqual($html, $parser->toHtml($text));
  }

  /**
   * @depends testParser
   */
  public function testTitle(Parser $parser)
  {
    $text = <<<EOF
Titre de niveau 1 (balise H1)
=============================

Titre de niveau 2 (balise H2)
-----------------------------

# Titre de niveau 1

## Titre de niveau 2

###### Titre de niveau 6
EOF;
    $html = '';
    
    $this->assertEqual($html, $parser->toHtml($text));
  }
}