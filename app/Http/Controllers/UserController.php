<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
class UserController extends Controller
{
    public function index(){
       $users =  User::all();
        return response()->JSON($users);
    }
    public function delete($id){
        // نحاول نجيب المستخدم بناءً على الـ id
        $user = User::find($id);

        // لو المستخدم مش موجود
        if (!$user) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }

        // نحذف المستخدم
        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);

    }
    public function show($id){
        $user = User::find($id);
        return $user;
    }
}
