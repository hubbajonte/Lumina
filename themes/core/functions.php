<?php
/**
 * Helpers for the template file.
 */

/**
 * Add static entries for use in the template file. 
 */
$lu->data['header'] = '<h2>Lumina</h2>';
$lu->data['slogan'] = 'A PHP-based MVC-inspired CMF';
$lu->data['favicon']      = theme_url('logo_80x80.png');
$lu->data['logo']         = theme_url('logo_80x80.png');
$lu->data['logo_width']   = 80;
$lu->data['logo_height']  = 80;
$lu->data['footer'] = <<<EOD
<p>Lydia &copy; by Jonathan Arevalo @ BTH </p>

<p>Tools: 
<a href="http://validator.w3.org/check/referer">html5</a>
<a href="http://jigsaw.w3.org/css-validator/check/referer?profile=css3">css3</a>
<a href="http://jigsaw.w3.org/css-validator/check/referer?profile=css21">css21</a>
<a href="http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance">unicorn</a>
</p>
EOD;
?>