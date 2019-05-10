<?php

require_once BASE."/vendor/autoload.php";
require_once "Http/Request.php";
require_once "Routing/Route.php";

$route = new Route();

require_once BASE."/routes/web.php";

$route->run();