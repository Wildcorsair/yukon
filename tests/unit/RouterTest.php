<?php

use \PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{

    /**
     * @test
     */
    public function is_route_controller_returns_routes_array()
    {
        define('ROOT', __DIR__ . '/..');
        $router = new Yukon\Core\App\RouterController();

        $this->assertInstanceOf(Yukon\Core\App\RouterController::class, $router);
        $this->assertEquals(
            gettype(Yukon\Core\App\RouterController::$routes),
            "array"
        );
    }

    /**
     * @test
     */
    public function is_route_controller_has_routes()
    {
        $this->assertClassHasStaticAttribute(
            'routes',
            Yukon\Core\App\RouterController::class
        );
    }
}
