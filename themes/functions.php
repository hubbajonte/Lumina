<?php
/**
 * Helpers for theming, available for all themes in their template files and functions.php.
 * This file is included right before the themes own functions.php
 */
 

/**
 * Print debuginformation from the framework.
 */
function get_debug() {
  // Only if debug is wanted.
  $lu = CLumina::Instance();  
  if(empty($lu->config['debug'])) {
    return;
  }
  
  // Get the debug output
  $html = null;
  if(isset($lu->config['debug']['db-num-queries']) && $lu->config['debug']['db-num-queries'] && isset($lu->db)) {
    $flash = $lu->session->GetFlash('database_numQueries');
    $flash = $flash ? "$flash + " : null;
    $html .= "<p>Database made $flash" . $lu->db->GetNumQueries() . " queries.</p>";
  }    
  if(isset($lu->config['debug']['db-queries']) && $lu->config['debug']['db-queries'] && isset($lu->db)) {
    $flash = $lu->session->GetFlash('database_queries');
    $queries = $lu->db->GetQueries();
    if($flash) {
      $queries = array_merge($flash, $queries);
    }
    $html .= "<p>Database made the following queries.</p><pre>" . implode('<br/><br/>', $queries) . "</pre>";
  }    
  if(isset($lu->config['debug']['timer']) && $lu->config['debug']['timer']) {
    $html .= "<p>Page was loaded in " . round(microtime(true) - $lu->timer['first'], 5)*1000 . " msecs.</p>";
  }    
  if(isset($lu->config['debug']['lumina']) && $lu->config['debug']['lumina']) {
    $html .= "<hr><h3>Debuginformation</h3><p>The content of CLumina:</p><pre>" . htmlent(print_r($lu, true)) . "</pre>";
  }    
  if(isset($lu->config['debug']['session']) && $lu->config['debug']['session']) {
    $html .= "<hr><h3>SESSION</h3><p>The content of CLumina->session:</p><pre>" . htmlent(print_r($lu->session, true)) . "</pre>";
    $html .= "<p>The content of \$_SESSION:</p><pre>" . htmlent(print_r($_SESSION, true)) . "</pre>";
  }    
  return $html;
}


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
 * Login menu. Creates a menu which reflects if user is logged in or not.
 */
function login_menu() {
  $lu = CLumina::Instance();
  if($lu->user['isAuthenticated']) {
    $items = "<a href='" . create_url('user/profile') . "'><img class='gravatar' src='" . get_gravatar(20) . "' alt=''> " . $lu->user['acronym'] . "</a> ";
    if($lu->user['hasRoleAdministrator']) {
      $items .= "<a href='" . create_url('acp') . "'>acp</a> ";
    }
    $items .= "<a href='" . create_url('user/logout') . "'>logout</a> ";
  } else {
    $items = "<a href='" . create_url('user/login') . "'>login</a> ";
  }
  return "<nav id='login-menu'>$items</nav>";
}


/**
 * Get a gravatar based on the user's email.
 */
function get_gravatar($size=null) {
  return 'http://www.gravatar.com/avatar/' . md5(strtolower(trim(CLumina::Instance()->user['email']))) . '.jpg?r=pg&amp;d=wavatar&amp;' . ($size ? "s=$size" : null);
}


/**
 * Escape data to make it safe to write in the browser.
 */
function esc($str) {
  return htmlEnt($str);
}


/**
 * Filter data according to a filter. Uses CMContent::Filter()
 *
 * @param $data string the data-string to filter.
 * @param $filter string the filter to use.
 * @returns string the filtered string.
 */
function filter_data($data, $filter) {
  return CMContent::Filter($data, $filter);
}



/**
 * Display diff of time between now and a datetime. 
 *
 * @param $start datetime|string
 * @returns string
 */
function time_diff($start) {
  return formatDateTimeDiff($start);
}


/**
 * Prepend the base_url.
 */
function base_url($url=null) {
  return CLumina::Instance()->request->base_url . trim($url, '/');
}


/**
 * Create a url to an internal resource.
 *
 * @param string the whole url or the controller. Leave empty for current controller.
 * @param string the method when specifying controller as first argument, else leave empty.
 * @param string the extra arguments to the method, leave empty if not using method.
 */
function create_url($urlOrController=null, $method=null, $arguments=null) {
  return CLumina::Instance()->request->CreateUrl($urlOrController, $method, $arguments);
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