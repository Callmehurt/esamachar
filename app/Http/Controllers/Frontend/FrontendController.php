<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repository\NewsCategoryRepository;
use App\Repository\NewsRepository;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    private $newsRepository;
    private $newsCategoryRepository;

    public function __construct(NewsRepository $newsRepository, NewsCategoryRepository $newsCategoryRepository)
    {
        $this->newsRepository = $newsRepository;
        $this->newsCategoryRepository = $newsCategoryRepository;
    }

    public function home(){
        $news = $this->newsRepository->activeNews();
        $randomFourNews = $this->newsRepository->randomFourNews();
        $rightSideNews = $this->newsRepository->randomRightSideNews();
        $weeklyTopNews = $this->newsRepository->getWeeklyTopNews();
        $recentNews = $this->newsRepository->recentNews();
        $randomNews = $this->newsRepository->getRandomNews();
        $videoNews = $this->newsRepository->videoNews();
        $deshNews = $this->newsRepository->deshNews();
        $technicalNews = $this->newsRepository->technicalNews();
        $sportsNews = $this->newsRepository->sportsNews();
        $entertainmentNews = $this->newsRepository->entertainmentNews();
        $politicalNews = $this->newsRepository->politicalNews();
        return view('frontend.home',
            compact('news', 'recentNews','randomFourNews', 'rightSideNews','weeklyTopNews', 'randomNews', 'videoNews', 'deshNews', 'technicalNews', 'sportsNews', 'entertainmentNews', 'politicalNews'));
    }

    public function viewNews($slug){
        $news = $this->newsRepository->viewNews($slug);
        return view('frontend.singleNews.news', compact('news'));
    }

    public function newsCategory(){
        return view('frontend.category.index');
    }

}
