<?php

namespace Knp\Bundle\MarkdownBundle\Twig\Extension;

use Knp\Bundle\MarkdownBundle\Parser\ParserManager;

class MarkdownTwigExtension extends \Twig_Extension
{
    private $parserManager;

    public function __construct(ParserManager $parserManager)
    {
        $this->parserManager = $parserManager;
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('markdown', array($this, 'markdown'), array('is_safe' => array('html'))),
        );
    }

    public function markdown($text, $parser = null)
    {
        return $this->parserManager->transform($text, $parser);
    }

    public function getName()
    {
        return 'markdown';
    }
}
