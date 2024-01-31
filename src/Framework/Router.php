<?php

declare(strict_types=1);

namespace Framework;

/**
 * The job of the router is to control the content rendered on the page,based ob the URL
 * to determine which content to render.
 * Features: 1. location to store a list of routes
 *  2. method for registering new routes
 */
class Router
{
   private array $routes = [];


   /*
    *
    *This method is used to add routes
    *
    */
   public function add(string $method, string $path, array $controller)
   {

      $path = $this->normalizePath($path);
      $this->routes[] = [
         'path' => $path,
         'method' => strtoupper($method),
         'controller' => $controller
      ];
   }

   /**
    * Normalizing paths. The format of the path must be: /file
    *We make sure that the incoming URL has the correct format 
    */

   private function normalizePath(string $path): string
   {
      $path = trim($path, '/'); //Make sure that user did not insert '/' in the first place
      $path = "/{$path}/";
      $path = preg_replace('#[/]{2,}#', '/', $path);
      return $path;
   }


   /**
    * This method initiate the process of dispatching contents
    * It accept a URL path and a Http Method
    */
   public function dispatch(string $path, string $method,Container $container=null)
   {
      $path = $this->normalizePath($path);
      $method = strtoupper($method);


      foreach($this->routes as $route){
         if(!preg_match("#^{$route['path']}$#",$path)||
         $route['method']!==$method
         ){
           continue;
         }


         [$class,$function] = $route['controller'];

         $controllerInstance = $container ? 
         $container->resolve($class) : new $class;
         $controllerInstance->{$function}();
      }
   }
}
