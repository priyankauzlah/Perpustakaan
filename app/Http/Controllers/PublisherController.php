<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    //baca data
    public function readPublisher($id){
        return Publisher::findOrFail($id);
    }

    public function createPublisher(Request $request){
        $data = $request-> all();

        try {
            $publisher = new Publisher();
            $publisher -> name = $data['name'];
            $publisher -> description = $data['description'];
            $publisher -> url = $data['url'];

            $publisher -> save();
            $status = 'success';
            return response() -> json(compact('status', 'publisher'), 200);

        } catch (\Throwable $th) {
            $status = 'failed';
            return response() -> json(compact('status', 'th'), 401);
        }
    }

    public function updatePublisher ($id, Request $request){
        $data = $request-> all();

        try {
            $publisher = Publisher::findOrFail($id);
            $publisher -> name = $data['name'];
            $publisher -> description = $data['description'];
            $publisher -> url = $data['url'];

            $publisher -> save();
            $status = 'success';
            return response() -> json(compact('status', 'publisher'), 200);

        } catch (\Throwable $th) {
            $status = 'failed';
            return response() -> json(compact('status', 'th'), 401);
        }
    }

    public function deletePublisher ($id){
        $author = Publisher::findOrFail($id);
        $author->delete();

        $status = "delete success";
        return response()->json(compact('status'), 200);
    }
}
