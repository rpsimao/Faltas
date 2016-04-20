<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function preDispatch()
    {
        if ($this->_helper->FlashMessenger->hasMessages()) {
            $this->view->messages = $this->_helper->FlashMessenger->getMessages();
        }
    }

    public function indexAction()
    {
        $this->view->form = new Application_Form_Pedido();
    }

    public function listagemAction()
    {
        $this->view->form = new Application_Form_LoginListagem();
    }

    public function authenticateAction()
    {
       
        if ($this->getRequest()->isPost())
        {
           $form = new Application_Form_LoginListagem();
        
            if ($form->isValid($_POST))
            {
              $passwd = $this->_request->getPost('password');

              $db = new Application_Model_Passwords();
              $auth = $db->authenticate($passwd);
              
              $sess = new Zend_Session_Namespace("faltas_auth");
              $log = $sess->login;
              
              if ($log['faltas'] == TRUE){
                  
                 $dbList = new Application_Model_Faltas();
                  
                  $this->view->records = $dbList->getAllRecords();
                  $this->view->admin   = $log['faltasadmin'];
                  
                  
              } else {
                  
                  $this->_redirect("/index/authenticationfailure");
              }
              
              
            } else {
                
                $this->view->errors = $form->getMessages();
                
            }
        }
    }

    public function authenticationfailureAction()
    {
        // action body
    }


}







