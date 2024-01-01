<?php


class PageController extends src\MainController {

    

        function defaultAction() {
      
            $dbh = src\DatabaseConnection::getInstance();
            $dbc = $dbh->getConnection();

            $page_obj = new Page($dbc);
            $page_obj->findBy('id', $this->entity_id);

            $variables['page_obj'] = $page_obj;
    
            
            $this->template->view('page/views/static-page', $variables);
        }

       
    

}