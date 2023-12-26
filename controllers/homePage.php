<?php

class HomePageController extends MainController {
    function defaultAction() {
      
        $variables['title'] = 'Home page title';
        $variables['content'] = 'Welcome to our Home Page';

        $template = new Template('default');
        $template->view('static-page', $variables);
    }
}