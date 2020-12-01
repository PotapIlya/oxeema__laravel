<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\Articles;
use App\Models\User\Comment;
use App\Models\User\Like;
use Illuminate\Http\Request;

class ArticlesController extends UserBasicController
{
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
	 */
    public function index()
    {
        return view('user.article.index',
		[
			'articles' => Articles::where('user_id', \Auth::id())->get(),
		]);
    }


	/**
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
	 */
    public function create()
    {
    	return view('user.article.create');
    }

	/**
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse|void
	 */
    public function store(Request $request)
    {

    	$create = Articles::create([
    		'user_id' => \Auth::id(),
    		'title' => $request->title,
    		'text' => $request->text,
		]);
    	if ($create){
    		return redirect()->route('user.article.index');
		} else{
    		return abort(500);
		}

    }

    public function createComment(Request $request, int $articleId)
	{
		$create = Comment::create([
			'article_id' => $articleId,
			'user_id' => \Auth::id(),
			'text' => $request->input('text'),
		]);
		if ($create){
			return redirect()->back();
		}
	}
	public function createLike(Request $request, int $articleId)
	{
		$create = Like::create([
			'article_id' => $articleId,
			'user_id' => \Auth::id(),
			'text' => true,
		]);
		if ($create){
			return redirect()->back();
		}
	}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


	/**
	 * @param int $id
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
	 */
    public function edit(int $id)
    {

        return view('user.article.edit', [
        	'item' => Articles::findOrFail($id),
		]);
    }

	/**
	 * @param Request $request
	 * @param int $id
	 * @return \Illuminate\Http\RedirectResponse|void
	 */
    public function update(Request $request, int $id)
    {

		$update = Articles::findOrFail($id)->update([
			'title' => $request->title,
			'text' => $request->text,
		]);
		if ( $update ){
			return redirect()->route('user.article.index');
		} else{
			return abort(500);
		}


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
