<?php

class ContactController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $form = new Application_Form_Contact();
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) { // $_SERVER['REQUEST_METHOD'] == 'post'
           $postParams = $this->getRequest()->getPost(); // alle $_POST
            // controle of alle velden correct zijn volgens de validator
           if ($this->view->form->isValid($postParams)){
               // verstuur de mail
               $params = $this->view->form->getValues();
               
               $body = "Hallo, dit is een mail";
               $body .= "Voornaam " . $params['firstName'] . "<br />";
               $body .= "E-mail " . $params['email'] . "<br />";
               $body .= "Adres " . $params['address'] . "<br />";
               $body .= "Omschrijving " . $params['description'] . "<br />";
               //$body = nl2br($body);
               
               /*$configSMTP = array(  
                   'port' => 587,  
                   'auth' => 'login',  
                   'username' => '***',  
                   'password' => '***'  
               );*/
               
               
               //$transport = new Zend_Mail_Transport_Smtp('smtp.telenet.be',$configSMTP);
               $transport = new Zend_Mail_Transport_Smtp('uit.telenet.be');
               
               $mail = new Zend_Mail();
               $mail->addTo('xavier@dx-solutions.be');
               //$mail->addCc('cc@example.com');
               //$mail->addBcc('bcc@example.com');
               $mail->setSubject('Dit is een testmail ... ');
               $mail->setBodyHtml($body);
               $mail->setBodyText('Kan je deze mail niet lezen? Lees hem online ... dus hier http://www....');
               $mail->setFrom($params['email']);
               
               $mail->send($transport);
               
               echo "Uw mail werd verzonden!";
               
               
               
               
               
           } 
           
           //$this->view->form->populate($postParams);
           
           
        }
        
    }


}

