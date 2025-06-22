<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index(){
        $data = News::all();
        return view('dashboard.news.index', compact('data'));
    }

    public function news(){
        $newses = News::all();
        return view('pages.news.newses', compact('newses'));
    }

    public function detail($id){
        $news = News::find($id);
        return view('pages.news.detail', compact('news'));
    }

    public function create(){
        return view('dashboard.news.create');
    }

    public function store(Request $request){
        $filename = time() . '.' . $request->img->extension();
        $path = 'images/news/'.$filename;
        $data = News::create([
            'fa'=> [
                'title' => $request->title_fa,
                'detail'=> $request->detail_fa,
            ],
            'en'=> [
                'title' => $request->title_en,
                'detail' => $request->detail_en,
            ],
            'ps'=> [
                'title' => $request->title_ps,
                'detail' => $request->detail_ps,
            ],
            'img' => $path,
        ]);

        if ($data){
            $image = $request->img->move('images/news', $filename);
        }
        
        return redirect()->route('news');
    }
    public function edit($id){
        $data = News::find($id)->getTranslationsArray();
        $data_id = $id;
        $en_data = $data['en'];
        $fa_data = $data['fa'];
        $ps_data = $data['ps'];
        return view('dashboard.news.edit', compact('en_data', 'fa_data', 'ps_data', 'data_id',));
    }

    public function update(Request $request, $id){
        $old_path = News::find($id)->img;
        if($request->hasFile('img')){
            $filename = time() . '.' . $request->img->extension();
            $path = 'images/news/'.$filename;
        } else{
            $path = $old_path;
        }
        $data = News::find($id)->update([
            'fa'=> [
                'title' => $request->title_fa,
                'detail'=> $request->detail_fa,
            ],
            'en'=> [
                'title' => $request->title_en,
                'detail' => $request->detail_en,
            ],
            'ps'=> [
                'title' => $request->title_ps,
                'detail' => $request->detail_ps,
            ],
            'img' => $path,
        ]);
        if($request->hasFile('img')){
            if($data){ 
                $image = $request->img->move('images/news', $filename);
            }
        }
        
        return redirect()->route('news');
    }

    public function delete($id){
        $data = News::find($id);
        $data->deleteTranslations();
        $data->delete();

        return redirect()->route('news');
    }
}
