<?php
/**
 * Form for the guestbook
 */
class CFormMyGuestbook extends CForm {

  /**
   * Properties
   */
  private $object;

  /**
   * Constructor
   */
  public function __construct($object) {
    parent::__construct();
    $this->objecyt = $object;
    $this->AddElement(new CFormElementTextarea('data', array('label'=>'Add entry:')))
         ->AddElement(new CFormElementSubmit('add', array('callback'=>array($this, 'DoAdd'), 'callback-args'=>array($object))));
  }
  

  /**
   * Callback to add the form content to database.
   */
  public function DoAdd($form, $object) {
    return $object->Add(strip_tags($form['data']['value']));
  }
 
 
}