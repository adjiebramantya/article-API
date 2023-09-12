<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index($limit,$offset){
        $data = Post::select('title','title','category','status')->offset($offset)->limit($limit)->get();

        return response()->json($data, 200);
    }


    public function create(Request $request){
        $validator = Validator::make($request->all(),[
            'title' => 'required|min:20',
            'content' => 'required|min:200',
            'category' => 'required|min:3',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator, 422);
        }

        $data = Post::create([
                    'title' => $request->title,
                    'content' => $request->content,
                    'category' => $request->category,
                    'status' => $request->status,
                ]);

        return response()->json($data, 200);
    }

    public function show($id){
        $data = Post::select('title','title','category','status')->where('id',$id)->first();

        return response()->json($data, 200);
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'title' => 'required|min:20',
            'content' => 'required|min:200',
            'category' => 'required|min:3',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator, 422);
        }

        $data = Post::where('id',$id)->update([
                    'title' => $request->title,
                    'content' => $request->content,
                    'category' => $request->category,
                    'status' => $request->status,
                ]);

        return response()->json($data, 200);

    }

    public function delete($id){

        $data = Post::where('id',$id)->delete();

        return response()->json($data, 200);

    }
}
