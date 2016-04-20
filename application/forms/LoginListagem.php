<?php

class Application_Form_LoginListagem extends Zend_Form
{

    public function init()
    {
       $this->setAction("/index/authenticate/");
       $this->setMethod("POST");
       
              
       $password = new Zend_Form_Element_Password('password');
       $password->setLabel('Password:');
       $password->setRequired(TRUE);
       $password->setAttribs(array('placeholder' => "Insira a sua password"));
       $password->addValidators(array(new Zend_Validate_Int()));
       $this->addElement($password);
       
       $submit = new Zend_Form_Element_Submit('submit');
       $submit->setLabel('Enviar');
       $submit->setAttrib('class', 'btn btn-primary');
       $this->addElement($submit);
    }


}

