<?php

// app/Http/Controllers/PriceLevelController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pricelevel;

class PricelevelController extends Controller
{
    public function create(){
        return view('Tools.pricelevel.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|string',
            'description' => 'nullable|string',
            'markup' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date'
        ]);

        $newPriceLevel = pricelevel::create($data);
        return redirect()->route('pricelevel.create')->with('success', 'Price Level added successfully.');
    }

    public function index(){
        $pricelevel = pricelevel::all();
        return view('Tools.pricelevel.index',['pricelevels'=>$pricelevel]);
    }
}
