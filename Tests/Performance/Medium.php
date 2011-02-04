<?php

namespace Knplabs\MarkdownBundle\Tests\Performance;

use Knplabs\MarkdownBundle\Parser\Preset\Medium as Parser;

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
