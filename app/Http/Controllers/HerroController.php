<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Herro;

class HerroController extends Controller
{
    public function index(){
        $data = Herro::all();
        return view('dashboard.herro.index', compact('data'));
    }

    public function create(){
        return view('dashboard.herro.create');
    }

    public function store(Request $request){
        $filename = time() . '.' . $request->img->extension();
        $path = 'images/herro/'.$filename;
        $data = Herro::create([
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
            $image = $request->img->move('images/herro', $filename);
        }
        
        return redirect()->route('herro');
    }
    public function edit($id){
        $data = Herro::find($id)->getTranslationsArray();
        $data_id = $id;
        $en_data = $data['en'];
        $fa_data = $data['fa'];
        $ps_data = $data['ps'];
        return view('dashboard.herro.edit', compact('en_data', 'fa_data', 'ps_data', 'data_id',));
    }

    public function update(Request $request, $id){
        $old_path = Herro::find($id)->img;
        if($request->hasFile('img')){
            $filename = time() . '.' . $request->img->extension();
            $path = 'images/herro/'.$filename;
        } else{
            $path = $old_path;
        }
        $data = Herro::find($id)->update([
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
                $image = $request->img->move('images/herro', $filename);
            }
        }
        
        return redirect()->route('herro');
    }

    public function delete($id){
        $data = Herro::find($id);
        $data->deleteTranslations();
        $data->delete();

        return redirect()->route('herro');
    }
}
