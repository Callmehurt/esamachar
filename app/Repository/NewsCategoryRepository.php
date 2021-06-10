<?php

namespace App\Repository;

use App\Models\NewsCategory;

class NewsCategoryRepository{

    private $newsCategory;

    public function __construct( NewsCategory $newsCategory)
    {
        $this->newsCategory = $newsCategory;
    }

    public function all(){
        $newsCategories = $this->newsCategory->orderBy('created_at', 'DESC')->get();
        return $newsCategories;
    }

    public function activeCategories(){
        $newsCategories = $this->newsCategory->where(['status' => true])->orderBy('created_at', 'DESC')->get();
        return $newsCategories;
    }

    public function findCategory($id){
        $category = $this->newsCategory->find($id);
        return $category;
    }


}