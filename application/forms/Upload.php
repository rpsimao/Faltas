<?php

class Application_Form_Upload extends Zend_Form
{

    public function init()
    {
        $this->setMethod('POST');
        $this->setAttribs(array('id' => 'upload-file-form', 'enctype' => 'multipart/form-data'));
        $this->setAction('/process/upload');
        
        $file = new Zend_Form_Element_File('ficheiro');
        $file->setLabel('Carregar ficheiro:');
        $file->setDestination('/tmp');
        $file->setOptions(array('class' => 'input-small sp-left-5'));
        //$file->addValidator('extension', true, array('pdf','messages' => array(Zend_Validate_File_Extension::FALSE_EXTENSION => 'Só pode escolher ficheiros PDF.')));
        $file->setDecorators(array('File', array('Label', array('class' => 'control-label'), array('HtmlTag', array('tag' => 'div', 'class'=> 'control-group')))));
        $this->addElement($file, 'ficheiro');
        
        
        
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Enviar');
        $submit->setAttrib('class', 'btn btn-primary');
        //$submit->setDecorators(array('ViewHelper',array('HtmlTag', array('tag' => 'div', 'class'=> 'control-group sp-left-150 sp-top-15'))));
        $this->addElement($submit);
        
        
        $id = new Zend_Form_Element_Hidden('id');
        $this->addElement($id);
        
    }


}

