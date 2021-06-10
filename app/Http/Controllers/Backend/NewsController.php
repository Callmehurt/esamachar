<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\News;
use App\Repository\NewsCategoryRepository;
use App\Repository\NewsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class NewsController extends Controller
{
    private $newsRepository, $newsCategoryRepository;

    public function __construct(NewsRepository $newsRepository, NewsCategoryRepository $newsCategoryRepository)
    {
        $this->newsRepository = $newsRepository;
        $this->newsCategoryRepository = $newsCategoryRepository;
    }

    public function index(){
        $categories = $this->newsCategoryRepository->activeCategories();
        return view('admin.news.index', compact('categories'));
    }

    public function getNews(){
        $news = $this->newsRepository->newsWithCategory();
        return DataTables::of($news)->make(true);
    }

    public function store(NewsRequest $newsRequest){
        $news = new News();
        if($newsRequest->hasFile('thumbnail')){
            $image = $newsRequest->thumbnail;
            $new_name = time().'.'.$image->getClientOriginalName();
            $path = 'uploads/photo_gallery';
            $image->move(public_path('uploads/photo_gallery'), $new_name);
            $news->thumbnail = $path.'/'.$new_name;
        }
        $news->title = $newsRequest->title;
        $news->tag = $newsRequest->tag;
        $news->video = $newsRequest->video;
        $news->news_content = $newsRequest->news_content;
        $news->category_id = $newsRequest->category_id;
        $news->user_id = Auth::user()->id;
        $news->save();
    }

    public function status($id){
        $status = $this->newsRepository->findNews($id);
        $status->status=!$status->status;
        $status->save();
        if($status){
            return response()->json(['status' => true, 'message' => 'Status changed successfully!']);
        }else{
            return response()->json(['status' => false, 'message' => 'Operation failed']);
        }
    }

    public function destroy($id){
        $news = $this->newsRepository->findNews($id);
        $news->delete();
        if($news){
            return response()->json(['status' => true, 'message' => 'Deleted successfully']);
        }else{
            return response()->json(['status' => false, 'message' => 'Operation failed']);
        }
    }

    public function edit($id){
        $news = $this->newsRepository->findNews($id);
        if($news){
            return response()->json(['status' => true, 'data' => $news, 'message' => 'Process successful']);
        }else{
            return response()->json(['status' => false, 'message' => 'No record found!']);
        }
    }

    public function update(Request $request){
        $news = $this->newsRepository->findNews($request->news_id);
        if($request->hasFile('thumbnail')){
            $image = $request->thumbnail;
            $new_name = time().'.'.$image->getClientOriginalName();
            $path = 'uploads/photo_gallery';
            $image->move(public_path('uploads/photo_gallery'), $new_name);
            $news->thumbnail = $path.'/'.$new_name;
        }
        $news->title = $request->title;
        $news->tag = $request->tag;
        $news->video = $request->video;
        $news->news_content = $request->news_content;
        $news->category_id = $request->category_id;
        $news->save();
        if($news){
            return response()->json(['status' => true, 'message' => 'Updated successfully', 'data' => $news]);
        }else{
            return response()->json(['status' => false, 'message' => 'Operation failed']);
        }
    }
}
