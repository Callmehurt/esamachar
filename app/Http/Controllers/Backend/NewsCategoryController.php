<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsCategoryRequest;
use App\Models\NewsCategory;
use App\Repository\NewsCategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;


class NewsCategoryController extends Controller
{
    private $newsCategoryRepository;

    public function __construct(NewsCategoryRepository $newsCategoryRepository)
    {
        $this->newsCategoryRepository = $newsCategoryRepository;
    }

    public function index(){
        return view('admin.newsCategory.index');
    }

    public function getNewsCategories(){
        $categories = $this->newsCategoryRepository->all();
        return DataTables::of($categories)->make(true);
    }

    public function store(NewsCategoryRequest $newsCategoryRequest){
        $newCategory = NewsCategory::create([
           'type' => $newsCategoryRequest->type,
           'user_id' => Auth::user()->id,
        ]);

        if($newCategory){
            return response()->json(['status' => true, 'message' => 'Category created successfully']);
        }else{
            return response()->json(['status' => false, 'message' => 'Category creation failed']);
        }
    }

    public function status($id){
        $status = $this->newsCategoryRepository->findCategory($id);
        $status->status=!$status->status;
        $status->save();
        if($status){
            return response()->json(['status' => true, 'message' => 'Status changed successfully!']);
        }else{
            return response()->json(['status' => false, 'message' => 'Operation failed']);
        }
    }

    public function destroy($id){
        $category = $this->newsCategoryRepository->findCategory($id);
        $category->delete();
        if($category){
            return response()->json(['status' => true, 'message' => 'Deleted successfully']);
        }else{
            return response()->json(['status' => false, 'message' => 'Operation failed']);
        }
    }

    public function edit($id){
        $category = $this->newsCategoryRepository->findCategory($id);
        if($category){
            return response()->json(['status' => true, 'data' => $category, 'message' => 'Process successful']);
        }else{
            return response()->json(['status' => false, 'message' => 'No record found!']);
        }
    }

    public function update(Request $request){
        $category = $this->newsCategoryRepository->findCategory($request->category_id)->update([
            'type' => $request->type,
        ]);
        if($category){
            return response()->json(['status' => true, 'message' => 'Updated successfully']);
        }else{
            return response()->json(['status' => false, 'message' => 'Operation failed']);
        }
    }


}
