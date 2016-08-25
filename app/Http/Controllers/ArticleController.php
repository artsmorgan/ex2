<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Article;
use App\Store;
use View;
use Validator;
use Input;
use Redirect;


class ArticleController extends Controller
{

    private function getStoreList(){
        $store = new Store();
        $rst = $store::all();
        $storeList = Array();
        foreach($rst as $k=>$v){
            $storeList[$v['id']] =  $v['name'];
        }

        return $storeList;
    }


    /**
     * Show the profile for the given user.
     *
     * @return Response
     */
    public function index()
    {
        $article = new Article();

        return view('articles.index')->with('articles', $article::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $storeList = $this->getStoreList();

        return View::make('articles.create')->with('storeList', $storeList);
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
            'description'    => 'required',
            'price'    => 'required',
            'total_in_shelf'    => 'required',
            'total_in_vault'    => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('store/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $article = new Article();
            $article->name       = Input::get('name');
            $article->description    = Input::get('description');
            $article->price    = Input::get('price');
            $article->total_in_shelf    = Input::get('total_in_shelf');
            $article->total_in_vault    = Input::get('total_in_vault');
            $article->store_id    = Input::get('store');
            $article->save();

            return Redirect::to('article');
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
        $article = new Article();
        $results = $article::find($id);
        $storeList = $this->getStoreList();

//        return View::make('articles.create')->with();

        // show the view and pass the nerd to it
        return View::make('articles.edit')
            ->with(['article'=> $results, 'storeList' => $storeList]);
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
            'description'    => 'required',
            'price'    => 'required',
            'total_in_shelf'    => 'required',
            'total_in_vault'    => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('store/' . $id . '/edit')
                ->withErrors($validator);
        } else {
            // store
            $article = new Store();
            $results = $store::find($id);
            $results->name       = Input::get('name');
            $results->description    = Input::get('description');
            $results->price    = Input::get('price');
            $results->total_in_shelf    = Input::get('total_in_shelf');
            $results->total_in_vault    = Input::get('total_in_vault');
            $results->store_id    = Input::get('store');
            $results->save();

            // redirect
            return Redirect::to('article');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function apiGet(){
        $article = new Article();
        $articleAll =  $article::all();
        $count = $article->count();
        return response()->json(['articles' => $articleAll, 'success' => true, 'total_elements'=>$count]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  string  $storeId
     * @return Response
     */
    public function apiGetArticles($storeId){

//        if(!is_int($storeId)){
//            return response()->json(['error_msg' => 'Bad Request', 'error_code' => 400, 'success'=>false]);
//        }

        $article = new Article();
        $articleAll =  $article::where('store_id', $storeId)->get();

        if($articleAll){
            $count = $articleAll->count();
            $response = ['articles' => json_encode($articleAll), 'success' => true, 'total_elements'=>$count];
        }else{
            $response = ['error_msg' => 'Record not Found', 'error_code' => 404, 'success'=>false];
        }

        return response()->json($response);
    }
}
