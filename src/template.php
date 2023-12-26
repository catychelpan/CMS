<?php

class Template {

    function view($template, $variables) {

        extract($variables);

        include 'views/layout/default.php';

        

    }
}