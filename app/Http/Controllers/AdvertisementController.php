<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertisement;

class AdvertisementController extends Controller
{
    public function index(){
        $data = Advertisement::all();
        return view('dashboard.advertisement.index', compact('data'));
    }

    public function advertisement(){
        $advertisements = Advertisement::all();
        return view('pages.advertisement.index', compact('advertisements'));
    }

    public function detail($id){
        $info = Advertisement::find($id);
        return view('pages.advertisement.detail', compact('info'));
    }

    public function create(){
        return view('dashboard.advertisement.create');
    }

    public function store(Request $request){
        $filename = time() . '.' . $request->img->extension();
        $path = 'images/advertisement/'.$filename;
        $data = Advertisement::create([
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
            $image = $request->img->move('images/advertisement', $filename);
        }
        
        return redirect()->route('advertisement');
    }
    public function edit($id){
        $data = Advertisement::find($id)->getTranslationsArray();
        $data_id = $id;
        $en_data = $data['en'];
        $fa_data = $data['fa'];
        $ps_data = $data['ps'];
        return view('dashboard.advertisement.edit', compact('en_data', 'fa_data', 'ps_data', 'data_id',));
    }

    public function update(Request $request, $id){
        $old_path = Advertisement::find($id)->img;
        if($request->hasFile('img')){
            $filename = time() . '.' . $request->img->extension();
            $path = 'images/advertisement/'.$filename;
        } else{
            $path = $old_path;
        }
        $data = Advertisement::find($id)->update([
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
                $image = $request->img->move('images/advertisement', $filename);
            }
        }
        
        return redirect()->route('advertisement');
    }

    public function delete($id){
        $data = Advertisement::find($id);
        $data->deleteTranslations();
        $data->delete();

        return redirect()->route('advertisement');
    }
}
