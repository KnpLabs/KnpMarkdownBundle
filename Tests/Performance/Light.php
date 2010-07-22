<?php

namespace Bundle\MarkdownBundle\Tests\Performance;

use Bundle\MarkdownBundle\Parser\Preset\Light as Parser;

/**
 * Run tests with light-featured Markdown Parser
 */
class Light extends Base
{
    /**
     * @return Parser
     */
    protected function getParser()
    {
        return new Parser();
    }
}
