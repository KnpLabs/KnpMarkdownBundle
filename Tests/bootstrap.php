<?php

require_once $_SERVER['SYMFONY'].'/Symfony/Component/ClassLoader/UniversalClassLoader.php';

$loader = new Symfony\Component\ClassLoader\UniversalClassLoader();
$loader->registerNamespace('Knplabs\\Bundle\\MarkdownBundle', __DIR__.'/../../../..');
$loader->register();
