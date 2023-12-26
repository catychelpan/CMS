<?php

class HomePageController extends MainController {
    function defaultAction() {
      
        $variables['title'] = 'Home page title';
        $variables['content'] = 'Welcome to our Home Page';

        $template = new Template();
        $template->view('static-page', $variables);
    }
}