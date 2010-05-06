Provide markdown to Symfony 2 projects.

## INSTALLATION

Put MarkdownBundle to your src/Bundle dir.

Then, enable it in your config.yml:

    markdown.parser: ~      # Enable the parser service
    markdown.helper: ~      # Enable the helper for use in templates

## USAGE

    // Use the service
    $html = $this->container->markdownParser->transform($text);

    // Use the helper
    echo $view->markdown->transform($text);