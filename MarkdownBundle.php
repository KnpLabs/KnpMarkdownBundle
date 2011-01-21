<?php

namespace Bundle\MarkdownBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle as BaseBundle;

class MarkdownBundle extends BaseBundle
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
