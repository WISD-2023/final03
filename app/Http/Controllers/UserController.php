<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function seller_update(User $user)
    {
        // 可以在這裡加入相關的邏輯，例如檢查是否已經是賣家等
        // dd($user);

        // $user id 插入到 seller table 的 user_id 欄位 其他的則為 $data 內的資料
        $user->seller()->create([
            'user_id' => $user,
            'merchant' => "MS151149294",
            'secret_key' => "p8hfQaNqqtD1e8hmo8uE0ShNPqshLUYq",
            'secret_iv' => "CJRH9d4TxO59bO0P",
        ]);

        return redirect()->route('users.profile.edit')->with('status', 'users-updated');
    }
}
