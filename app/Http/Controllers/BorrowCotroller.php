<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Borrow;
use Illuminate\Http\Request;

class BorrowCotroller extends Controller
{
    public function readBorrow($id){
        return Borrow::findOrFail($id);
    }

    public function createBook(Request $request){
        $data = $request-> all();

        try {
            $borrow = new Borrow();
            $borrow -> user_id = $data['user_id'];
            $borrow -> book_id = $data['book_id'];
            $borrow -> return = $data['return'];
            $borrow -> deadline = $data['deadline'];
            $borrow -> period = $data['period'];

            $borrow -> save();
            $status = 'success';
            return response() -> json(compact('status', 'borrow'), 200);

        } catch (\Throwable $th) {
            $status = 'error';
            return response() -> json(compact('status', 'th'), 200);
        }
    }

    public function updateBorrow($id, Request $request){
        $data = $request-> all();

        try {
            $borrow = Borrow::findOrFail($id);
            $borrow -> user_id = $data['user_id'];
            $borrow -> book_id = $data['book_id'];
            $borrow -> return = $data['return'];
            $borrow -> deadline = $data['deadline'];
            $borrow -> period = $data['period'];

            $borrow -> save();
            $status = 'success';
            return response() -> json(compact('status', 'borrow'), 200);

        } catch (\Throwable $th) {
            $status = 'error';
            return response() -> json(compact('status', 'th'), 401);
        }
    }

    public function deletedBorrow($id){
        $borrow = Borrow::findOrFail($id);
        $borrow->delete();

        $status = "delete success";
        return response()->json(compact('status'), 200);
    }
}
