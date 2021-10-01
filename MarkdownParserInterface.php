<?php

namespace Knp\Bundle\MarkdownBundle;

interface MarkdownParserInterface
{
    /**
     * Converts text to html using markdown rules
     */
    function transformMarkdown(string $text): string;
}
