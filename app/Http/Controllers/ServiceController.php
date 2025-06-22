<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\MainService;

class ServiceController extends Controller
{
    public function index(){
        $data = Service::all();
        return view('dashboard.services.index', compact('data'));
    }

    public function services(){
        $message = MainService::latest()->first();
        $services = Service::all();
        return view('pages.services.index', compact('services', 'message'));
    }

    public function service($id){
        $service = Service::find($id);
        return view('pages.services.service', compact('service'));
    }

    public function create(){
        return view('dashboard.services.create');
    }

    public function store(Request $request){
        $filename = time() . '.' . $request->img->extension();
        $path = 'images/services/'.$filename;
        $data = Service::create([
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
            $image = $request->img->move('images/services', $filename);
        }
        
        return redirect()->route('services');
    }
    public function edit($id){
        $data = Service::find($id)->getTranslationsArray();
        $data_id = $id;
        $en_data = $data['en'];
        $fa_data = $data['fa'];
        $ps_data = $data['ps'];
        return view('dashboard.services.edit', compact('en_data', 'fa_data', 'ps_data', 'data_id',));
    }

    public function update(Request $request, $id){
        $old_path = Service::find($id)->img;
        if($request->hasFile('img')){
            $filename = time() . '.' . $request->img->extension();
            $path = 'images/services/'.$filename;
        } else{
            $path = $old_path;
        }
        $data = Service::find($id)->update([
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
                $image = $request->img->move('images/services', $filename);
            }
        }
        
        return redirect()->route('services');
    }

    public function delete($id){
        $data = Service::find($id);
        $data->deleteTranslations();
        $data->delete();

        return redirect()->route('services');
    }
}
