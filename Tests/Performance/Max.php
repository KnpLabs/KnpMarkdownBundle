<?php

namespace Knplabs\MarkdownBundle\Tests\Performance;

use Knplabs\MarkdownBundle\Parser\Preset\Max as Parser;

/**
 * Run tests with full-featured Markdown Parser
 */
class Max extends Base
{
    /**
     * @return Parser
     */
    protected function getParser()
    {
        return new Parser();
    }
}
