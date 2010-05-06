<?php

namespace Bundle\MarkdownBundle\Tests\Parser;

use Bundle\MarkdownBundle\Parser\Extra as Parser;

require_once 'PHPUnit/Framework.php';
require_once __DIR__.'/../../Parser/Extra.php';

class ExtraTest extends LightTest
{

    public function testParser()
    {
        $parser = new Parser();

        $this->assertTrue($parser instanceof \MarkdownExtraParser);

        return $parser;
    }

    /**
     * @depends testParser
     */
    public function testHeaderId($parser)
    {
        $text = <<<EOF
Header 1            {#header1}
========

## Header 2 ##      {#header2}
EOF;

        $html = <<<EOF
<h1 id="header1">Header 1</h1>

<h2 id="header2">Header 2</h2>

EOF;

        $this->assertEquals($html, $parser->transform($text));
    }

    /**
     * @depends testParser
     */
    public function testFencedCodeBlock($parser)
    {
        $text = <<<EOF
This is a paragraph introducing:

~~~~~~~~~~~~~~~~~~~~~
a one-line code block
~~~~~~~~~~~~~~~~~~~~~
EOF;

        $html = <<<EOF
<p>This is a paragraph introducing:</p>

<pre><code>a one-line code block
</code></pre>

EOF;

        $this->assertEquals($html, $parser->transform($text));

        $text = <<<EOF
1.  List item

    Not an indented code block, but a second paragraph
    in the list item

~~~~
This is a code block, fenced-style
~~~~
EOF;

        $html = <<<EOF
<ol>
<li><p>List item</p>

<p>Not an indented code block, but a second paragraph
in the list item</p></li>
</ol>

<pre><code>This is a code block, fenced-style
</code></pre>

EOF;

        $this->assertEquals($html, $parser->transform($text));
    }

    /**
     * @depends testParser
     */
    public function testTable($parser)
    {
        $text = <<<EOF
First Header  | Second Header
------------- | -------------
Content Cell  | Content Cell
Content Cell  | Content Cell
EOF;

        $html = <<<EOF
<table>
<thead>
<tr>
  <th>First Header</th>
  <th>Second Header</th>
</tr>
</thead>
<tbody>
<tr>
  <td>Content Cell</td>
  <td>Content Cell</td>
</tr>
<tr>
  <td>Content Cell</td>
  <td>Content Cell</td>
</tr>
</tbody>
</table>

EOF;

        $this->assertEquals($html, $parser->transform($text));

        $text = <<<EOF
| First Header  | Second Header |
| ------------- | ------------- |
| Content Cell  | Content Cell  |
| Content Cell  | Content Cell  |
EOF;

        $this->assertEquals($html, $parser->transform($text));

        $text = <<<EOF
| Function name | Description                    |
| ------------- | ------------------------------ |
| `help()`      | Display the help window.       |
| `destroy()`   | **Destroy your computer!**     |
EOF;

        $html = <<<EOF
<table>
<thead>
<tr>
  <th>Function name</th>
  <th>Description</th>
</tr>
</thead>
<tbody>
<tr>
  <td><code>help()</code></td>
  <td>Display the help window.</td>
</tr>
<tr>
  <td><code>destroy()</code></td>
  <td><strong>Destroy your computer!</strong></td>
</tr>
</tbody>
</table>

EOF;

        $this->assertEquals($html, $parser->transform($text));
    }

    /**
     * @depends testParser
     */
    public function testDefinitionList($parser)
    {
        $text = <<<EOF
Apple
:   Pomaceous fruit of plants of the genus Malus in
    the family Rosaceae.

Orange
:   The fruit of an evergreen tree of the genus Citrus.
EOF;

        $html = <<<EOF
<dl>
<dt>Apple</dt>
<dd>Pomaceous fruit of plants of the genus Malus in
the family Rosaceae.</dd>

<dt>Orange</dt>
<dd>The fruit of an evergreen tree of the genus Citrus.</dd>
</dl>

EOF;

        $this->assertEquals($html, $parser->transform($text));

        $text = <<<EOF
Apple
:   Pomaceous fruit of plants of the genus Malus in
the family Rosaceae.

Orange
:   The fruit of an evergreen tree of the genus Citrus.
EOF;

        $this->assertEquals($html, $parser->transform($text));
    }

    /**
     * @depends testParser
     */
    public function testFootNote($parser)
    {
        $text = <<<EOF
That's some text with a footnote.[^1]

[^1]: And that's the footnote.
EOF;

        $html = <<<EOF
<p>That's some text with a footnote.<sup id="fnref:1"><a href="#fn:1" rel="footnote">1</a></sup></p>

<div class="footnotes">
<hr />
<ol>

<li id="fn:1">
<p>And that's the footnote.&#160;<a href="#fnref:1" rev="footnote">&#8617;</a></p>
</li>

</ol>
</div>

EOF;

        $this->assertEquals($html, $parser->transform($text));
    }

    /**
     * @depends testParser
     */
    public function testAbbreviation($parser)
    {
        $text = <<<EOF
*[HTML]: Hyper Text Markup Language
*[W3C]:  World Wide Web Consortium
The HTML specification
is maintained by the W3C.
EOF;

        $html = <<<EOF
<p>The <abbr title="Hyper Text Markup Language">HTML</abbr> specification
is maintained by the <abbr title="World Wide Web Consortium">W3C</abbr>.</p>

EOF;

        $this->assertEquals($html, $parser->transform($text));
    }

}