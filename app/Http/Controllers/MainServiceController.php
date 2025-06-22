<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MainService;

class MainServiceController extends Controller
{
    public function index(){
        $data = MainService::all();
        return view('dashboard.main-service.index', compact('data'));
    }

    public function create(){
        return view('dashboard.main-service.create');
    }

    public function store(Request $request){
        $data = MainService::create([
            'en'=> [
                'detail' => $request->detail_en,
            ],
            'fa'=> [
                'detail'=> $request->detail_fa,
            ],
            'ps'=> [
                'detail' => $request->detail_ps,
            ],
        ]);
        
        return redirect()->route('main-service');
    }

    public function edit($id){
        $data = MainService::find($id)->getTranslationsArray();
        $data_id = $id;
        $english = $data['en'];
        $persian = $data['fa'];
        $pashto = $data['ps'];
        return view('dashboard.main-service.edit', compact('english', 'persian', 'pashto', 'data_id',));
    }

    
    public function update(Request $request, $id){
        $data = MainService::find($id)->update([
            'en'=> [
                'detail' => $request->detail_en,
            ],
            'fa'=> [
                'detail'=> $request->detail_fa,
            ],
            'ps'=> [
                'detail' => $request->detail_ps,
            ],
        ]);
        
        return redirect()->route('main-service');
    }

    public function delete($id){
        $data = MainService::find($id);
        $data->deleteTranslations();
        $data->delete();

        return redirect()->route('main-service');
    }
}
