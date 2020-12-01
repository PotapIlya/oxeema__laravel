<?php

namespace App\Http\Controllers\All;

use App\Http\Controllers\Controller;
use App\Models\User\Articles;
use Illuminate\Http\Request;
use App\Models\User;

class IndexController extends AllBasicController
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
		$articles = Articles::with('likes')->paginate(10);


//		dd($articles[1]);

        return view('all.main.index', compact('articles'));
    }

    public function articleShow(int $id)
	{
		$item = Articles::with('author', 'comments.user', 'likes')->find($id);
		if (!$item){
			return abort(500);
		}



		return view('all.article.index', compact('item', 'id'));
	}

	public function userShow(string $name)
	{
		$user = User::where('name', $name)
			->with('articles', function ($query)
		{
			$query->limit(5);
		})->first();

		return view('all.user.index', compact('user'));
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
