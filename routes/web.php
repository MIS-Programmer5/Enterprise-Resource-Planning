<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiscController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\UnitMeasureController;
use App\Http\Controllers\PricelevelController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ToolsController;




Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// jaque
Route::get('/create',[DiscController::class,'create'])->name('discount.create');
Route::post('/create',[DiscController::class,'store'])->name('discount.store');
Route::get('/summary',[DiscController::class,'index'])->name('discount.index');
Route::get('/edit',[DiscController::class,'edit'])->name('discount.edit');

// benedict
 Route::post('/create_supplier', [SuppliersController::class, 'store'])->name('suppliers.store');

//route for supplier
Route::post('/update_supplier', [SuppliersController::class, 'update'])->name('suppliers.update');
Route::get('/supplier_list', [SuppliersController::class, 'index'])->name('suppliers.list');
Route::get('/suppliers/edit/{id}', [SuppliersController::class, 'edit']);
Route::get('/supplier_deactivate/{id}', [BranchController::class, 'deactivate'])->name('supplier.deactivate');
Route::get('/suppliers/delete/{id}', [SuppliersController::class, 'delete']);

//route for company
Route::post('/company_store', [CompanyController::class, 'store'])->name('company.store');
Route::get('/company_list', [CompanyController::class, 'index'])->name('companies');
Route::post('/company_update', [CompanyController::class, 'update'])->name('company.update');
Route::get('/company_show/{id}', [CompanyController::class, 'show'])->name('company.show');
Route::get('/company_deactivate/{id}', [BranchController::class, 'deactivate'])->name('company.deactivate');

//route for branch
Route::get('/branch_list', [BranchController::class, 'index'])->name('branch.index');
Route::post('/branch_create', [BranchController::class, 'store'])->name('branch.store');
Route::post('/branch_update', [BranchController::class, 'update'])->name('branch.update');
Route::get('/branch_show/{id}', [BranchController::class, 'show'])->name('branch.show');
Route::get('/branch_deactivate/{id}', [BranchController::class, 'deactivate'])->name('branch.deactivate');

// jerald
Route::get('/unit-measure/{id}', [UnitMeasureController::class, 'index'])->name('unit-measure.index');
Route::post('/unit-measure/add-unit-of-measure', [UnitMeasureController::class, 'store'])->name('unit-measure.store');
Route::post('/unit-measure/items', [UnitMeasureController::class, 'store_items_um'])->name('unit-measure.store_items_um');
Route::post('/unit-measure/update', [UnitMeasureController::class, 'update_um'])->name('unit-measure.update_um');
Route::post('/unit-measure/delete', [UnitMeasureController::class, 'delete'])->name('unit-measure.delete');

//cacai
Route::get('/create', [PricelevelController::class, 'create'])->name('pricelevel.create');
Route::post('/store', [PricelevelController::class, 'store'])->name('pricelevel.store');
Route::get('/index', [PricelevelController::class, 'index'])->name('pricelevel.index');
Route::get('/edit/{id}', [PricelevelController::class, 'edit'])->name('');

// frank
Route::get('/items', [ItemController::class, 'index'])->name('items');
Route::get('/item/import', [ItemController::class, 'import'])->name('item.import');
Route::post('/item/import', [ItemController::class, 'import_post']);


//ken

// items route
Route::get('/items/add-items-page', [ToolsController::class, 'AddItemsPage'])->name('add.items.page');
Route::post('/items/add-items', [ToolsController::class, 'AddItems'])->name('add.items');
Route::get('/items/list-items-page', [ToolsController::class, 'ListItemsPage'])->name('list.items.page');
Route::get('/items/get-items', [ToolsController::class, 'GetItems'])->name('get.items');
Route::post('/items/update-items', [ToolsController::class, 'UpdateItems'])->name('update.items');


// category
Route::get('/category/add-category-page', [ToolsController::class, 'AddCategoryPage'])->name('add.category.page');
Route::post('/category/add-category', [ToolsController::class, 'AddCategory'])->name('add.category');
Route::get('/category/list-category-page', [ToolsController::class, 'ListCategoryPage'])->name('list.category.page');
Route::get('/category/get-category', [ToolsController::class, 'getCategory'])->name('get.category');
Route::post('/category/update-category', [ToolsController::class, 'UpdateCategory'])->name('update.category');

//Classification
Route::get('/class/list-class-page', [ToolsController::class, 'ListClassificationPage'])->name('list.class.page');
Route::post('/class/add-class', [ToolsController::class, 'AddClassification'])->name('add.class');
Route::post('/class/update-class', [ToolsController::class, 'UpdateClassification'])->name('update.class');
// subclassifications
Route::get('/subclass/list-subclass-page/{id}', [ToolsController::class, 'ListSubClassificationPage'])->name('list.subclass.page');
Route::post('/subclass/add-subclass', [ToolsController::class, 'AddSubClassification'])->name('add.subclass');
Route::post('/subclass/update-subclass', [ToolsController::class, 'UpdateSubClassification'])->name('update.subclass');





// employees
Route::get('/employees/add-employees-page', [ToolsController::class, 'AddEmployeesPage'])->name('add.employee.page');
Route::post('/employees/add-employees', [ToolsController::class, 'AddEmployees'])->name('add.employee');
Route::get('/employees/list-employees-page', [ToolsController::class, 'ListEmployeesPage'])->name('list.employee.page');
Route::get('/employees/get-employees', [ToolsController::class, 'getEmployees'])->name('get.employees');
Route::post('/employee/update-employees', [ToolsController::class, 'UpdateEmployee'])->name('update.employee');


require __DIR__.'/auth.php';
