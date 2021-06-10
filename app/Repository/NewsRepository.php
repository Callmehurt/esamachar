<?php

namespace App\Repository;

use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;

class NewsRepository{

    private $news;

    public function __construct( News $news)
    {
        $this->news = $news;
    }

    public function all(){
        $news = $this->news->orderBy('created_at', 'DESC')->get();
        return $news;
    }

    public function activeNews(){
        $news = DB::table('news')
            ->select('news.*', 'news_categories.type as category')
            ->join('news_categories', 'news.category_id', '=', 'news_categories.id')
            ->where('news_categories.status', '=', true)
            ->where('news.status', '=', true)
            ->orderBy('news.created_at', 'DESC')
            ->get();
        return $news;
    }

    public function recentNews(){
        $news = DB::table('news')
            ->select('news.*', 'news_categories.type as category')
            ->join('news_categories', 'news.category_id', '=', 'news_categories.id')
            ->where('news_categories.status', '=', true)
            ->where('news.video', '=', null)
            ->where('news.status', '=', true)
            ->orderBy('news.created_at', 'DESC')
            ->limit(20)
            ->get();
        return $news;
    }

    public function randomFourNews(){
        $news = DB::table('news')
            ->select('news.*', 'news_categories.type as category')
            ->join('news_categories', 'news.category_id', '=', 'news_categories.id')
            ->where('news_categories.status', '=', true)
            ->where('news.video', '=', null)
            ->where('news.status', '=', true)
            ->orderBy('news.created_at', 'DESC')
            ->limit(4)
            ->get();
        return $news;
    }

    public function randomRightSideNews(){
        $news = DB::table('news')
            ->select('news.*', 'news_categories.type as category')
            ->join('news_categories', 'news.category_id', '=', 'news_categories.id')
            ->where('news_categories.status', '=', true)
            ->where('news.video', '=', null)
            ->where('news.status', '=', true)
            ->orderBy('news.created_at', 'DESC')
            ->skip(4)
            ->limit(5)
            ->get();
        return $news;
    }


    public function getWeeklyTopNews(){
        $news = DB::table('news')
            ->select('news.*', 'news_categories.type as category')
            ->join('news_categories', 'news.category_id', '=', 'news_categories.id')
            ->whereBetween('news.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->where('news_categories.status', '=', true)
            ->where('news.video', '=', null)
            ->where('news.status', '=', true)
            ->orderBy('news.view_count', 'DESC')
            ->get();
        return $news;
    }

    public function getRandomNews(){
        $news = DB::table('news')
            ->select('news.*', 'news_categories.type as category')
            ->join('news_categories', 'news.category_id', '=', 'news_categories.id')
            ->where('news_categories.status', '=', true)
            ->where('news.video', '=', null)
            ->where('news.status', '=', true)
            ->orderBy('news.created_at', 'DESC')
            ->limit(20)
            ->get();
        return $news;
    }


    public function videoNews(){
        $news = DB::table('news')
            ->select('news.*', 'news_categories.type as category')
            ->join('news_categories', 'news.category_id', '=', 'news_categories.id')
            ->where('news_categories.status', '=', true)
            ->where('news.video', '!=', null)
            ->where('news.status', '=', true)
            ->orderBy('news.created_at', 'DESC')
            ->limit(20)
            ->get();
        return $news;
    }

    public function deshNews(){
        $news = DB::table('news')
            ->select('news.*', 'news_categories.type as category')
            ->join('news_categories', 'news.category_id', '=', 'news_categories.id')
            ->where('news_categories.type', '=', 'देश')
            ->where('news_categories.status', '=', true)
            ->where('news.video', '=', null)
            ->where('news.status', '=', true)
            ->orderBy('news.created_at', 'DESC')
            ->limit(4)
            ->get();
        return $news;
    }

    public function politicalNews(){
        $news = DB::table('news')
            ->select('news.*', 'news_categories.type as category')
            ->join('news_categories', 'news.category_id', '=', 'news_categories.id')
            ->where('news_categories.type', '=', 'राजनीतिक')
            ->where('news_categories.status', '=', true)
            ->where('news.video', '=', null)
            ->where('news.status', '=', true)
            ->orderBy('news.created_at', 'DESC')
            ->limit(4)
            ->get();
        return $news;
    }

    public function entertainmentNews(){
        $news = DB::table('news')
            ->select('news.*', 'news_categories.type as category')
            ->join('news_categories', 'news.category_id', '=', 'news_categories.id')
            ->where('news_categories.type', '=', 'मनोरञ्जन')
            ->where('news_categories.status', '=', true)
            ->where('news.video', '=', null)
            ->where('news.status', '=', true)
            ->orderBy('news.created_at', 'DESC')
            ->limit(4)
            ->get();
        return $news;
    }

    public function sportsNews(){
        $news = DB::table('news')
            ->select('news.*', 'news_categories.type as category')
            ->join('news_categories', 'news.category_id', '=', 'news_categories.id')
            ->where('news_categories.type', '=', 'खेलकुद')
            ->where('news_categories.status', '=', true)
            ->where('news.video', '=', null)
            ->where('news.status', '=', true)
            ->orderBy('news.created_at', 'DESC')
            ->limit(4)
            ->get();
        return $news;
    }

    public function technicalNews(){
        $news = DB::table('news')
            ->select('news.*', 'news_categories.type as category')
            ->join('news_categories', 'news.category_id', '=', 'news_categories.id')
            ->where('news_categories.type', '=', 'टेक्नोलोजी')
            ->where('news_categories.status', '=', true)
            ->where('news.video', '=', null)
            ->where('news.status', '=', true)
            ->orderBy('news.created_at', 'DESC')
            ->limit(4)
            ->get();
        return $news;
    }

    public function newsWithCategory(){
        $news = DB::table('news')
            ->select('news.*', 'news_categories.type as category')
            ->join('news_categories', 'news.category_id', '=', 'news_categories.id')
            ->get();
        return $news;
    }

    public function findNews($id){
        $news = $this->news->find($id);
        return $news;
    }


    public function viewNews($slug){
        $Key = 'news_' . $slug;
        if (!Session::has($Key)) {
            News::where('slug', $slug)->increment('view_count');
            Session::put($Key, 1);
        }

        $news = News::where('slug', $slug)->first();
        return $news;
    }


}