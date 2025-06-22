<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function gallery(){
        $data = Gallery::all();
        return view('pages.portfolio.index', compact('data'));
    }

    public function index(){
        $data = Gallery::all();
        return view('dashboard.gallery.index', compact('data'));
    }

    public function create(){
        return view('dashboard.gallery.create');
    }

    public function store(Request $request){
        $filename = time() . '.' . $request->image->extension();
        $path = 'images/gallery/'.$filename;
        $data = Gallery::create([
            'caption' => $request->caption,
            'image' => $path,
        ]);

        if ($data){
            $image = $request->image->move('images/gallery', $filename);
        }
        
        return redirect()->route('gallery');
    }

    public function delete($id){
        $data = Gallery::find($id)->delete();
        return redirect()->route('gallery');
    }
}
