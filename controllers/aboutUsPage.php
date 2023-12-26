<?php


class AboutUsController extends MainController {

        function defaultAction() {
      
            $variables['title'] = 'About Us page title';
            $variables['content'] = 'Welcome to our About Us Page';
    
            $template = new Template();
            $template->view('static-page', $variables);
        }
    

}