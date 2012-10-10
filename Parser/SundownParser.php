<?php

namespace Knp\Bundle\MarkdownBundle\Parser;

use Knp\Bundle\MarkdownBundle\MarkdownParserInterface;

use Sundown\Markdown;

/**
 * SundownParser
 *
 * This class wraps the original Sundown parser to implement the KnpMardownBundle interface
 */
class SundownParser implements MarkdownParserInterface
{
    private $parser;

    public function __construct(Markdown $parser)
    {
        $this->parser = $parser;
    }

    /**
     * Converts text to html using markdown rules
     *
     * @param string $text plain text
     *
     * @return string rendered html
     */
    public function transform($text)
    {
        return $this->parser->render($text);
    }
}