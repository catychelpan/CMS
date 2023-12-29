<?php


class PageController extends MainController {

    

        function defaultAction() {
      
            $dbh = DatabaseConnection::getInstance();
            $dbc = $dbh->getConnection();

            $page_obj = new Page($dbc);
            $page_obj->findBy('id', $this->entity_id);

            $variables['pageObj'] = $page_obj;
    
            $template = new Template('default');
            $template->view('page/views/static-page', $variables);
        }

       
    

}