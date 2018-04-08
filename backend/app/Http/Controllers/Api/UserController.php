<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use DB, Validate, Auth;
class UserController extends Controller
{
    protected $model;
    protected $table;
    protected $id_user;
    public function __construct(){

        $this->model = new User();
        $this->table = $this->model->getTable();
        $this->id_user = Auth::id();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->model->paginate(10);
       return $this->dataSuccess('Successful', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'username'  =>  'required|unique:users,username',
            'password'  =>  'required|min:8',
            'confirm'   =>  'required|same:password'  
        ];

        $messages = [
            'username.required'  =>  'Username is required',
            'password.required'  =>  'Password is required',
            'confirm.required'   =>  'Confirm is required',
            'username.unique'    =>  'Username is unique',
            'password.min'       =>  'Password min length = 8',
            'confirm.same'       =>  'Confirm wrong',

        ];

        $validator  = \Validator::make($request->all(), $rules, $messages);

        if( $validator->fails() ){

            // return redirect()->back()->withErrors($validator)->withInput();
            $dataErrors = [];
            $errors = $validator->errors()->toArray();
            if( $errors ){
                foreach ($errors as $key => $value) {
                    $dataErrors[$key] = implode(',', $value);
                }
            }
            return $this->dataErrors('Error', $dataErrors);

        }else{

            $this->model->create([
                'username'  => $request->username,
                'password'  => bcrypt($request->password)
            ]);

            return $this->dataSuccess('Successful', $this->model);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       
        $data = $this->model->find($this->id_user);
        return $this->dataSuccess('Successful', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules = [
            'username'  =>  'unique:users,username',
            'email'     =>  'unique:users,email'  
        ];

        $messages = [
            
            'username.unique'    =>  'Username is unique',
            'email.unique'       =>  'Email is unique',

        ];

        $validator  = \Validator::make($request->all(), $rules, $messages);

        if( $validator->fails() ){

            $dataErrors = [];
            $errors = $validator->errors()->toArray();
            if( $errors ){
                foreach ($errors as $key => $value) {
                    $dataErrors[$key] = implode(',', $value);
                }
            }
            return $this->dataErrors('Error', $dataErrors);

        }else{
            $id_user = Auth::id();
            $data = $this->model->find($id_user); 
            $data->username    = $request->username? $request->username : $data->username;
            $data->password    = $request->password? $request->password : $data->password;
            $data->email       = $request->email;
            $data->save();
            return $this->dataSuccess('Successful', new \stdClass);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id_user = Auth::id();
        $data = $this->model->find($id_user);
        if( empty($data) ){
            return $this->dataErrors('Error', new \stdClass);
        }else{
            $data->delete();
            return $this->dataSuccess('Successful', new \stdClass);
        }
    }

    public function changePassword(Request $request){
        $id_user = Auth::id();
    
        $validator = \Validator::make($request->all(), ['password' => 'required'],['password.required' => 'Password is required']);
        if($validator->fails()){
            $data_errors =[];
            $errors = $validator->errors()->toArray();
            if( $errors){
                foreach ($errors as $key => $value) {
                    $data_errors[$key] = implode(',', $value);
                } 
            }

            return $this->dataErrors('Error',$data_errors);
        }else{
            $data = $this->model->find($id_user);
            $data->password    = $request->password;
            $data->Save();
            return $this->dataSuccess('Successful', new \stdClass);
        }
    }









}
