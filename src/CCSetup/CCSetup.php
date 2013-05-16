<?php
/**
 * Controller that controlls the Setup.
 * 
 * @package LuminaCore
 */
class CCSetup extends CObject implements IController {


  /**
   * Constructor
   */
  public function __construct() { parent::__construct(); }
  

  /**
   * Implementing interface IController. All controllers must have an index action.
   */
  public function Index() {		
    $modules = new CMModules();
    $controllers = $modules->AvailableControllers();
    $this->views->SetTitle('Index')
                ->AddInclude(__DIR__ . '/index.tpl.php', array(), 'primary');
				
}
  
  
  /**
   * Show a install-page and guides the user through it.
   */
  public function Install() {
    $modules = new CMModules();
    $results = $modules->Install();
    $allModules = $modules->ReadAndAnalyse();
    $this->views->SetTitle('Install Modules')
                ->AddInclude(__DIR__ . '/install.tpl.php', array('modules'=>$results), 'primary');
  }


} 