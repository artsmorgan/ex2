<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Store;
use View;
use Validator;
use Input;
use Redirect;

class StoreController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @return Response
     */
    public function index()
    {
        $store = new Store();

        return view('welcome')->with('stores', $store::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // load the create form (app/views/nerds/create.blade.php)
        return View::make('stores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            'address'    => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('store/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $store = new Store();
            $store->name       = Input::get('name');
            $store->address    = Input::get('address');
            $store->save();


            return Redirect::to('store');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        // get the nerd
        $store = new Store();
        $results = $store::find($id);

        // show the view and pass the nerd to it
        return View::make('stores.edit')
            ->with('store', $results);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            'address'      => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('store/' . $id . '/edit')
                ->withErrors($validator);
        } else {
            // store
            $store = new Store();
            $results = $store::find($id);
            $results->name       = Input::get('name');
            $results->address      = Input::get('address');
            $results->save();

            // redirect
            return Redirect::to('store');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function apiGet(){
        $store = new Store();
        $storeAll =  $store::all();
        $count = $storeAll->count();
        return response()->json(['stores' => $storeAll, 'success' => true, 'total_elements'=>$count]);
    }
}
