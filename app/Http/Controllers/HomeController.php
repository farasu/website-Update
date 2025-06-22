<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info;
use App\Models\Herro;
use App\Models\Service;

class HomeController extends Controller
{
    public function index(){
        $info = Info::latest()->first();
        $herro = Herro::all();
        $services = Service::latest()->take(6)->get();
        return view('pages.index', compact('info', 'herro', 'services'));
    }
}
