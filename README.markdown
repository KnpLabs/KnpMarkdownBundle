Provide markdown conversion to your Symfony2 projects.

This implementation is based on Michel Fortin work.
We added PHP5 sugar, feature selection, and unit tests.

[![Build Status](https://secure.travis-ci.org/KnpLabs/KnpMarkdownBundle.png)](http://travis-ci.org/KnpLabs/KnpMarkdownBundle)

## INSTALLATION

Add the following entry to ``deps`` the run ``php bin/vendors install``.

    [KnpMarkdownBundle]
        git=http://github.com/KnpLabs/KnpMarkdownBundle.git
        target=/bundles/Knp/Bundle/MarkdownBundle

Register the bundle in ``app/AppKernel.php``

    $bundles = array(
        // ...
        new Knp\Bundle\MarkdownBundle\KnpMarkdownBundle(),
    );

Register namespace in ``app/autoload.php``

    $loader->registerNamespaces(array(
        // ...
        'Knp'              => __DIR__.'/../vendor/bundles',
    ));

## USAGE

    // Use the service
    $html = $this->container->get('markdown.parser')->transform($text);

    // Use the helper
    echo $view['markdown']->transform($text);

If you have enabled the twig markdown filter, you can use the following in your twig templates:

    {{ my_data | markdown }}

## Change the parser implementation

Create a service implementing Knp\Bundle\MarkdownBundle\ParserInterface,
then configure the bundle to use it:

    knp_markdown:
          parser:
                  service: my.markdown.parser

Alternatively if you are using the ``markdown.parser.sundown`` there are
options for enabling sundown extensions and render flags, see the
default Configuration with:

    php app/console config:dump-reference knp_markdown

This bundle comes with 5 parser services, 4 based on the same algorithm
but providing different levels of compliance to the markdown specification,
and one which is uses the php sundown extension:

- markdown.parser.max       // fully compliant = slower (default implementation)
- markdown.parser.medium    // expensive and uncommon features dropped
- markdown.parser.light     // expensive features dropped
- markdown.parser.min       // most features dropped = faster
- markdown.parser.sundown   // faster and fully compliant (recommended)

``markdown.parser.sundown`` requires [php sundown extension](https://github.com/chobie/php-sundown).

For more details, see the implementations in Parser/Preset.

## TEST

    phpunit -c myapp vendor/bundles/Knp/Bundle/MarkdownBundle
