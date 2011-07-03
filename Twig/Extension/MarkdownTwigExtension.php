<?php

namespace Knp\Bundle\MarkdownBundle\Twig\Extension;

use Knp\Bundle\MarkdownBundle\Helper\MarkdownHelper;

class MarkdownTwigExtension extends \Twig_Extension
{
    protected $helper;

    function __construct(MarkdownHelper $helper)
    {
        $this->helper = $helper;
    }

    public function getFilters()
    {
        return array(
            'markdown' => new \Twig_Filter_Method($this, 'markdown', array('is_safe' => array('html'))),
        );
    }

    public function markdown($txt)
    {
        return $this->helper->transform($txt);
    }

    public function getName()
    {
        return 'markdown';
    }
}
