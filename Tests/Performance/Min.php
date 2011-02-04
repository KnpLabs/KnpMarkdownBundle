<?php

namespace Knplabs\MarkdownBundle\Tests\Performance;

use Knplabs\MarkdownBundle\Parser\Preset\Min as Parser;

/**
 * Run tests with minimal-featured Markdown Parser
 */
class Min extends Base
{
    /**
     * @return Parser
     */
    protected function getParser()
    {
        return new Parser();
    }
}
