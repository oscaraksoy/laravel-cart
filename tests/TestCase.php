<?php

namespace Yab\ShoppingCart\Tests;

use App\Logistics\CartLogistics;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Yab\ShoppingCart\Tests\Logistics\CartLogisticsTest;

abstract class TestCase extends OrchestraTestCase
{
    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadMigrationsFrom(__DIR__ . '/Migrations');

        $this->withFactories(__DIR__ . '/Factories');

        app()->bind(CartLogistics::class, CartLogisticsTest::class);
    }

    /**
     * Load our custom service provider for test purposes.
     *
     * @param $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            'Yab\ShoppingCart\ShoppingCartServiceProvider',
            'Yab\ShoppingCart\Tests\ShoppingCartTestProvider',
        ];
    }
}
