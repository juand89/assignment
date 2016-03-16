<?php namespace App\Http\Controllers;

use App\Posts;
use App\User;
use Redirect;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostFormRequest;

use Illuminate\Http\Request;


class PostController extends Controller {

	/**
	 * 
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Posts::where('active','1')->orderBy('created_at','desc')->paginate(5);
		$title = 'Latest Posts';
		return view('home')->withPosts($posts)->withTitle($title);
	}

	/**
	 * 
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		// 
		if($request->user()->can_post())
		{
			return view('posts.create');
		}	
		else 
		{
			return redirect('/')->withErrors('You have not sufficient permissions for writing post');
		}
	}

	/**
	 *
	 *
	 * @return Response
	 */
	public function store(PostFormRequest $request)
	{
		$post = new Posts();
		$post->body = $request->get('body');
		$post->slug = str_slug($post->body);
		$post->author_id = $request->user()->id;
		$post->active = 1;
		$message = 'Post published successfully';
		$post->save();
		return redirect('/')->withMessage($message);
	}

	/**
	 * 
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
		$post = Posts::where('slug',$slug)->first();

		if($post)
		{
			if($post->active == false)
				return redirect('/')->withErrors('requested page not found');
			$comments = $post->comments;	
		}
		else 
		{
			return redirect('/')->withErrors('requested page not found');
		}
		return view('posts.show')->withPost($post)->withComments($comments);
	}

	
}
