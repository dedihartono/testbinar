<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use App\Http\Controllers\ProductController;

class ProductTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    public function testExample()
    {
        $this->get('/');

        $input['status'] = 'OK';
        $input['result'] = 'Welcome to Binar Test';
        $input['errors'] = null;

        $expect = json_encode($input);
        $output = $this->response->getContent();

        $this->assertEquals($expect, $output);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    // public function testShowProduct()
    // {
    //     $this->get('/v2/products');
    //     $input['message'] = 'Hello there';
    //     $expect = json_encode($input);
    //     $output = $this->response->getContent();
    //     $this->assertEquals($expect, $output);
    //     unset($input);

    //     $data = factory('App\Product')->create();
    //     $this->get('/v1/products');
    //     $output = $this->response->getContent();
    //     $input['status'] = 'OK';
    //     $input['result'][] = $data->getAttributes();
    //     $input['errors'] = [];

    //     $expect = json_encode($input);
    //     $this->assertEquals($expect, $output);
    // }

    public function testGetDataV1()
    {
        $data = factory('App\Product')->create();
        $prefix = 'v1';
        $controller = new ProductController;
        $output = $controller->getDataAll($prefix);
        $output = $output->getContent();

        $input['status'] = 'OK';
        $input['result'][] = $data->getAttributes();
        $input['errors'] = [];

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

    // public function testCreate()
    // {
    //     $input = factory('App\Product')->create();

    //     $data = [
    //         'price' => $input->price,
    //         'imageurl' => $input->imageurl
    //     ];

    //     $this->post('/v1/products/', $data);
    //     $output = $this->response->getContent();

    //     $database = \App\Product::first();

    //     $response['status'] = 'OK';
    //     $response['result'] = $database->getAttributes();
    //     $response['errors'] = '';


    //     $expect = json_encode($response);
    //     $this->assertEquals($expect, $output);
    // }

    // public function testShow()
    // {
    //     $user = \App\User::create([
    //         'name'=>'bot',
    //         'email'=>'bot@example.com',
    //         'password'=> password_hash('bot', PASSWORD_BCRYPT)
    //     ]);

    //     $input = [
    //         'email' => $user->email,
    //         'password' => 'bot'
    //     ];
    //     $response = $this->post('/auth/login', $input);
    //     $response = $this->response->getContent();
    //     $auth = json_decode($response);
    //     $header = [
    //         'Authorization' => $auth
    //     ];

    //     $data = factory('App\Product')->create();
    //     $this->get('/v1/products/'.$data->id, [ 'Authorization' => $auth  ]);

    //     $output = $this->response->getContent();
    //     $input['status'] = 'OK';
    //     $input['result'] = $data->getAttributes();
    //     $input['errors'] = [];

    //     $expect = json_encode($input);
    //     $this->assertEquals($expect, $output);
    // }

    // public function testUpdate()
    // {
    //     $data = factory('App\Product')->create();
    //     $this->put('/v1/products/'.$data->id);
    //     $output = $this->response->getContent();
    //     $input['status'] = 'OK';
    //     $input['result'] = [ 'message' => $data->id . ' deleted' ];
    //     $input['errors'] = [];

    //     $expect = json_encode($input);
    //     $this->assertEquals($expect, $output);
    // }

    // public function testDelete()
    // {
    //     $data = factory('App\Product')->create();
    //     $this->delete('/v1/products/'.$data->id);
    //     $output = $this->response->getContent();
    //     $input['status'] = 'OK';
    //     $input['result'] = [ 'message' => $data->id . ' deleted' ];
    //     $input['errors'] = [];

    //     $expect = json_encode($input);
    //     $this->assertEquals($expect, $output);
    // }
}
