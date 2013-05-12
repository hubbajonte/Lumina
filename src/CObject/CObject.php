<?php
/**
 * Holding a instance of CLumina to enable use of $this in subclasses and provide some helpers.
 *
 * @package LuminaCore
 */
class CObject {

	/**
	 * Members
	 */
	protected $lu;
	protected $config;
	protected $request;
	protected $data;
	protected $db;
	protected $views;
	protected $session;
	protected $user;


	/**
	 * Constructor, can be instantiated by sending in the $lu reference.
	 */
	protected function __construct($lu=null) {
	  if(!$lu) {
	    $lu = CLUMINA::Instance();
	  }
    $this->lu       = &$lu;
    $this->config   = &$lu->config;
    $this->request  = &$lu->request;
    $this->data     = &$lu->data;
    $this->db       = &$lu->db;
    $this->views    = &$lu->views;
    $this->session  = &$lu->session;
    $this->user     = &$lu->user;
	}


	/**
	 * Wrapper for same method in CLumina. See there for documentation.
	 */
	protected function RedirectTo($urlOrController=null, $method=null, $arguments=null) {
    $this->lu->RedirectTo($urlOrController, $method, $arguments);
  }


	/**
	 * Wrapper for same method in CLumina. See there for documentation.
	 */
	protected function RedirectToController($method=null, $arguments=null) {
    $this->lu->RedirectToController($method, $arguments);
  }


	/**
	 * Wrapper for same method in CLumina. See there for documentation.
	 */
	protected function RedirectToControllerMethod($controller=null, $method=null, $arguments=null) {
    $this->lu->RedirectToControllerMethod($controller, $method, $arguments);
  }


	/**
	 * Wrapper for same method in CLumina. See there for documentation.
	 */
  protected function AddMessage($type, $message, $alternative=null) {
    return $this->lu->AddMessage($type, $message, $alternative);
  }


	/**
	 * Wrapper for same method in CLumina. See there for documentation.
	 */
	protected function CreateUrl($urlOrController=null, $method=null, $arguments=null) {
    return $this->lu->CreateUrl($urlOrController, $method, $arguments);
  }


}
  