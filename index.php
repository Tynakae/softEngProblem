<?php

    require_once './router/Router.php';
    require_once './router/Request.php';

$router = new Router(new Request);

$router->get(
    "/ip",
    function ($request) {

        return $request->getBody();
    }
);


$router->post(
    "/ip",
    function ($request) {

        // return json_encode($request->getBody());
        return $request->getBody();
    }
);

?>
