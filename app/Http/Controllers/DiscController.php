<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Discount;

class DiscController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //start here
        $discounts = Discount::all();
        return view('discount.discount_summ',['discounts'=>$discounts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //start here
        return view('discount.discount_entry');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //start here

            $data = $request->validate([
                'discname' => 'required',
		        'desname' => 'required',
		        'percent' => 'required|decimal:0,2',
                'datefrom' => 'date',
                'dateto' => 'date',
           ]);
        $newDiscount = Discount::create($data);
        return redirect(route('discount.create'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Discount $discounts)
    {
        //edit row gikan sa summary
        return view('discount.discount_entry_edit',['discounts'=>$discounts]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Discount $discounts, Request $request)
    {
        //update row summary
        $data = $request->validate([
            'discname' => 'required',
            'desname' => 'required',
            'percent' => 'required|decimal:0,2',
            'datefrom' => 'required',
            'dateto' => 'required'
        ]);
        $discounts->update($data);
        return redirect(route('discount.discount_summ'))->with('success','Discounts Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
