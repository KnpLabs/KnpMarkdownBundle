<?php

namespace Knp\Bundle\MarkdownBundle\Helper;

use Knp\Bundle\MarkdownBundle\Parser\ParserManager;
use Symfony\Component\Templating\Helper\HelperInterface;

class MarkdownHelper implements HelperInterface
{
    private $parserManager;
    private $charset = 'UTF-8';

    public function __construct(ParserManager $parserManager)
    {
        $this->parserManager = $parserManager;
    }

    /**
     * Transforms markdown syntax to HTML
     *
     * @param string      $markdownText The markdown syntax text
     * @param null|string $parserName
     *
     * @return string                   The HTML code
     *
     * @throws \RuntimeException
     */
    public function transform($markdownText, $parserName = null)
    {
        return $this->parserManager->transform($markdownText, $parserName);
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

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'markdown';
    }
}
