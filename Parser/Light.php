<?php

namespace Bundle\MarkdownBundle\Parser;

require_once(realpath(__DIR__.'/..').'/vendor/1.0.1n/markdown.php');

class Light extends \Markdown_Parser
{
  public function __construct()
  {
    parent::Markdown_Parser();
  }
}