<?php
/**
* Standard controller layout.
* 
* @package ludiaCore
*/
class CCIndex implements IController {

   /**
    * Implementing interface IController. All controllers must have an index action.
    */
   public function Index() {   
      global $lu;
      $lu->data['title'] = "The Index Controller";
   }

}