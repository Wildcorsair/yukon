<?php

namespace Yukon\Core\App;

use Yukon\Core\App\Router;

class Starter
{
    public function __construct()
    {
        // echo 'This is Main App<br>';
    }

    public function run()
    {
        $router = new Router();
    }
}