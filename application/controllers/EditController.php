<?php

class EditController extends Zend_Controller_Action
{

    public function init()
    {
        $this->sess = new Zend_Session_Namespace("faltas_auth");
        $this->log = $this->sess->login;
              
              if ($this->log['faltas'] != TRUE){
                  
                  $this->_redirect("/index/authenticationfailure/");
              }
    }

    public function indexAction()
    {
        // action body
    }

    public function normalAction()
    {
       $id = $this->_getParam('id');    
        $db = new Application_Model_Faltas();
        $record = $db->findById($id)->toArray();
        
        $form = new Application_Form_Admin();
        $form->populate($record[0]);
        $this->view->form  = $form;
        $this->view->id = $id;
        
        /**
         * Files
         */
        $this->view->files = $db->retrieveFiles($id);
    }

    public function adminAction()
    {
        $ipLocal = $_SERVER['REMOTE_ADDR'];
        $ipDB = $this->log['ip'];
        
        if ($ipLocal == $ipDB) {
            
        $id = $this->_getParam('id');    
        $db = new Application_Model_Faltas();
        $record = $db->findById($id)->toArray();
        
        $form = new Application_Form_Admin();
        $form->populate($record[0]);
        $this->view->form  = $form;
        $this->view->id = $id;
        
        /**
         * Files
         */
        $this->view->files = $db->retrieveFiles($id);
        
       } else {
            
            $this->_redirect("/index/authenticationfailure/");
        }
        
        
    }

    public function removeAction()
    {
        // action body
    }


}







