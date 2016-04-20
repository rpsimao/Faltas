<?php
/**
 * 
 * Enter description here ...
 * 
 * @author Ricardo Sim�o - ricardo.simao@fterceiro.pt
 * @copyright 2011 - Fernandes & Terceiro, SA
 * @copyright All right reserved.
 * @license Although this script is provided with source code it does NOT mean that this report is in the public domain.
 * 
 * @version 1.0 - Sep 25, 2012 10:35:53 AM
 * 
 * @category Printshop
 * @package 
 * 
 */
require_once 'Zend/View/Interface.php';

/**
 * JSHelper helper
 *
 * @uses viewHelper Application_View_Helper
 */
class Application_View_Helper_JSHelper
{

    /**
     *
     * @var Zend_View_Interface
     */
    public $view;

    /**
     */
    public function JSHelper ()
    {
        $request = Zend_Controller_Front::getInstance()->getRequest();
                $file_uri = 'js/' . $request->getControllerName() . '/' .
                 $request->getActionName() . '.js';
                if (file_exists($file_uri)) {
                    return $this->view->headScript()->setFile('/' . $file_uri, $type = 'text/javascript');
                }
    }

    /**
     * Sets the view field
     * 
     * @param $view Zend_View_Interface            
     */
    public function setView (Zend_View_Interface $view)
    {
        $this->view = $view;
    }
}
