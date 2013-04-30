<?php
/**
* Holding a instance of CLumina to enable use of $this in subclasses.
*
* @package LuminaCore
*/
class CObject {

   public $config;
   public $request;
   public $data;
   public $db;
   public $views;
   public $session;

   /**
    * Constructor
    */
   protected function __construct() {
    $lu = CLumina::Instance();
    $this->config   = &$lu->config;
    $this->request  = &$lu->request;
    $this->data     = &$lu->data;
	$this->db       = &$lu->db;
	$this->views    = &$lu->views;
	$this->session  = &$lu->session;
  }
  
	/**
	 * Redirect to another url and store the session
	 */
	protected function RedirectTo($url) {
    $lu = CLumina::Instance();
    if(isset($lu->config['debug']['db-num-queries']) && $lu->config['debug']['db-num-queries'] && isset($lu->db)) {
      $this->session->SetFlash('database_numQueries', $this->db->GetNumQueries());
    }    
    if(isset($lu->config['debug']['db-queries']) && $lu->config['debug']['db-queries'] && isset($lu->db)) {
      $this->session->SetFlash('database_queries', $this->db->GetQueries());
    }    
    if(isset($lu->config['debug']['timer']) && $lu->config['debug']['timer']) {
	    $this->session->SetFlash('timer', $lu->timer);
    }    
    $this->session->StoreInSession();
    header('Location: ' . $this->request->CreateUrl($url));
  }


}