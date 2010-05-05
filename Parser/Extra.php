<?php

namespace Bundle\MarkdownBundle\Parser;

require_once(realpath(__DIR__.'/..').'/vendor/1.2.4/markdown.php');

class Extra extends \MarkdownExtra_Parser
{
  public function __construct()
  {
    parent::MarkdownExtra_Parser();
  }
}