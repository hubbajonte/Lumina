<?php
/**
 * Helpers for theming, available for all themes in their template files and functions.php.
 * This file is included right before the themes own functions.php
 */
 
 
 
/**
* Get messages stored in flash-session.
*/
function get_messages_from_session() {
  $messages = CLumina::Instance()->session->GetMessages();
  $html = null;
  if(!empty($messages)) {
    foreach($messages as $val) {
      $valid = array('info', 'notice', 'success', 'warning', 'error', 'alert');
      $class = (in_array($val['type'], $valid)) ? $val['type'] : 'info';
      $html .= "<div class='$class'>{$val['message']}</div>\n";
    }
  }
  return $html;
}
 

/**
 * Print debuginformation from the framework.
 */
function get_debug() {
  $lu = CLumina::Instance();  
  $html = null;
  if(isset($lu->config['debug']['db-num-queries']) && $lu->config['debug']['db-num-queries'] && isset($lu->db)) {
    $html .= "<p>Database made " . $lu->db->GetNumQueries() . " queries.</p>";
  }    
  if(isset($lu->config['debug']['db-queries']) && $lu->config['debug']['db-queries'] && isset($lu->db)) {
    $html .= "<p>Database made the following queries.</p><pre>" . implode('<br/><br/>', $lu->db->GetQueries()) . "</pre>";
  }    
  if(isset($lu->config['debug']['lumina']) && $lu->config['debug']['lumina']) {
    $html .= "<hr><h3>Debuginformation</h3><p>The content of CLumina:</p><pre>" . htmlent(print_r($lu, true)) . "</pre>";
  }    
  return $html;
}


/**
 * Prepend the base_url.
 */
function base_url($url=null) {
  return CLumina::Instance()->request->base_url . trim($url, '/');
}


/**
 * Create a url to an internal resource.
 */
function create_url($url=null) {
  return CLumina::Instance()->request->CreateUrl($url);
}


/**
 * Prepend the theme_url, which is the url to the current theme directory.
 */
function theme_url($url) {
  $lu = CLumina::Instance();
  return "{$lu->request->base_url}themes/{$lu->config['theme']['name']}/{$url}";
}


/**
 * Return the current url.
 */
function current_url() {
  return CLumina::Instance()->request->current_url;
}


/**
 * Render all views.
 */
function render_views() {
  return CLumina::Instance()->views->Render();
}