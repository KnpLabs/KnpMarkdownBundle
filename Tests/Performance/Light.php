<?php

namespace Bundle\MarkdownBundle\Tests\Performance;

require_once __DIR__.'/Base.php';

require_once __DIR__.'/../../Parser/Preset/Light.php';

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