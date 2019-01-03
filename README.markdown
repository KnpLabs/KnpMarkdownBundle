Provide markdown conversion (based on [Michel Fortin work](https://github.com/michelf/php-markdown)) to your Symfony projects.

[![Build Status](https://secure.travis-ci.org/KnpLabs/KnpMarkdownBundle.svg)](http://travis-ci.org/KnpLabs/KnpMarkdownBundle)

## INSTALLATION

Add KnpMarkdownBundle to your project via [Composer](https://getcomposer.org/):

```
composer require knplabs/knp-markdown-bundle
```

If you're *not* using Symfony Flex, you will also need to enable
the bundle in your `app/AppKernel.php` file
(`new Knp\Bundle\MarkdownBundle\KnpMarkdownBundle()`).

That's it! Start using it!

## USAGE

Once the bundle is installed, you can autowire a `MarkdownParserInterface`
into any service or controller:

```php
use Knp\Bundle\MarkdownBundle\MarkdownParserInterface;

// from inside a controller
public function index(MarkdownParserInterface $parser)
{
    $html = $parser->transformMarkdown($text);
}

// or from inside a service
private $parser;

public function __construct(MarkdownParserInterface $parser)
{
    $this->parser = $parser;
}

public function someMethod()
{
    $html = $this->parser->transformMarkdown($text);
}
```

There is also a public `markdown.parser` service you can use.

In Twig, you can use the `markdown` filter:

```twig
{# Use default parser #}
{{ my_data|markdown }}

{# Or select specific parser #}
{{ my_data|markdown('parserName') }}
```

## Change the parser implementation

Create a service implementing `Knp\Bundle\MarkdownBundle\MarkdownParserInterface`,
then configure the bundle to use it:

```yaml
# Symfony 3: app/config/config.yml
# Symfony 4: config/packages/knp_markdown.yaml (you'll need to create this)
knp_markdown:
    parser:
        service: my.markdown.parser
```

Alternatively if you are using the ``markdown.parser.sundown`` there are
options for enabling sundown extensions and render flags, see the
default Configuration with:

    php bin/console config:dump-reference knp_markdown

This bundle comes with 5 parser services, 4 based on the same algorithm
but providing different levels of compliance to the markdown specification,
and one which is uses the php sundown extension:

    - markdown.parser.max       // fully compliant = slower (default implementation)
    - markdown.parser.medium    // expensive and uncommon features dropped
    - markdown.parser.light     // expensive features dropped
    - markdown.parser.min       // most features dropped = faster
    - markdown.parser.sundown   // faster and fully compliant (recommended)

``markdown.parser.sundown`` requires the [php sundown extension](https://github.com/chobie/php-sundown).

For more details, see the implementations in Parser/Preset.
