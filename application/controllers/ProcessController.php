<?php

class ProcessController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        
        $form = new Application_Form_Pedido();
        $request = $this->getRequest();
        $fileCheck = null;
        
        
        $this->view->form = $form;
        if ($request->isPost())
        {
            $adapter = new Zend_File_Transfer_Adapter_Http();

            if ($form->isValid($_POST))
            {
                
                          
                $adapter->addValidator('extension', true, array('pdf','messages' => array(Zend_Validate_File_Extension::FALSE_EXTENSION => 'Só pode escolher ficheiros PDF.'))); 
                $adapter->setDestination('/var/www/repo/faltas');
                $files = $adapter->getFileInfo();
                
                foreach($files as $fieldname => $fileinfo)
                {
                    if (($adapter->isUploaded($fileinfo["name"])) && ($adapter->isValid($fileinfo['name'])))
                        {
                            $extension = substr($fileinfo['name'], strrpos($fileinfo['name'], '.') + 1);
                            
                            $filename = $this->_request->getPost('num')."-".$this->_request->getPost('data_abertura')."_".uniqid().".".$extension;
                            
                            $adapter->addFilter('Rename',array('target'=>'/var/www/repo/faltas/'.$filename,'overwrite' => true));
                            
                            $adapter->receive($fileinfo["name"]);
                            
                            $fileCheck = 1;
                            
                        }
                }
                
                $db = new Application_Model_Faltas();
                
                if ($fileCheck == 1) {
                   $values = array_merge($form->getValues(), array('file_name' => $filename));
                   $db->insertData($values);
                } else {
                   $db->insertData($form->getValues());
                    
                }
               
                $this->view->adapterErrors = $adapter->getMessages();
               // Zend_Debug::dump($adapter->getFileInfo());
               
                
                
            } else {
            
               $this->view->errors = $form->getMessages();
               $this->view->adapterErrors = $adapter->getMessages();
            }
            
        }
    }

    public function uploadAction()
    {
        // action body
    }

    public function updateAction()
    {
     $form = new Application_Form_Admin();
        $request = $this->getRequest();
        $fileCheck = null;
        
        
        $this->view->form = $form;
        if ($request->isPost())
        {
            $adapter = new Zend_File_Transfer_Adapter_Http();

            if ($form->isValid($_POST))
            {
                
                          
                $adapter->addValidator('extension', true, array('pdf','messages' => array(Zend_Validate_File_Extension::FALSE_EXTENSION => 'Só pode escolher ficheiros PDF.'))); 
                $adapter->setDestination('/var/www/repo/faltas');
                $files = $adapter->getFileInfo();
                
                foreach($files as $fieldname => $fileinfo)
                {
                    if (($adapter->isUploaded($fileinfo["name"])) && ($adapter->isValid($fileinfo['name'])))
                        {
                            $extension = substr($fileinfo['name'], strrpos($fileinfo['name'], '.') + 1);
                            
                            $filename = $this->_request->getPost('num')."-".$this->_request->getPost('data_abertura')."_".uniqid().".".$extension;
                            
                            $adapter->addFilter('Rename',array('target'=>'/var/www/repo/faltas/'.$filename,'overwrite' => true));
                            
                            $adapter->receive($fileinfo["name"]);
                            
                            $fileCheck = 1;
                            
                        }
                }
                
                $db = new Application_Model_Faltas();
                
                if ($fileCheck == 1) {
                   $values = array_merge($form->getValues(), array('file_name' => $filename));
                   $db->insertData($values);
                } else {
                   $db->insertData($form->getValues());
                    
                }
               
                $this->view->adapterErrors = $adapter->getMessages();
               // Zend_Debug::dump($adapter->getFileInfo());
               
                
                
            } else {
            
               $this->view->errors = $form->getMessages();
               $this->view->adapterErrors = $adapter->getMessages();
            }
            
        }
    }


}



