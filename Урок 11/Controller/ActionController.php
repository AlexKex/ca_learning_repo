<?php

namespace PrincessManny\Controller;

use PrincessManny\Model\User;
use PrincessManny\Core\View;

class ActionController
{
    public function index() {
        echo "Hello";
    }

    public function main() {
        
        $template = View::render("main", ["title" => "Главная страница"]);
        echo $template;
    }

    public function contacts() {
        
        $template = View::render("contacts", ["title" => "Контакты"]);
        echo $template;
    }

    public function about() {
        
        $template = View::render("about", ["title" => "О нас"]);
        echo $template;
    }
}