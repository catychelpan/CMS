<?php


class AboutUsPageController extends MainController {

        function defaultAction() {
      
            $dbh = DatabaseConnection::getInstance();
            $dbc = $dbh->getConnection();

            $pageObj = new Page($dbc);
            $pageObj->findById(2);

            $variables['pageObj'] = $pageObj;
    
            $template = new Template('default');
            $template->view('static-page', $variables);
        }
    

}