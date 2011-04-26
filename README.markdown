Provide markdown conversion to your Symfony2 projects.

This implementation is based on Michel Fortin work.
We added PHP5 sugar, feature selection, and unit tests.

## INSTALLATION

Put MarkdownBundle in your `src/Bundle` dir.

## USAGE

    // Use the service
    $html = $this->container->get('markdownParser')->transform($text);

    // Use the helper
    echo $view['markdown']->transform($text);

If you have enabled the twig markdown filter, you can use the following in your twig templates:

    {{ my_data | markdown }}

## Change the parser implementation

Create a service implementing Knplabs\Bundle\MarkdownBundle\ParserInterface,
then configure the bundle to use it:

    knplabs_markdown:
          parser:
                  service: my.markdown.parser

This bundle comes with 4 parser services, all based on the same algorithm
but providing different levels of compliance to the markdown specification:

- markdown.parser.max       // fully compliant = slower (default implementation)
- markdown.parser.medium    // expensive and uncommon features dropped
- markdown.parser.light     // expensive features dropped
- markdown.parser.min       // most features dropped = faster

For more details, see the implementations in Parser/Preset.

## TEST

    phpunit -c myapp src/Bundle/MarkdownBundle
