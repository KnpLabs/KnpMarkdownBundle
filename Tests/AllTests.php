<?php

namespace Bundle\MarkdownBundle\Tests;

require_once 'PHPUnit/Framework.php';

require_once __DIR__.'/FeatureTest.php';
require_once __DIR__.'/PresetTest.php';

class AllTests
{

    public static function suite()
    {
        $suite = new \PHPUnit_Framework_TestSuite('MarkdownBundle');

        $suite->addTestSuite('\Bundle\MarkdownBundle\Tests\FeatureTest');
        $suite->addTestSuite('\Bundle\MarkdownBundle\Tests\PresetTest');

        return $suite;
    }

}

