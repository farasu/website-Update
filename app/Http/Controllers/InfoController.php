<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Info;

class InfoController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('dashboard.index');
    }

    public function info(){
        $data = Info::all();
        return view('dashboard.about.info', compact('data'));
    }

    public function create(){
        return view('dashboard.about.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'detail_en' => 'required',
            'detail_fa' => 'required',
            'detail_ps' => 'required',
        ]);
        $data = Info::create([
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
        
        return redirect()->route('info');
    }

    public function edit($id){
        $data = Info::find($id)->getTranslationsArray();
        $data_id = $id;
        $english = $data['en'];
        $persian = $data['fa'];
        $pashto = $data['ps'];
        return view('dashboard.about.edit', compact('english', 'persian', 'pashto', 'data_id',));
    }

    
    public function update(Request $request, $id){
        $this->validate($request, [
            'detail_en' => 'required',
            'detail_fa' => 'required',
            'detail_ps' => 'required',
        ]);
        $data = Info::find($id)->update([
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
        
        return redirect()->route('info');
    }

    public function delete($id){
        $data = Info::find($id);
        $data->deleteTranslations();
        $data->delete();

        return redirect()->route('info');
    }
}
