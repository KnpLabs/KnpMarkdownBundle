<?php

$name = 'Min';

require_once __DIR__.'/'.$name.'.php';
$class = 'Knplabs\\MarkdownBundle\\Tests\\Performance\\'.$name;
$test = new $class();
print nl2br($test->run(10));
