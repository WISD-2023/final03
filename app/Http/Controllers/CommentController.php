<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;

class CommentController extends Controller
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
        //儲存留言內容資料
        // // 在這裡加入相關的驗證邏輯，例如檢查是否為會員等

        // // 儲存評論內容資料
        // Comment::create([
        //     'product_id' => $product->id,
        //     'user_id' => auth()->user()->id, // 假設使用身份驗證，這樣可以得到當前登入的會員 ID
        //     'content' => $request->input('content'),
        //     'like_count' => $request->input('like_count'),
        //     // 其他欄位...
        // ]);

        // // 顯示評論成功訊息，這裡使用 Laravel 的 with 方法，需要在相應的 view 中顯示
        // return redirect()->route('products.show', ['product' => $product])->with('success', '評論成功');
        return view('products.show');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
