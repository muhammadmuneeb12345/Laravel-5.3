<?php

namespace App\Http\Controllers;

use App\Like;
use App\Post;
use App\Tag;
use Auth;
use Gate;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function getIndex(/*Store $session*/)
    {
//        $posts = Post::all();
       // $posts = Post::orderBy('created_at','desc')->get();
        $posts = Post::orderBy('created_at','desc')->paginate(1);

        return view('blog.index',['posts'=>$posts]);
    }

    public function getAdminIndex(/*Store $session*/)
    {
        if (!Auth::check())
        {
            return redirect()->back();
        }

        $posts = Post::orderBy('title','asc')->get();
        //$posts = Post::all();
        //$post = new Post();
        //$posts = $post->getPosts($session);
        return view('admin.index',['posts'=>$posts]);
    }

    public function getPost(/*Store $session,*/$id)
    {
        $post = Post::where('id','=',$id)->with('likes')->first();
        //$post = Post::find($id);
        //$post = $post->getPost($session,$id);
        return view('blog.post',['post'=>$post]);
    }

    public function getLikePost(/*Store $session,*/$id)
    {
        $post = Post::where('id','=',$id)->first();
        $like = new Like();
        $post->likes()->save($like);
        //$post = Post::find($id);
        //$post = $post->getPost($session,$id);
        return redirect()->back();
        //return view('blog.post',['post'=>$post]);
    }

    public function getAdminCreate()
    {
        if (!Auth::check())
        {
            return redirect()->back();
        }

        $tags = Tag::all();
        return view('admin.create',['tags',$tags]);
    }

    public function getAdminEdit(/*Store $session,*/$id)
    {
        if (!Auth::check())
        {
            return redirect()->back();
        }

        $post =Post::find($id);
        $tags = Tag::all();
        //$post = $post->getPost($session,$id);
        return view('admin.edit',['post'=>$post,'postId'=>$id,'tags'=> $tags]);
    }

    public function postAdminCreate(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'content' => 'required|min:10'
        ]);
        $user = Auth::user();
        if (!$user)
        {
            return redirect()->back();
        }
        $post = new Post([
            'title' => $request->input('title'),
            'content' => $request->input('content')
        ]);
        $user->posts()->save($post);
        //$post->save();
        $post->tags()->attach($request->input('tags') === null ? [] : $request->input('tags'));

        return redirect()->route('admin.index')->with('info', 'Post created, Title is: ' . $request->input('title'));
    }

    public function postAdminUpdate(/*Store $session,*/Request $request)
    {
        if (!Auth::check())
        {
            return redirect()->back();
        }

        $this->validate($request,
            [
                'title' => 'required|min:5',
                'content' => 'required|min:15'
            ]);

        $post = Post::find($request->input('id'));
        if (Gate::denies('manipulate_post',$post))
        {
            return redirect()->back();
        }
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->tags()->sync($request->input('tags') === null ? [] : $request->input('tags'));

        $post->save();
        //$post->tags()->attach($request->input('tags')===null ? [] : $request->input('tags'));
        //$post ->editPost($session,$request->input('id'),$request->input('title'),
        // $request->input('content'));


        return redirect()->route('admin.index')->
        with('info','Post edited,Title is '.$request->input('title'));
    }

    public function getAdminDelete($id)
    {
        if (!Auth::check())
        {
            return redirect()->back();
        }

        $post = Post::find($id);
        if (Gate::denies('manipulate_post',$post))
        {
            return redirect()->back();
        }
        $post->likes()->delete();
        $post->tags()->detach();
        $post->delete();
        return redirect()->route('admin.index')->
        with('info','Post Deleted!');
    }
}
