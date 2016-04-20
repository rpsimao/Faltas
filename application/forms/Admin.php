<?php

class Application_Form_Admin extends Zend_Form
{

    public function init()
    {
        $this->setMethod('POST');
        $this->setAttribs(array('id' => 'pedido-falta-form', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data'));
        $this->setAction('/process/update');
        $this->setDecorators(array('FormElements', 'Form'));
        $decorators = array(array('ViewHelper'), array('Errors'), array('Label', array('class'=>"control-label")), array('HtmlTag', array('tag' => 'div', 'class'=> 'control-group')));
        
        
        $num = new Zend_Form_Element_Text('num');
        $num->setLabel('Nº: ');
        $num->setRequired(TRUE);
        $num->setValidators(array(new Zend_Validate_Int()));
        $num->setAttribs(array('onblur' => 'nameOptimus()'));
        $num->setOptions(array('class' => 'input-mini sp-left-5'));
        $num->setDecorators($decorators);
        $this->addElement($num);
        
        $nome = new Zend_Form_Element_Text('nome');
        $nome->setLabel('Nome:');
        $nome->setRequired(TRUE);
        $nome->setOptions(array('class' => 'input-large sp-left-5'));
        $nome->setDecorators($decorators);
        $this->addElement($nome);
        
        $seccao = new Zend_Form_Element_Select('seccao');
        $seccao->setLabel('Secção:');
        $seccao->setRequired(TRUE);
        $seccao->addMultiOptions(array("" =>'Escolha a secção:',
                "Pré-impressão"   => 'Pré-impressão',
                'Impressão'       => 'Impressão',
                'Acab. Marketing' => 'Acab. Marketing',
                'Acab. Embalagem' => 'Acab. Embalagem',
                'Escritórios'     => 'Escritórios'
        ));
        $seccao->setOptions(array('class' => 'input-medium  sp-left-5'));
        $seccao->setDecorators($decorators);
        $this->addElement($seccao);
        
        $date = new Zend_Form_Element_Text('data_inicio');
        $date->setRequired(TRUE);
        $date->setLabel('Dia de Falta: ');
        $date->setValidators(array(new Zend_Validate_Date()));
        $date->setOptions(array('class' => 'input-medium sp-left-5'));
        $date->setDecorators($decorators);
        $this->addElement($date);
        
        $horas = new Zend_Form_Element_Text('horas');
        $horas->setLabel('Horas: ');
        $horas->setOptions(array('class' => 'input-small sp-left-5'));
        $horas->setDecorators($decorators);
        $this->addElement($horas);
        
        
        $date1 = new Zend_Form_Element_Text('data_fim');
        $date1->setLabel('Até: ');
        $date1->setValidators(array(new Zend_Validate_Date()));
        $date1->setOptions(array('class' => 'input-medium sp-left-5'));
        $date1->setDecorators($decorators);
        $this->addElement($date1);
        
        
        $motivo = new Zend_Form_Element_Textarea('motivo');
        $motivo->setLabel('Motivo:');
        $motivo->setRequired(TRUE);
        $motivo->setOptions(array('class' => 'sp-left-5', 'rows'=>"10"));
        $motivo->setDecorators($decorators);
        $this->addElement($motivo);
        
        $date2 = new Zend_Form_Element_Text('data_abertura');
        $date2->setRequired(TRUE);
        $date2->setLabel('Carnaxide: ');
        $date2->setValidators(array(new Zend_Validate_Date()));
        $date2->setOptions(array('class' => 'input-medium sp-left-5'));
        $date2->setDecorators($decorators);
        $this->addElement($date2);

        
        $file = new Zend_Form_Element_File('ficheiro');
        $file->setLabel('Justificação:');
        $file->setDestination('/tmp');
        $file->setOptions(array('class' => 'input-medium sp-left-5'));
        //$file->addValidator('extension', true, array('pdf','messages' => array(Zend_Validate_File_Extension::FALSE_EXTENSION => 'Só pode escolher ficheiros PDF.'))); 
        $file->setDecorators(array('File', array('Label', array('class' => 'control-label'), array('HtmlTag', array('tag' => 'div', 'class'=> 'control-group')))));
        $this->addElement($file, 'ficheiro');
        
        $id = new Zend_Form_Element_Hidden('id');
        $this->addElement($id);
        
        $just = new Zend_Form_Element_Checkbox("justificada");
        $just->setLabel("Justificada:");
        $this->addElement($just);
        
        $injust = new Zend_Form_Element_Checkbox("injustificada");
        $injust->setLabel("Justificada:");
        $this->addElement($injust);
        
        $justTxt = new Zend_Form_Element_Text('justificada_txt');
        $justTxt->setOptions(array('class' => 'input-xxlarge sp-left-5'));
        $justTxt->setDecorators($decorators);
        $this->addElement($justTxt);
        
        $inJustTxt = new Zend_Form_Element_Text('injustificada_txt');
        $inJustTxt->setOptions(array('class' => 'input-xxlarge sp-left-5'));
        $inJustTxt->setDecorators($decorators);
        $this->addElement($inJustTxt);
        
        $dataAdmin = new Zend_Form_Element_Text('data_admin');
        $dataAdmin->setOptions(array('class' => 'input-medium'));
        $dataAdmin->setDecorators($decorators);
        $this->addElement($dataAdmin);
        
        $adminAss = new Zend_Form_Element_Text('adminAss');
        $adminAss->setOptions(array('class' => 'sp-left-5'));
        $adminAss->setDecorators($decorators);
        $this->addElement($adminAss);
        
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Enviar');
        $submit->setAttrib('class', 'btn btn-primary');
        $submit->setDecorators(array('ViewHelper',array('HtmlTag', array('tag' => 'div', 'class'=> 'control-group sp-left-150 sp-top-15'))));
        $this->addElement($submit);
        
    }


}

