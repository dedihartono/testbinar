<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use App\Http\Controllers\ProductController;

class ProductTest extends TestCase
{


    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testShowProduct()
    {
        $this->get('/v2/products');
        $input['message'] = 'Hello there';
        $expect = json_encode($input);
        $output = $this->response->getContent();
        $this->assertEquals($expect, $output);
        unset($input);

        $data = factory('App\Product')->create();
        $this->get('/v1/products');
        $output = $this->response->getContent();
        $input['status'] = 'OK';
        $input['result'][] = $data->getAttributes();
        $input['errors'] = '';

        $expect = json_encode($input);
        $this->assertEquals($expect, $output);
    }

    public function testGetDataV1()
    {
        $data = factory('App\Product')->create();
        $prefix = 'v1';
        $controller = new ProductController;
        $output = $controller->getDataAll($prefix);
        $output = $output->getContent();

        $input['status'] = 'OK';
        $input['result'][] = $data->getAttributes();
        $input['errors'] = '';

        $expect = json_encode($input);
        $this->assertEquals($expect, $output);
    }

    public function testGetDataV2()
    {
        $prefix = 'v2';
        $controller = new ProductController;
        $output = $controller->getDataAll($prefix);
        $output = $output->getContent();

        $input['message'] = 'Hello there';
        $expect = json_encode($input);
        $this->assertEquals($expect, $output);
    }
}
