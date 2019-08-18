<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
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

}
