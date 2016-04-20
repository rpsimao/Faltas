<?php

class AjaxController extends Zend_Controller_Action
{

    public function init ()
    {
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
    }

    public function indexAction ()
    {
        // action body
    }

    public function namefromoptimusAction ()
    {
        $id = $this->_getParam('id');
        
        $size = strlen($id);
        
        switch ($size) {
            case 1:
                $id = "000" . $id;
                break;
            
            case 2:
                $id = "00" . $id;
                break;
            
            case 3:
                $id = "0" . $id;
                break;
            
            default:
                return $id;
                break;
        }
        
        $db = new Application_Model_Optimus();
        $nome = $db->findById($id);
        
        $this->getResponse()->appendBody(utf8_encode(($nome['staf_name'])));
    }
}

