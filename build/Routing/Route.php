<?php


use Rifus\Http\Request;

class Route {

    private $dataRoute;
    private $url;
    private $request;

    public function __construct() {
        $this->dataRoute = [];
        $this->request = new Request;
    }

    public function __call($method, $args) {
        $this->dataRoute[] = ['method' => $method, 'args' => $args];
    }

    public function run() {
        
        $this->validate();

    }

    public function formatedUrl($url) {
        
        $url = rtrim($url, '/');
        $url = ltrim($url, '/');
        $url = '/'.$url;

        return $url;
    } 

    public function validate(){

        $url = $this->formatedUrl($this->request->request_uri);
        $libUrl = explode('/', $url);
        // print_r($libUrl);

        foreach($this->dataRoute as $route) {
            
            $routeUrl = $this->formatedUrl($route['args'][0]);
            $libRoute = explode('/', $routeUrl);

            $getRoute = '';

            if ((int)count($libUrl) === (int)count($libRoute)) {
                
                for($i=1;$i < count($libUrl);$i++) {
                    
                    if($libUrl[$i] === $libRoute[$i]) {
                        $getRoute .= '/'.$libRoute[$i];
                    }   

                }

                
            } 

            echo $getRoute;
        }

    }

    public function notFound() {

        foreach($this->dataRoute as $route) {
            $routes[] = $route['args'][0];
        }

        print_r($routes);
    }
}