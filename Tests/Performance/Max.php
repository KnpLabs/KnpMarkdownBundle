<?php

namespace Knplabs\Bundle\MarkdownBundle\Tests\Performance;

use Knplabs\Bundle\MarkdownBundle\Parser\Preset\Max as Parser;

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
