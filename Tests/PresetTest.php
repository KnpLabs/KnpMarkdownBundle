<?php

namespace Knp\Bundle\MarkdownBundle\Tests;

use Knp\Bundle\MarkdownBundle\Parser\Preset as Preset;
use PHPUnit\Framework\TestCase;

class PresetTest extends TestCase
{
    public function testMax()
    {
        $parser = new Preset\Max();

        $this->assertEquals($this->getHtml(), $parser->transform($this->getText()));
    }

    public function testMedium()
    {
        $parser = new Preset\Medium();

        $this->assertEquals($this->getHtml(), $parser->transform($this->getText()));
    }

    public function testMin()
    {
        #$this->markTestSkipped('Wait for implemtation');
        $this->markTestIncomplete('This test has not been implemented yet.');

        $parser = new Preset\Min();

        $this->assertEquals($this->getHtml(), $parser->transform($this->getText()));
    }

    public function testLight()
    {
        #$this->markTestSkipped('Wait for implemtation');
        $this->markTestIncomplete('This test has not been implemented yet.');

        $parser = new Preset\Light();

        $this->assertEquals($this->getHtml(), $parser->transform($this->getText()));
    }

    protected function getText(): bool|string
    {
        return file_get_contents(__DIR__.'/fixtures/big_text.markdown');
    }

    protected function getHtml(): bool|string
    {
        return file_get_contents(__DIR__.'/fixtures/big_text.html');
    }
}
