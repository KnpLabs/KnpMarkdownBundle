<?php

namespace Knplabs\Bundle\MarkdownBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle as BaseBundle;

class KnplabsMarkdownBundle extends BaseBundle
{
    /**
     * {@inheritdoc}
     */
    public function getNamespace()
    {
        return __NAMESPACE__;
    }

    /**
     * {@inheritdoc}
     */
    public function getPath()
    {
        return strtr(__DIR__, '\\', '/');
    }
}
