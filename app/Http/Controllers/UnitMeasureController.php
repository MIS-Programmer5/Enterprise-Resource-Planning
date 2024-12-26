<?php
namespace App\Http\Controllers;
use App\Models\UnitMeasure;
use App\Models\ItemUm;
use App\Models\Items;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
class UnitMeasureController extends Controller
{
    public function index($id)
    {
        $unitMeasures = UnitMeasure::all();
        $items_unitMeasures = UnitMeasure::join('items', 'unit_measure.item_id', '=', 'items.id')
        ->select('unit_measure.*', 'items.*')
        ->where('items.status_id', 1)
        ->get();
        $baseunits = UnitMeasure::whereNull('parent')
         ->orWhere('parent', 0)
        ->get();

        $dict = Items::find($id);

        return view('Tools.unit_of_measure.create_um', compact('items_unitMeasures', 'unitMeasures'))->with('item', $dict)->with('baseunits', $baseunits);
    }
    public function store(Request $request)
    {
        try {
        $unitMeasure = new UnitMeasure();
            //code...
            $validatedData = $request->validate([
                'um_name' => 'required',
                'um_code' => 'required',
                'item_id' => 'required',
                'unit_type' => 'required',
                'quantity' => 'required',
        ]);
        $unitMeasure->create($validatedData);
          return redirect()->back()->with('success','added successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error',$th->getMessage());
        }

    }
    public function store_items_um(Request $request)
    {
        $request->validate([
            // 'item_id' => 'required',
            // 'base_unit' => 'required',
            'um_id' => 'required',
            'quantity' => 'required',
            'price' => 'required',

        ]);
        // $items_um = new ItemUm();
        // $items_um->item_id = 1;
        // $items_um->um_id = $request->um_id;
        // $items_um->quantity = $request->quantity;
        // $items_um->price = $request->price;
        // $items_um->base_unit = $request->base_unit;
        // $items_um->save();
        return redirect()->route('unit-measure.index');
    }
    public function update_um(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'u_quantity' => 'required',
            'u_price' => 'required'
        ]);
        $item_um = ItemUm::find($request->id);
        $item_um->quantity = $request->u_quantity;
        $item_um->price = $request->u_price;
        $item_um->update();
        return redirect()->route('unit-measure.index');
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);
        $item_um = ItemUm::find($request->id);
        $item_um->status = 0;
        $item_um->update();
        return redirect()->route('unit-measure.index');
    }
}
