<?php

namespace Knplabs\Bundle\MarkdownBundle\Parser\Preset;

use Knplabs\Bundle\MarkdownBundle\Parser\MarkdownParser;

/**
 * Minimally featured Markdown Parser
 */
class Min extends MarkdownParser
{

    public function __construct(array $features = array())
    {
        foreach ($this->features as $name => $enabled) {
            $this->features[$name] = false;
        }

        return parent::__construct($features);
    }

}

