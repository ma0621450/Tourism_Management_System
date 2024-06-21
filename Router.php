<?php
class Router
{
    protected $routes = [];

    public function add($method, $uri, $controller, $middleware = null)
    {
        $this->routes[] = [
            'uri' => $uri,
            'method' => $method,
            'controller' => $controller,
            'middleware' => $middleware,
        ];

        return $this;
    }

    public function get($uri, $controller, $middleware = null)
    {
        return $this->add('GET', $uri, $controller, $middleware);
    }

    public function post($uri, $controller, $middleware = null)
    {
        return $this->add('POST', $uri, $controller, $middleware);
    }

    public function delete($uri, $controller, $middleware = null)
    {
        return $this->add('DELETE', $uri, $controller, $middleware);
    }

    public function put($uri, $controller, $middleware = null)
    {
        return $this->add('PUT', $uri, $controller, $middleware);
    }

    public function patch($uri, $controller, $middleware = null)
    {
        return $this->add('PATCH', $uri, $controller, $middleware);
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] == $uri && $route['method'] == strtoupper($method)) {
                if (isset($route['middleware'])) {
                    $middleware = $route['middleware'];
                    if (is_callable($middleware)) {
                        $middleware();
                    } else {

                        if (method_exists($this, $middleware)) {
                            $this->$middleware();
                        } else {

                            $this->abort(500);
                        }
                    }
                }
                return include $route['controller'];
            }
        }
        $this->abort();
    }

    protected function abort($code = 404)
    {
        http_response_code($code);
        include __DIR__ . "/app/views/errors/$code.php";
        die();
    }
}