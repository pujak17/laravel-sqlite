<?php

namespace App\Http\Controllers;
use App\Models\User;
use Response;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function list($id = null){
        try{
            if($id) {
                $user = User::where('id', $id)->get();
                if($user == "[]") {
                    abort(404);
                
                } else {
                return Response::json(array('user' => $user));
                }
            } else {
                $users = User::all();
                return Response::json(array('users' => $users));
            }
        } catch (Throwable $e) {
        abort(404);
    }
}


    // public function __construct()
    // {
    // $this->PDO = DB::connection()->getPdo();
    // }
    // public function index()
    // {
    // $QUERY = $this->PDO->prepare(“SELECT DISTINCT * FROM user”);
    // $QUERY->execute();
    // $user = $QUERY->fetchAll(\PDO::FETCH_OBJ);
}
