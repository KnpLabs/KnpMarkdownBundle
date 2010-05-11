<?php

namespace Bundle\MarkdownBundle\Tests\Performance;

require_once __DIR__.'/Base.php';

require_once __DIR__.'/../../Parser/Preset/Min.php';

use Bundle\MarkdownBundle\Parser\Preset\Min as Parser;

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