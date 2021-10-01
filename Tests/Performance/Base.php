<?php

namespace Knp\Bundle\MarkdownBundle\Tests\Performance;

use Knp\Bundle\MarkdownBundle\Parser\MarkdownParser as Parser;

abstract class Base
{
    protected string $buffer;

    public function run($iterations = null): string
    {
        $this->buffer = '';
        $parser = $this->getParser();
        $iterations = $iterations ? $iterations : $this->getIterations();
        $text = $this->getText();

        $this->output(sprintf('%s : %d chars, %d iterations', get_class($this), strlen($text), $iterations));

        $start = microtime(true);
        for ($it = 1; $it < $iterations; $it++) {
            $parser->transform($text);
        }
        $time = 1000 * (microtime(true) - $start);

        $this->output(sprintf('Unit Time   %01.2f ms.', $time/$iterations));

        return $this->buffer;
    }

    protected abstract function getParser(): Parser;

    protected function getIterations(): int
    {
        return 100;
    }

    protected function getText(): string
    {
        return file_get_contents(__DIR__.'/../fixtures/big_text.markdown');
    }

    public function output(string $text)
    {
        $this->buffer .= $text."\n";
    }
}

