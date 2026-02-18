<?php

declare(strict_types=1);

namespace Core;

use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;
use Illuminate\Http\Request;
use Illuminate\Routing\CallableDispatcher;
use Illuminate\Routing\Contracts\CallableDispatcher as CallableDispatcherContract;

class Router
{
    private Container $container;
    private Dispatcher $events;
    private \Illuminate\Routing\Router $router;

    public function __construct(?Container $container = null)
    {
        $this->container = $container ?? new Container();

        $this->container->bind(CallableDispatcherContract::class, function ($container) {
            return new CallableDispatcher($container);
        });

        $this->events = new Dispatcher($this->container);
        $this->router = new \Illuminate\Routing\Router($this->events, $this->container);
    }

    public function get(string $uri, callable|array|string $action): \Illuminate\Routing\Route
    {
        return $this->router->get($uri, $action);
    }

    public function post(string $uri, callable|array|string $action): \Illuminate\Routing\Route
    {
        return $this->router->post($uri, $action);
    }

    public function put(string $uri, callable|array|string $action): \Illuminate\Routing\Route
    {
        return $this->router->put($uri, $action);
    }

    public function patch(string $uri, callable|array|string $action): \Illuminate\Routing\Route
    {
        return $this->router->patch($uri, $action);
    }

    public function delete(string $uri, callable|array|string $action): \Illuminate\Routing\Route
    {
        return $this->router->delete($uri, $action);
    }

    public function options(string $uri, callable|array|string $action): \Illuminate\Routing\Route
    {
        return $this->router->options($uri, $action);
    }

    public function any(string $uri, callable|array|string $action): \Illuminate\Routing\Route
    {
        return $this->router->any($uri, $action);
    }

    public function match(array $methods, string $uri, callable|array|string $action): \Illuminate\Routing\Route
    {
        return $this->router->match($methods, $uri, $action);
    }

    public function group(array $attributes, callable $routes): void
    {
        $this->router->group($attributes, $routes);
    }

    public function resource(string $name, string $controller, array $options = []): \Illuminate\Routing\PendingResourceRegistration
    {
        return $this->router->resource($name, $controller, $options);
    }

    public function dispatch(?Request $request = null): \Symfony\Component\HttpFoundation\Response
    {
        $request = $request ?? Request::capture();
        return $this->router->dispatch($request);
    }

    public function run(?Request $request = null): void
    {
        $this->dispatch($request)->send();
    }

    public function getContainer(): Container
    {
        return $this->container;
    }

    public function getNativeRouter(): \Illuminate\Routing\Router
    {
        return $this->router;
    }
}
