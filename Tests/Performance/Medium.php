<?php

namespace Bundle\MarkdownBundle\Tests\Performance;

require_once __DIR__.'/Base.php';

require_once __DIR__.'/../../Parser/Preset/Medium.php';

use Bundle\MarkdownBundle\Parser\Preset\Medium as Parser;

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