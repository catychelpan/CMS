<?php


class AboutUsController extends MainController {

        function defaultAction() {
      
            $variables['title'] = 'About Us page title';
            $variables['content'] = 'Welcome to our About Us Page';
    
            $template = new Template('default');
            $template->view('static-page', $variables);
        }
    

}