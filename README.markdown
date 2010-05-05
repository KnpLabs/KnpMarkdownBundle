Provide markdown to Symfony 2 projects.

## INSTALLATION

Put MarkdownBundle to your src/Bundle dir.

Then, enable it in your config.yml:

    markdown.parser: ~

## USAGE

    $this->container->markdownParser->transform($text); // returns HTML.