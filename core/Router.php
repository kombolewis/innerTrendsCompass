<?php
namespace Core;


class Router {
  protected array $routes = [];
  public Request $request;


  function __construct(Request $request) {
    $this->request = $request;
  }
  public function get(string $path, array $callback) {
    $this->routes['get'][$path] = $callback;
  }

  public function resolve() {
   $path = $this->request->getPath();
   $method = $this->request->getMethod();
   $callback = $this->routes[$method][$path] ?? false;
   if($callback === false) return 'NOT FOUND';


    //controller
    $controller = (isset($callback[0]) && $callback[0] != ''  ) ? ucwords($callback[0]) : DEFAULT_CONTROLLER;
    $controllerName = str_replace('Controller', '',  explode('\\',$controller)[2]);
    array_shift($callback);

    //action
    $action = (isset($callback[0]) && $callback[0] != ''  ) ? $callback[0]  : 'index';
    $actionName = (isset($callback[0]) && $callback[0] != ''  ) ? $callback[0]  : 'index';
    array_shift($callback);


    $queryParams = $callback;

    $dispatch = new $controller($controllerName, $action);


    if(method_exists($controller, $action)){
      return call_user_func_array([$dispatch, $action], $queryParams);
    } else {
      die('That method does not exist in the controller \"' .$controllerName. '\"');
    }

  }

}