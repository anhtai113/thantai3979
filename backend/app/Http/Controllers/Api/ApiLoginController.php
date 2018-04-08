<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use DB, Validator;

class ApiLoginController extends Controller
{
     /**
     * @var object
     */
    private $client;
    protected $model;
    protected $table;

    /**
     * DefaultController constructor.
     */
    public function __construct()
    {
        $this->client = DB::table('oauth_clients')->where('id', 2)->first();
        $this->model  = new User();
        $this->table  = $this->model->getTable();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    protected function authenticate(Request $request)
    {
        

        $request->request->add([
            'username'      => $request->username,
            'password'      => $request->password,
            'grant_type'    => 'password',
            'client_id'     => $this->client->id,
            'client_secret' => $this->client->secret,
            'scope'         => '*'
        ]);

        $proxy = Request::create(
            'oauth/token',
            'POST'
        );

        return Route::dispatch($proxy);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    protected function refreshToken(Request $request)
    {
        $request->request->add([
            'grant_type'        => 'refresh_token',
            'refresh_token'     => $request->refresh_token,
            'client_id'         => $this->client->id,
            'client_secret'     => $this->client->secret,
        ]);

        $proxy = Request::create(
            '/oauth/token',
            'POST'
        );

        return Route::dispatch($proxy);
    }

    public function register(Request $request){

        
    }
}
