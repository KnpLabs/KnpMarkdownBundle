<?php

namespace Knp\Bundle\MarkdownBundle\Twig\Extension;

use Knp\Bundle\MarkdownBundle\Parser\ParserManager;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class MarkdownTwigExtension extends AbstractExtension
{
    private ParserManager $parserManager;

    public function __construct(ParserManager $parserManager)
    {
        $this->parserManager = $parserManager;
    }

    public function getFilters(): array
    {
        return [
            new TwigFilter('markdown', [$this, 'markdown'], ['is_safe' => ['html']]),
        ];
    }

    public function markdown(string $text, string $parser = null): string
    {
        return $this->parserManager->transform($text, $parser);
    }

    public function getName(): string
    {
        return 'markdown';
    }
}
