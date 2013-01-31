<?php

class Application_Form_Contact extends Zend_Form 
{
    
    public function init(){
        // set the defaults
        $this->setMethod(Zend_Form::METHOD_POST);
        $this->setAttrib('enctype', Zend_Form::ENCTYPE_MULTIPART);
        
        
        // element firstName
        $this->addElement(new Zend_Form_Element_Text('firstName',array(
            'label' => 'Voornaam',
            'required' => true,
            // filters de invoer
            'filters' => array('StringTrim')
        )));
        
        // element lastName
        $this->addElement(new Zend_Form_Element_Text('lastName',array(
            'label' => 'Naam',
            'required' => true,
            // filters de invoer
            'filters' => array('StringTrim')
        )));
        
        // element address
        $this->addElement(new Zend_Form_Element_Text('address',array(
            'label' => 'Adres',
            'required' => true,
            'class'  => 'testje',
            // filters de invoer
            'filters' => array('StringTrim'),
            'validators' => array(
                array('StringLength', true, array('max' => 255))
                )
        )));
        
        // element email
        $this->addElement(new Zend_Form_Element_Text('email',array(
            'label' => 'E-mail',
            'required' => true,
            // filters de invoer
            'filters' => array('StringTrim'),
            'validators' => array(
                array('StringLength', true, array('max' => 100)),
                array('EmailAddress')
            )
        )));
        
        // element description
        $this->addElement(new Zend_Form_Element_Textarea('description',array(
            'label' => 'Description',
            'required' => true,
            // filters de invoer
            'filters' => array('StringTrim', 'StripTags'),
            'validators' => array()
        )));
        
        // element button
        $this->addElement(new Zend_Form_Element_Button('Versturen',array(
            'type'      => 'submit',
            'value'     => 'Mailen!',
            'required'  => false,
            'ignore'    => true
            
        )));
        
        
        
        /*
        $btn = new Zend_Form_Element_Button();
        $btn->setLabel('Versturen')->setRequired(false);
         * 
         */
  
    }
    
    
    
}

?>
