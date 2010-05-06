PHP Markdown
============

Version 1.0.1m - Sat 21 Jun 2008

by Michel Fortin
<http://michelf.com/>

based on work by John Gruber  
<http://daringfireball.net/>


Introduction
------------

Markdown is a text-to-HTML conversion tool for web writers. Markdown
allows you to write using an easy-to-read, easy-to-write plain text
format, then convert it to structurally valid XHTML (or HTML).

"Markdown" is two things: a plain text markup syntax, and a software 
tool, written in Perl, that converts the plain text markup to HTML. 
PHP Markdown is a port to PHP of the original Markdown program by 
John Gruber.

PHP Markdown can work as a plug-in for WordPress and bBlog, as a 
modifier for the Smarty templating engine, or as a remplacement for
textile formatting in any software that support textile.

Full documentation of Markdown's syntax is available on John's 
Markdown page: <http://daringfireball.net/projects/markdown/>


Installation and Requirement
----------------------------

PHP Markdown requires PHP version 4.0.5 or later.


### WordPress ###

PHP Markdown works with [WordPress][wp], version 1.2 or later.

 [wp]: http://wordpress.org/

1.  To use PHP Markdown with WordPress, place the "makrdown.php" file 
    in the "plugins" folder. This folder is located inside 
    "wp-content" at the root of your site:

        (site home)/wp-content/plugins/

2.  Activate the plugin with the administrative interface of 
    WordPress. In the "Plugins" section you will now find Markdown. 
    To activate the plugin, click on the "Activate" button on the 
    same line than Markdown. Your entries will now be formatted by 
    PHP Markdown.

3.  To post Markdown content, you'll first have to disable the 
	"visual" editor in the User section of WordPress.

You can configure PHP Markdown to not apply to the comments on your 
WordPress weblog. See the "Configuration" section below.

It is not possible at this time to apply a different set of 
filters to different entries. All your entries will be formated by 
PHP Markdown. This is a limitation of WordPress. If your old entries 
are written in HTML (as opposed to another formatting syntax, like 
Textile), they'll probably stay fine after installing Markdown.


### bBlog ###

PHP Markdown also works with [bBlog][bb].

 [bb]: http://www.bblog.com/

To use PHP Markdown with bBlog, rename "markdown.php" to 
"modifier.markdown.php" and place the file in the "bBlog_plugins" 
folder. This folder is located inside the "bblog" directory of 
your site, like this:

        (site home)/bblog/bBlog_plugins/modifier.markdown.php

Select "Markdown" as the "Entry Modifier" when you post a new 
entry. This setting will only apply to the entry you are editing.


### Replacing Textile in TextPattern ###

[TextPattern][tp] use [Textile][tx] to format your text. You can 
replace Textile by Markdown in TextPattern without having to change
any code by using the *Texitle Compatibility Mode*. This may work 
with other software that expect Textile too.

 [tx]: http://www.textism.com/tools/textile/
 [tp]: http://www.textpattern.com/

1.  Rename the "markdown.php" file to "classTextile.php". This will
	make PHP Markdown behave as if it was the actual Textile parser.

2.  Replace the "classTextile.php" file TextPattern installed in your
	web directory. It can be found in the "lib" directory:

		(site home)/textpattern/lib/

Contrary to Textile, Markdown does not convert quotes to curly ones 
and does not convert multiple hyphens (`--` and `---`) into en- and 
em-dashes. If you use PHP Markdown in Textile Compatibility Mode, you 
can solve this problem by installing the "smartypants.php" file from 
[PHP SmartyPants][psp] beside the "classTextile.php" file. The Textile 
Compatibility Mode function will use SmartyPants automatically without 
further modification.

 [psp]: http://michelf.com/projects/php-smartypants/


### Updating Markdown in Other Programs ###

Many web applications now ship with PHP Markdown, or have plugins to 
perform the conversion to HTML. You can update PHP Markdown in many of 
these programs by swapping the old "markdown.php" file for the new one.

Here is a short non-exhaustive list of some programs and where they 
hide the "markdown.php" file.

| Program   | Path to Markdown
| -------   | ----------------
| [Pivot][] | `(site home)/pivot/includes/markdown/markdown.php`

If you're unsure if you can do this with your application, ask the 
developer, or wait for the developer to update his application or 
plugin with the new version of PHP Markdown.

 [Pivot]: http://pivotlog.net/


### In Your Own Programs ###

You can use PHP Markdown easily in your current PHP program. Simply 
include the file and then call the Markdown function on the text you 
want to convert:

    include_once "markdown.php";
    $my_html = Markdown($my_text);

If you wish to use PHP Markdown with another text filter function 
built to parse HTML, you should filter the text *after* the Markdown
function call. This is an example with [PHP SmartyPants][psp]:

    $my_html = SmartyPants(Markdown($my_text));


### With Smarty ###

If your program use the [Smarty][sm] template engine, PHP Markdown 
can now be used as a modifier for your templates. Rename "markdown.php" 
to "modifier.markdown.php" and put it in your smarty plugins folder.

  [sm]: http://smarty.php.net/

If you are using MovableType 3.1 or later, the Smarty plugin folder is 
located at `(MT CGI root)/php/extlib/smarty/plugins`. This will allow 
Markdown to work on dynamic pages.


Configuration
-------------

By default, PHP Markdown produces XHTML output for tags with empty 
elements. E.g.:

    <br />

Markdown can be configured to produce HTML-style tags; e.g.:

    <br>

To do this, you  must edit the "MARKDOWN_EMPTY_ELEMENT_SUFFIX" 
definition below the "Global default settings" header at the start of 
the "markdown.php" file.