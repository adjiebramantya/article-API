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

    function createView(){
        return view('post.add');
    }

    public function createAdd(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(),[
            'title' => 'required|min:20',
            'content' => 'required|min:200',
            'category' => 'required|min:3',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $data = Post::create([
                    'title' => $request->title,
                    'content' => $request->content,
                    'category' => $request->category,
                    'status' => $request->status,
                ]);

        return redirect()->route('post')->with('success','Add Data Successfully!');
    }

    public function edit($id){

        $data = Post::select('id','title','content','category','status')->where('id',$id)->first();

        return view('post.edit',compact('data'));
    }

    public function editUpdate(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'title' => 'required|min:20',
            'content' => 'required|min:200',
            'category' => 'required|min:3',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $data = Post::where('id',$id)->update([
                    'title' => $request->title,
                    'content' => $request->content,
                    'category' => $request->category,
                    'status' => $request->status,
                ]);

        return redirect()->route('post')->with('success','Edited Data Successfully!');

    }

    public function editTrash($id){

        $data = Post::where('id',$id)->update([
                    'status' => 'trash',
                ]);

    return redirect()->back()->with('success','Data add to Trash Successfully!');

    }

    public function preview(){

        $data = Post::select('id','title','content','category','status')->where('status','publish')->paginate(2);

        return view('post.preview',compact('data'));
    }
}
