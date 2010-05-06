<?php

namespace Bundle\MarkdownBundle\Parser;

require_once(realpath(__DIR__.'/..').'/vendor/parser/MarkdownExtraParser.php');

class MarkdownParser extends \MarkdownExtraParser
{

    public function transform($text)
    {
        $html = parent::transform($text);

        $html = $this->removeWhiteSpacesOnBlankLines($html);

        return $html;
    }

    protected function removeWhiteSpacesOnBlankLines($html)
    {
        return preg_replace("/\n\s+\n/m", "\n\n", $html);
    }
}