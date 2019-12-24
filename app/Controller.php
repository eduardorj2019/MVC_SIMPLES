<?php

namespace app;

abstract class Controller
{
    public function loadTemplate($viewName, $viewData = array())
    {
        require 'Views/template.php'; 
    }

    public function loadViewInTemplate($viewName, $viewData = array())
    {
        extract($viewData);
        require 'Views/'.$viewName.'.php'; 
    }
}