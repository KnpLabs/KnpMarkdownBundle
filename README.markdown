Provide markdown conversion to your Symfony2 projects.

## INSTALLATION

Put MarkdownBundle in your `src/Bundle` dir.

Then enable it in your `config.yml`:

    markdown.parser: ~      # Enable the parser service
    markdown.helper: ~      # Enable the helper in the templates

## USAGE

    // Use the service
    $html = $this->container['markdownParser']->transform($text);

    // Use the helper
    echo $view->markdown->transform($text);

## TEST

    phpunit -c myapp src/Bundle/MarkdownBundle
