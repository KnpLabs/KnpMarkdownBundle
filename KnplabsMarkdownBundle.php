<?php

namespace Knplabs\MarkdownBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle as BaseBundle;

class KnplabsMarkdownBundle extends BaseBundle
{
    public function getNamespace()
    {
        return __NAMESPACE__;
    }

    public function getPath()
    {
        return __DIR__;
    }
}
