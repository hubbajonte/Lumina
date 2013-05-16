<?php
/**
 * Admin Control Panel to manage admin stuff.
 * 
 * @package LuminaCore
 */
class CCAdminControlPanel extends CObject implements IController {


  /**
   * Constructor
   */
  public function __construct() {
    parent::__construct();
  }


  /**
   * Index for the ACP.
   */
  public function Index() {
    $modules = new CMModules();
    $controllers = $modules->AvailableControllers();
    $this->views->SetTitle('ACP: Admin Control Panel');
    $this->views->AddInclude(__DIR__ . '/sidebar.tpl.php', array('controllers'=>$controllers), 'sidebar')
	            ->AddInclude(__DIR__ . '/index.tpl.php', array(
	                'hasRoleAdmin'=>$this->user['hasRoleAdmin'], 'primary'));
  }
 

} 