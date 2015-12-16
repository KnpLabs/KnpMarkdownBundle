<?php

namespace Knp\Bundle\MarkdownBundle\Tests\fixtures\app;

use Knp\Bundle\MarkdownBundle\Parser\ParserManager;

/**
 * Class helps access private services from integration tests.
 */
class ServiceHelper
{
    private $parserManager;

    public function __construct(ParserManager $parserManager)
    {
        $this->parserManager = $parserManager;
    }

    public function getParserManager()
    {
        return $this->parserManager;
    }
}
