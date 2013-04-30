<?php
/**
 * Site configuration, this file is changed by user per site.
 *
 */

/**
 * Set level of error reporting
 */
error_reporting(-1);
ini_set('display_errors', 1);


/**
 * Set what to show as debug or developer information in the get_debug() theme helper.
 */
$lu->config['debug']['lumina'] = false;
$lu->config['debug']['db-num-queries'] = true;
$lu->config['debug']['db-queries'] = true;


/**
 * Set database(s).
 */
$lu->config['database'][0]['dsn'] = 'sqlite:' . LUMINA_SITE_PATH . '/data/.ht.sqlite';


/**
 * What type of urls should be used?
 * 
 * default      = 0      => index.php/controller/method/arg1/arg2/arg3
 * clean        = 1      => controller/method/arg1/arg2/arg3
 * querystring  = 2      => index.php?q=controller/method/arg1/arg2/arg3
 */
$lu->config['url_type'] = 1;


/**
 * Set a base_url to use another than the default calculated
 */
$lu->config['base_url'] = null;


/**
 * Define session name
 */
$lu->config['session_name'] = preg_replace('/[:\.\/-_]/', '', $_SERVER["SERVER_NAME"]);


/**
 * Define server timezone
 */
$lu->config['timezone'] = 'Europe/Stockholm';


/**
 * Define internal character encoding
 */
$lu->config['character_encoding'] = 'UTF-8';


/**
 * Define language
 */
$lu->config['language'] = 'en';

/*
* Sessionkey
*/
$lu->config['session_key']  = 'lumina';


/**
 * Define the controllers, their classname and enable/disable them.
 *
 * The array-key is matched against the url, for example: 
 * the url 'developer/dump' would instantiate the controller with the key "developer", that is 
 * CCDeveloper and call the method "dump" in that class. This process is managed in:
 * $ly->FrontControllerRoute();
 * which is called in the frontcontroller phase from index.php.
 */
$lu->config['controllers'] = array(
  'index'     => array('enabled' => true,'class' => 'CCIndex'),
  'developer' => array('enabled' => true,'class' => 'CCDeveloper'),
  'guestbook' => array('enabled' => true,'class' => 'CCGuestbook'),
);

/**
 * Settings for the theme.
 */
$lu->config['theme'] = array(
  // The name of the theme in the theme directory
  'name'    => 'core', 
);