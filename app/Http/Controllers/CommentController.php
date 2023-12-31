<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product)
    {
		$this->authorize('update', $product);
		
        $data = [
            'product_name' => $product->name,
            'comments' => $product->comments()->get()
        ];

        return view('sellers.products.comments', $data);
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
    public function store(StoreCommentRequest $request, Product $product)
    {
        // dd($product);
        $canLeaveComment = false;
        $ordersCount = 0;
        $commentsCount = 0;

        foreach($product->orderDetails()->get() as $orderDetail){
            if($orderDetail->order?->user->id == auth()->user()->id and $orderDetail->order?->status >= 1){
                $ordersCount++;
            }
        }

        foreach($product->comments()->get() as $comment){
            if($comment->user?->id == auth()->user()->id){
                $commentsCount++;
            }
        }

        // 如果完成訂單數大於留言數，則可以留言
        if($ordersCount > $commentsCount){
            $canLeaveComment = true;
        }
        // return view('products.show');

        if($canLeaveComment){
            // 儲存到資料庫
            $comment = new Comment();
            $comment->product_id = $product->id;
            $comment->user_id = auth()->user()->id;
            $comment->description = $request->description;
            $comment->like_score = $request->like_score;
            $comment->save();

            return redirect()->route('products.show', ['product'=>$product])->with('status', 'comment-updated');
        }
		else{
			return redirect()->route('products.show', ['product'=>$product]);
		}
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
