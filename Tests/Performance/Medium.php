<?php

namespace Knplabs\Bundle\MarkdownBundle\Tests\Performance;

use Knplabs\Bundle\MarkdownBundle\Parser\Preset\Medium as Parser;

/**
 * Run tests with minimal-featured Markdown Parser
 */
class Medium extends Base
{
    /**
     * @return Parser
     */
    protected function getParser()
    {
        return new Parser();
    }
}
