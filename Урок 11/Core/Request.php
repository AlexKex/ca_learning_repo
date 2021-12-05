<?php

namespace PrincessManny\Core;


class Request 
{

    private $controller = "DefaultController";
    private $method = "index";

    public function __construct() 
    {
        $uri = array_diff(explode('/', $_SERVER['REQUEST_URI']), ['']);        

        if (isset($uri[1])) {
            $this->controller = $uri[1];
        }

        if (isset($uri[2])) {
            $this->method = $uri[2];
        }

        if (!$this-> validateCommand()) {
            die ("Дальнейшая работа невозможна");
        }
        
    }

    private function validateCommand(): bool 
    {
        if(!class_exists("PrincessManny\Controller\\" . ucfirst($this->controller) . "Controller")) {
            echo "Контроллер $this->controller не существует <br>";
            return false;
        }

        if(!method_exists("PrincessManny\Controller\\" . ucfirst($this->controller) . "Controller", $this->method)) {
            echo "Метод не существует <br>";
            return false;
        }

        return true;
    }

    public function getController()
    {
        return "PrincessManny\Controller\\" . ucfirst($this->controller) . "Controller";
    }

    public function getMethod()
    {
        return $this->method;
    }
}