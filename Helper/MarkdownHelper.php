<?php

namespace Knplabs\Bundle\MarkdownBundle\Helper;

use Symfony\Component\Templating\Helper\HelperInterface;
use Knplabs\Bundle\MarkdownBundle\Parser\MarkdownParser;

class MarkdownHelper implements HelperInterface
{
    /**
     * @var MarkdownParser
     */
    protected $parser;
    protected $charset = 'UTF-8';

    public function __construct(MarkdownParser $parser)
    {
        $this->parser = $parser;
    }

    /**
     * Sets the default charset.
     *
     * @param string $charset The charset
     */
    public function setCharset($charset)
    {
        $this->charset = $charset;
    }

    /**
     * Gets the default charset.
     *
     * @return string The default charset
     */
    public function getCharset()
    {
        return $this->charset;
    }

    public function getName()
    {
        return 'markdown';
    }

    /**
     * Transforms markdown syntax to HTML
     * @param   string  $markdownText   The markdown syntax text
     * @return  string                  The HTML code
     */
    public function transform($markdownText)
    {
        return $this->parser->transform($markdownText);
    }

}
