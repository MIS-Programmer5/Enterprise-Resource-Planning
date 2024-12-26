<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

            <div class="p-6">
                 <h1>List</h1>
                <a href="{{ route('add.category.page') }}" class="btn btn-success">
                    Add
                </a>
            </div>

             <div class="p-6">
                    <table id="category-list-table" class="table table-striped">
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- modal --}}
     <div class="modal fade" id="UpdateItems" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" id="modal-body" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Items</h5>
                </div>
                <div class="modal-body">
                       <form onsubmit="UpdateCategory(event)"  action="" method="posts">
                        @csrf
                         <div class="p-2 row">
                             <div class="col-2">
                               Categories Name
                            </div>
                            <div class="p-2  col-6">
                                <input name="name" type="text" id="category_name" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                            </div>
                        </div>
                         <div class="p-2 row">
                             <div class="col-2">
                               Item Alias
                            </div>
                            <div class="p-2  col-6">
                                <select name="item_alias" id="item_alias" class="form-control" required>
                                    <option value="" disabled selected>Select Alias</option>
                                    <option value="PARTNUMBER">PARTNUMBER</option>
                                    <option value="SERIAL">SERIAL</option>
                                    <option value="ENGINE NO.">ENGINE NO.</option>
                                    <option value="SKU">SKU</option>
                               </select>
                            </div>
                        </div>
                        <div class="p-2 row">
                             <div class="col-2">
                               Quantity Type
                            </div>
                            <div class="p-2  col-6">
                                <select name="qty_type" id="qty_type" class="form-control" required>
                                    <option value="" disabled selected>Select Type</option>
                                    <option value="MULTIPLE">MULTIPLE</option>
                                    <option value="SINGLE">SINGLE</option>
                               </select>
                            </div>
                        </div>

                        <div class="p-2  row">
                             <div class="col-2">
                             Description
                            </div>
                            <div class="col-6">
                                <textarea name="description" id="description" class="form-control"></textarea>
                            </div>
                        </div>

                         <div class="row p-6">
                             <div class="col-5">
                                <input name="id" type="hidden" id="id" >
                            </div>
                            <div class="col-2">
                               <button type="submit" class="btn btn-success">Update</button>

                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

     @push('scripts')
    <script>
        // Your JavaScript code here

      let items = $('#category-list-table').DataTable({
                    responsive: true,
                    destroy: true,  // Corrected capitalization
                    paging: false,
                    searching: false,
                    scrollX: true,
                    pageLength: 50,
                    lengthMenu: [
                        [5, 30, 50, 100, 250, 500, -1],
                        [5, 30, 50, 100, 250, 500, "All"]
                    ],
                    order: [2],
                    columns: [
                        { data: 'name', title: "<b class='text-nowrap'> Category</b>" },
                        { data: 'item_alias', title: "<b class='text-nowrap'>Item Alias</b>" },
                        { data: 'qty_type', title: "<b class='text-nowrap'>Qty Type</b>" },
                        { data: 'description', title: "<b class='text-nowrap'>Description</b>" },
                        { data: null, title: "<b class='text-nowrap'> Active</b>" }
                    ],
                    columnDefs: [
                        { targets: [0], className: "text-nowrap col-1" },
                        { targets: [1], className: "text-nowrap col-1" },
                        { targets: [2], className: "text-nowrap col-1" },
                        { targets: [3], className: "text-nowrap col-1" },
                        {
                            targets: [4],

                            className: "text-nowrap col-1",
                            render: function(data, type, row) {
                                return `<button onclick='onclickItems(${JSON.stringify(data)})'  data-bs-toggle='modal' data-bs-target='#UpdateItems' class='btn btn-warning'>Update</button>
                               `;
                            }
                        }
                    ]
                });


        document.addEventListener('DOMContentLoaded', async function() {
            await getCategories();
        });


        function getCategories(){
            try {
                axios.get('/category/get-category')
                    .then(function(response) {
                      RenderItemsTable(response.data);
                    }).catch(function(error) {
                        Swal.fire(
                            'Request Failed',
                            error,
                            'error'
                        );
                        console.log(error);
                    });

            } catch (error) {
                 Swal.fire('Request Failed', error, 'error');
                 console.log(error);
            }
        }
        function UpdateCategory(event){
            try {
                    event.preventDefault();
                    let form = event.target; // Get the form element
                    let formData = new FormData(form); // Get form data
                    axios.post('/category/update-category', formData)
                    .then(function(response) {
                        Swal.fire(
                            'Add Succeded',
                            response.data,
                            'success',
                        );
                        getCategories();
                    })
                    .catch(function(error) {
                        Swal.fire(
                            'Request Failed',
                            error,
                            'error'
                        );
                        console.log(error);
                    });

            } catch (error) {
                 Swal.fire('Request Failed', error, 'error');
                 console.log(error);
            }

        }
        function RenderItemsTable(data){
            try {
            items.search('').columns().search('').clear().draw();
            items.rows.add(data).draw(true);

            } catch (error) {
                console.log(error);

            }

        }
        function onclickItems(data){
            try {

                $('#category_name').val(data.name);
                $('#description').val(data.description);
                $('#item_alias').val(data.item_alias);
                $('#qty_type').val(data.qty_type);
                $('#id').val(data.id);


                console.log(data);
            }catch(error){
                 console.log(error);
            }

        }

    </script>
    @endpush
</x-app-layout>


