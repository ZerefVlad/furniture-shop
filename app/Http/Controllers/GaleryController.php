<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use Illuminate\Http\Request;
use App\Services\GaleryService;

class GaleryController extends Controller
{

    protected $galery_service;

    public function __construct(GaleryService $galery_service)
    {

        $this->galery_service = $galery_service;
    }

    public function showGalery(Request $request)
    {
// $galery = $galery->products()->paginate(16);
        $galeries = Galery::whereNull('parent_id')->paginate(12);
      //  dd($galeries);

   return view('galery')
            ->with('galeries', $galeries)
            ;
    }

   public function showElementGalery(Galery $galery)
   {
       $galeries = Galery::where('parent_id',$galery->id)->paginate(12);
       return view('galery')
           ->with('galeries', $galeries)
           ;
   }
}
