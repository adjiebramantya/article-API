<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index($limit,$offset){
        $data = Post::select('title','content','category','status')->offset($offset)->limit($limit)->get();

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
            return response()->json($validator->errors(), 422);
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
        $data = Post::select('title','content','category','status')->where('id',$id)->first();

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
            return response()->json($validator->errors(), 422);
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

    public function post(Request $request){

        if ($request->status === 'draft') {
            $data = Post::select('id','title','content','category','status')->where('status','draft')->paginate(5);
        }elseif ($request->status === 'trash'){
            $data = Post::select('id','title','content','category','status')->where('status','trash')->paginate(5);
        }else{
            $data = Post::select('id','title','content','category','status')->where('status','publish')->paginate(5);
        }

        return view('post.index',compact('data'));
    }

    public function edit(Request $request,$id){

        $data = Post::select('id','title','content','category','status')->where('status','publish')->first();


        return view('post.edit',compact('data'));
    }
}
