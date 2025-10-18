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
    public function show($id){
        $user = User::find($id);
        return $user;
    }
    public function store(Request $request)
    {
        // ✅ تحقق من البيانات
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // ✅ إنشاء user جديد
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        // ✅ رجّع استجابة JSON
        return response()->json([
            'message' => 'User created successfully!',
            'user' => $user,
        ], 201);
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
        return response()->json(['message' => 'User deleted successfully'], 200);    
    }
}
