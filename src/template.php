<?php

class Template {

    function view($template, $variables) {

        extract($variables);

        include VIEW_PATH . 'layout/default.php';

        

    }
}