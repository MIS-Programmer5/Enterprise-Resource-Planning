<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SubClass;
use Illuminate\Http\Request;
use App\Http\Requests\ItemValidation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use App\Models\Items;
use App\Models\Category;
use App\Models\Employees;
use App\Models\Classification;




class ToolsController extends Controller
{
    private $items;
    private $category;
    private $employee;
    private $class;
    private $subclass;



    public function __construct(Items $items,Category $categories,Employees $employees,Classification $class,SubClass $subclass)
    {
         $this->items = $items;
         $this->category = $categories;
         $this->employee = $employees;
         $this->class = $class;
         $this->subclass = $subclass;

    }


    public function AddItemsPage(): View
    {
        $categories = $this->category->all();
        $class = $this->class->whereNull('parent')
        ->get();
        $subclass = $this->class->whereNotNull('parent')
        ->get();

        return view('Tools.items.additems')->with('category', $categories)->with('class',  $class)->with('subclass',  $subclass);
    }
    public function AddItems(Request $request)
    {
        try {
            // code

            // Mass assign the validated data
            $validated = $this->validateItems($request);
            $this->items->create($validated);
            return 'Item Added';
        } catch (\Throwable $th) {
        // Return a user-friendly error message
            return $th->getMessage();
        }
    }

    public function ListItemsPage(): View
    {
        $items =  $this->items->with(['category', 'class'])->get();
        return view('Tools.items.listitems')->with('items', $items);
    }

     public function GetItems()
    {
        try {
            //code...
               return $this->items->all();
        } catch (\Throwable $th) {
            //throw $th;
             return $th->getMessage();
        }
    }

    public function UpdateItems(Request $request)
    {
        try {
            // code
            $validated = $this->validateItems($request);
            $item =  $this->items->find((int)$request->input('id'));
            $item->update($validated);
            return response()->json(['success' => true, 'message' => 'Item Updated successfully']);

        } catch (\Throwable $th) {
        // Return a user-friendly error message
             return response()->json(['success' => false, 'message' => $th->getMessage()]);
        }
    }

    public function AddCategoryPage(): View
    {
        return view('Tools.category.addCategory', []);
    }

    public function AddCategory(Request $request)
    {

        try {
            //code...
            $validated = $this->validateCategory($request);
            // Mass assign the validated data
            $this->category->create($validated);
            return "Category Added";
        } catch (\Throwable $th) {
            //throw $th;
             return $th->getMessage();
        }

    }

    public function ListCategoryPage(): View
    {
        return view('Tools.category.listCategory');
    }

    public function getCategory()
    {
        try {
            //code...
            return  $this->category->all();
        } catch (\Throwable $th) {
            //throw $th;
             return $th->getMessage();
        }
    }
    public function UpdateCategory(Request $request)
    {
        try {
            // code
            $validated = $this->validateCategory($request);
            $category = $this->category->find($request->input('id'));
            $category->update($validated);

            return $this->category->result;
        } catch (\Throwable $th) {
        // Return a user-friendly error message
            return $th->getMessage();
        }
    }

    public function AddEmployeesPage(): View
    {
        return view('employee.addEmployee', []);
    }
     public function AddEmployees(Request $request)
    {
        try{
            // code
            $validated = $this->validateEmployee($request);
            // Mass assign the validated data
            $this->employee->create($validated);
            return $this->items->result;
        } catch (\Throwable $th) {
        // Return a user-friendly error message
            return $th->getMessage();
        }
    }
    public function ListEmployeesPage(): View
    {
          return view('employee.listEmployee', []);
    }
    // validations
     public function getEmployees()
    {
        try {
            //code...
            return  $this->employee->all();
        } catch (\Throwable $th) {
            //throw $th;
             return $th->getMessage();
        }
    }

     public function UpdateEmployee(Request $request)
    {
        try {
            // code
            $validated = $this->validateEmployee($request);
            $employee = $this->employee->find($request->input('id'));
            $employee->update($validated);
            return $this->category->result;
        } catch (\Throwable $th) {
        // Return a user-friendly error message
            return $th->getMessage();
        }
    }

    public function ListClassificationPage()
    {
        $class=$this->class->with(['category'])
        ->whereNull('parent')
        ->get();


        return view('Tools.Classifications.ListClassification')->with('class',  $class)->with('category',  $this->category);
    }
    public function AddClassification(Request $request)
    {
        try {
            //code...
            $validated = $this->validateClassification($request);
            $this->class->create($validated);

            return redirect()->back()->with('success', 'Supplier added successfully!');
        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
        }


    }

    public function UpdateClassification(Request $request)
    {
        try {
            //code...
            $validated = $this->validateClassification($request);
            $class = $this->class->find($request->input('id'));
            $class->update($validated);
            return redirect()->back()->with('success', 'Updated successfully!');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error',$th->getMessage());
        }


    }

    public function ListSubClassificationPage($id)
    {
        $class=$this->class->find($id);
        $classes=$this->class->with(['category'])
        ->whereNull('parent')
        ->get();
        return view('Tools.SubClassifications.ListSubClass')->with('classification',  $classes)->with('class',  $class)->with('category',  $this->category);
    }


    public function AddSubClassification(Request $request)
    {
        try {
            //code...
            $validated = $this->validateSubClassification($request);
            $this->subclass->create($validated);

            return redirect()->back()->with('success', 'Added Successfully!');
        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
        }
    }
    public function UpdateSubClassification(Request $request)
    {
        try {
            //code...
            $validated = $this->validateSubClassification($request);
            $sub = $this->subclass->find($request->input(key: 'id'));
            $sub->update($validated);
            return redirect()->back()->with('success', 'Added Successfully!');
        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
        }


    }


    public function validateEmployee(Request $request)
    {
         return $request->validate([
            'first_name'   => ['required'],
            'last_name'    => ['required'],
            'middle_name'  => ['required'],
            'email'        => ['required', 'email'],
            'phone_no'     => ['required', 'digits_between:10,15'],
            'address'      => ['required'],
            'postal_code'  => ['required'],
            'id_no'        => ['required'],
            'status'       => ['required']
        ]);
    }
    public function validateItems(Request $request)
    {
         return $request->validate([
            'name'         => ['required'],
            'code'         => ['required'],
            'cost_id'      => ['required'],
            'category_id'  => ['required'],
            'class_id'     => ['required'],
            'sub_class_id' => ['required'],
            'status_id'    => ['required']
        ]);
    }
    public function validateCategory(Request $request)
    {
         return $request->validate([
            'name'         => ['required'],
            'item_alias'   => ['required'],
            'qty_type'     => ['required'],
            'description'  => ['required']
        ]);
    }
     public function validateClassification(Request $request)
    {
         return $request->validate([
            'name'       => ['required'],
            'category_id'   => ['required']
        ]);
    }
    public function validateSubClassification(Request $request)
    {
         return $request->validate([
            'name'       => ['required'],
            'category_id' => ['required'],
            'parent'   => ['required']
        ]);
    }





}
