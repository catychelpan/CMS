<?php


class PageController extends MainController {

    

        function defaultAction() {
      
            $dbh = DatabaseConnection::getInstance();
            $dbc = $dbh->getConnection();

            $pageObj = new Page($dbc);
            $pageObj->findBy('id', $this->entity_id);

            $variables['pageObj'] = $pageObj;
    
            $template = new Template('default');
            $template->view('static-page', $variables);
        }

       
    

}