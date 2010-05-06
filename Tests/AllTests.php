<?php

namespace Bundle\MiamBundle\Tests;

require_once 'PHPUnit/Framework.php';
require_once __DIR__.'/Parser/LightTest.php';
require_once __DIR__.'/Parser/ExtraTest.php';

class AllTests
{
  public static function suite()
  {
    $suite = new \PHPUnit_Framework_TestSuite('MarkdownBundle');

    $suite->addTestSuite('\Bundle\MarkdownBundle\Tests\Parser\LightTest');
    $suite->addTestSuite('\Bundle\MarkdownBundle\Tests\Parser\ExtraTest');

    return $suite;
  }
}