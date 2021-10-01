<?php

namespace Knp\Bundle\MarkdownBundle\Parser;

use Knp\Bundle\MarkdownBundle\MarkdownParserInterface;

class ParserManager
{
    /**
     * @var MarkdownParserInterface[]
     */
    private array $parsers = array();

    public function addParser(MarkdownParserInterface $parser, string $alias)
    {
        $this->parsers[$alias] = $parser;
    }

    /**
     * Transforms markdown syntax to HTML
     *
     * @throws \RuntimeException
     */
    public function transform(string $markdownText, string|null $parserName = null): string
    {
        if (null === $parserName) {
            $parserName = 'default';
        }

        if (!isset($this->parsers[$parserName])) {
            throw new \RuntimeException(sprintf('Unknown parser selected ("%s"), available are: %s', $parserName, implode(', ', array_keys($this->parsers))));
        }

        $parser = $this->parsers[$parserName];

        return $parser->transformMarkdown($markdownText);
    }
}
