WP-Markdown-Code-Highlight
==========================

WP-Markdown-Code-Highlight is a plugin for Wordpress that adds code syntax highlighting to Markdown formatted text. You must have the [PHP Markdown](http://michelf.com/projects/php-markdown/) plugin installed for this to work.

Formatting your code
--------------------

In order to have your code highlighted you need to add a shebang containing the language name as the first line of your code block:

    #!php
    $foo = "bar";

The shebang line will be removed in the formatted code and leave you with highlighted text. This will output:

    <pre class="lang-php"><code><span class="re0">$foo</span> <span class="sy0">=</span> <span class="st0">&quot;bar&quot;</span><span class="sy0">;</span></pre></code>    

Changing the style
------------------

To create your own code style simply upload it to the `css` directory in the plugin folder and then change the `WP_MARKDOWN_CODE_HIGHLIGHT_CSS` definition at the top of the `markdown_code_highlight.php` file. In the future this will be configurable through the Wordpress admin interface.

Over and above the standard GeSHi CSS classes, WP-Markdown-Code-Highlight adds a language-specific class in the format `lang-{language}` to the &lt;pre&gt; tag that you can use for language-specific CSS styles.


License
-------

GeSHi is released under the GPL License. See the `geshi.php` file for full license and copyright details.

Since I hate GPL with a passion, WP-Markdown-Code-Highlight is released under the [MIT License](http://www.opensource.org/licenses/mit-license.php).

Copyright (c) 2009 Steve Webster

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.