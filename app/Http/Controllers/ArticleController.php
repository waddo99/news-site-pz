<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleCreateRequest;
use App\Http\Requests\ArticleUpdateRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        if($this->isAdmin()) {
            $articles = Article::with(['owner'])->get();
        } else {
            $articles = Article::where('owner_id', Auth::user()->id)->with(['owner'])->get();
        }

        return view('article.index')->with(compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get()->pluck('name', 'id');

        return view('article.create')->with(compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleCreateRequest $request)
    {
        $article = new Article([
            'title' => $request->get('title'),
            'category_id' => $request->get('category'),
            'summary' => $request->get('summary'),
            'image_path' => '',
            'owner_id' => Auth::user()->id,
            'text' => $request->get('text'),
            'active' => $request->has('active') ? 1 : 0,
        ]);
        $article->save();
        if($request->has('image')) {
            $fileName = 'image_' . $article->id . '.' . $request->file('image')->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('public', $fileName);
            $article->image_path = $fileName;
            $article->save();
        }

        $this->addToLog($article->id, Auth::user()->id, 'create');

        return redirect()->route('article.show', [ 'article' => $article->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::with(['owner'])->where('id', $id)->where('active', 1)->first();

        return view('article.show')->with(compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        $categories = Category::get()->pluck('name', 'id');
        if (!($this->isAdmin() || ($article->owner_id == Auth::user()->id))){
            $article = null;
        }

        return view('article.edit')->with(compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleUpdateRequest $request, $id)
    {
        $article = Article::find($id);
        $article->title = $request->get('title');
        $article->category_id = $request->get('category');
        $article->summary = $request->get('summary');
        $article->text = $request->get('text');
        $article->active = $request->has('active') ? 1 : 0;
        if($request->has('image')) {
            $fileName = 'image_' . $article->id . '.' . $request->file('image')->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('public', $fileName);
            $article->image_path = $fileName;
        }
        $article->save();

        $this->addToLog($article->id, Auth::user()->id, 'update', $this->formatRequest($request->all()));

        return redirect()->route('article.index')
            ->with('success', 'Article has been successfully updated.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $data = $article->getAttributes();
        $this->addToLog($article->id, Auth::user()->id, 'delete', $this->formatRequest($data));

        $article->delete();

        return redirect()->route('article.index')
            ->with('success', 'Article has been successfully deleted.');
    }

    protected function isAdmin()
    {
        return (Auth::user()->role->first()->role === 'admin');
    }
}
