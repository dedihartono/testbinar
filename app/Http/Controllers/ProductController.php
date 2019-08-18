<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * index
     *
     * @param  mixed $request
     *
     * @return object
     */
    public function index(Request $request)
    {
        $prefix = $this->checkPrefix($request);

        return $this->getDataAll($prefix);
    }

    public function getDataAll($prefix)
    {
        switch ($prefix) {
            case 'v1':
                $response = $this->getDataV1();
                break;
            case 'v2':
                $response = $this->getDataV2();
                break;
        }
        return $response;
    }

    protected function getDataV1()
    {
        $model = Product::get();

        $data['status'] = 'OK';
        $data['result'] = $model;
        $data['errors'] = '';

        return response()->json($data);
    }

    protected function getDataV2()
    {
        $data['message'] = 'Hello there';

        return response()->json($data);
    }

    public function show($id)
    {
        $model = Product::find($id);
        $data['status'] = 'OK';
        $data['result'] = $model;
        $data['errors'] = '';

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $model = Product::create($request->all());
        $data['status'] = 'OK';
        $data['result'] = $model;
        $data['errors'] = '';
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $model = Product::find($id);
        $model->price = $request->input('price');
        $model->imageurl = $request->input('imageurl');
        $model->save();

        $data['status'] = 'OK';
        $data['result'] = $model;
        $data['errors'] = '';
        return response()->json($data);
    }

    public function delete($id)
    {
        $model = Product::find($id);
        $model->delete();

        $data['status'] = 'OK';
        $data['result'] = [ 'message' =>  $id. ' deleted' ];
        $data['errors'] = '';
        return response()->json($data);
    }



    /**
     * checkPrefix
     *
     * @param  mixed $request
     *
     * @return string
     */
    public function checkPrefix($request)
    {
        return $request->segment(1);
    }
}
