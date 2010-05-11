<?php

namespace Bundle\MarkdownBundle\Tests\Performance;

require_once __DIR__.'/Base.php';

require_once __DIR__.'/../../Parser/Preset/Max.php';

use Bundle\MarkdownBundle\Parser\Preset\Max as Parser;

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