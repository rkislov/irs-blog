<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\CategoryArticle;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Ramsey\Uuid\Uuid;

class ArticlesController extends Controller
{
    //
    public function index()
    {
        $objArticle = new Article();
        $articles = $objArticle->get();
        return view('admin.articles.index',['articles'=>$articles]);
    }
    public function AddArticle()
    {
        $objCategory = new Category();
        $categories = $objCategory->get();
        return view('admin.articles.add', ['categories' => $categories]);
    }
    public function addRequestArticle(ArticleRequest $request)
    {
       $objArticle = new Article();
       $objCategoryArticle = new CategoryArticle();
        $article_id=Uuid::uuid4();
       $objArticle= $objArticle->create([
           'id'=>$article_id,
           'title'=>$request->input('title'),
           'author'=>$request->input('author'),
           'short_text'=>$request->input('short_text'),
           'full_text'=>$request->input('full_text'),
       ]);

       if($objArticle){
           foreach ($request->input('categories') as $category_id)
           {
                $objCategoryArticle = $objCategoryArticle->create([
                   'id'=>Uuid::uuid4(),
                   'category_id'=>$category_id,
                    'article_id'=>$article_id,
                ]);
           }
           return redirect()->route('articles')->with('success', 'статья успешно добавленна');
       }
        return back()->with('error', 'Не удалось добавить статью');
    }
    public function editArticle($id)
    {

    }
    public function deleteArticle(Request $request)
    {

    }
}
