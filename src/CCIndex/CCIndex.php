<?php
/**
 * Standard controller layout.
 * 
 * @package LuminaCore
 */
class CCIndex extends CObject implements IController {

  /**
   * Constructor
   */
  public function __construct() { parent::__construct(); }
  

  /**
   * Implementing interface IController. All controllers must have an index action.
   */
  public function Index() {			
    $guestbook = new CMGuestbook();
    $form = new CFormMyGuestbook($guestbook);
    $status = $form->Check();
    if($status === false) {
      $this->AddMessage('notice', 'The form could not be processed.');
      $this->RedirectToControllerMethod();
    } else if($status === true) {
      $this->RedirectToControllerMethod();
    }  
    $this->views->SetTitle('Index')
                ->AddInclude(__DIR__ . '/index.tpl.php', array(), 'primary')
				->AddInclude(__DIR__ . '/sidebar.tpl.php', array(
            'entries'=>$guestbook->ReadAll(), 
            'form'=>$form,
            ), 'sidebar');
}

}
