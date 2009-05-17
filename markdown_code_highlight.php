<?php
/*
Plugin Name: WP Markdown Code Highlight
Plugin URI: 
Description: Adds GeSHi syntax highlighting to Markdown code blocks that start with a #!lang line. You must have the Markdown plugin installed for this to work.
Version: 0.1
Author: Steve Webster
Author URI: http://statichtml.com
*/

define( 'WP_MARKDOWN_CODE_HIGHLIGHT_CSS', 'default.css' );

if ( defined( 'GESHI_VERSION' ) == false ) {
    require dirname( __FILE__ ) . '/geshi.php';
}

add_action('wp_head',           'markdown_code_highlight_head' );

// Install filter to run after markdown (priority 6)
add_filter('the_content',       'markdown_code_highlight', 7);
add_filter('the_content_rss',   'markdown_code_highlight_rss', 7);
add_filter('get_the_excerpt',   'markdown_code_highlight', 7);

function markdown_code_highlight( $text ) {
    return preg_replace( '|<pre><code>#!([^\\n]+)(.*?)</code></pre>|se', 'markdown_code_highlighter(\'$2\',\'$1\');', $text);
}

function markdown_code_highlight_rss( $text ) {
    return preg_replace( '|<pre><code>#!([^\\n]+)(.*?)</code></pre>|se', 'markdown_code_highlighter(\'$2\',\'$1\',true);', $text);
}

function markdown_code_highlight_head() {
    $plugin_dir_url = WP_PLUGIN_URL . '/' . str_replace( basename( __FILE__ ), "", plugin_basename( __FILE__ ) );
    
    echo '<link rel="stylesheet" type="text/css" href="' . $plugin_dir_url . 'css/' . WP_MARKDOWN_CODE_HIGHLIGHT_CSS . '"/>';
}

function markdown_code_highlighter( $code, $language, $rss = false ) {
    $code = stripslashes( trim( htmlspecialchars_decode( $code, ENT_NOQUOTES ) ) );
    $geshi = new GeSHi( $code, $language );
    if ( $rss == false ) {
        $geshi->set_header_type( GESHI_HEADER_NONE );
        $geshi->enable_classes();
    }
    return '<pre class="lang-' . $language . '"><code>' . $geshi->parse_code() . '</code></pre>';
}

?>