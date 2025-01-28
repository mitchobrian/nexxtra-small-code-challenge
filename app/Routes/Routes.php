<?php

namespace App\Routes;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

class Routes
{

    public static function initRoutes()
    {

        $routes = new RouteCollection();
        $routes->add('home', new Route('/', [
            '_controller' => function (Request $request) {
                // Load the content of the home.php view
                ob_start();
                include __DIR__ . '/../View/Home.php';
                $content = ob_get_clean();

                // Return the content as a Response object
                return new Response($content);
            }
        ]));

        $routes->add('rooms', new Route('/rooms', [
            '_controller' => function (Request $request) {
                // Load the content of the home.php view
                ob_start();
                include __DIR__ . '/../View/Rooms.php';
                $content = ob_get_clean();

                // Return the content as a Response object
                return new Response($content);
            }
        ]));

        $routes->add('room', new Route('/room', [
            '_controller' => function (Request $request) {
                // Load the content of the home.php view
                ob_start();
                include __DIR__ . '/../View/Room.php';
                $content = ob_get_clean();

                // Return the content as a Response object
                return new Response($content);
            }
        ]));

        $request = Request::createFromGlobals();
        $context = new RequestContext();
        $context->fromRequest($request);
        $matcher = new UrlMatcher($routes, $context);

        try {
            $parameters = $matcher->match($request->getPathInfo());
            $response = $parameters['_controller']($request);
        } catch (\Exception $e) {
            $response = new Response('Page not found.', Response::HTTP_NOT_FOUND);
        }

        $response->send();
    }

}
