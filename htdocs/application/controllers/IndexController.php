<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
       //$this->_helper->layout->disableLayout();
       $this->view->naam = "Xavier";
    }

    public function productenAction()
    {
        $this->view->test = "testje";
    }

    public function sitemapAction()
    {
        // action body
    }


}





