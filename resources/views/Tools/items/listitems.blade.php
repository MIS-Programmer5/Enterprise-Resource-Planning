<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <h1 class="p-6">List</h1>
                <a class="p-6" href="{{ route('add.items.page') }}">
                    <button class="btn btn-success">
                        Add
                    </button>
                 </a>
             <div class="p-6">.
                    <table id="items-list-table" class="table table-bordered">
                        <thead>
                            <tr>
                                 <th>Item Name</th>
                                 <th>Code</th>
                                 <th>Category</th>
                                 <th>Class</th>
                                 <th>Subclass</th>
                                 <th>Status</th>
                                 <th>Action</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($items as $data)
                                <tr>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->code }}</td>
                                    <td>{{ $data->category->name }}</td>
                                    <td>{{ $data->class->name ?? "null" }}</td>
                                    <td>{{ $data->subclass->name ?? "null" }}</td>
                                    <td></td>

                                    <td>
                                        <button onclick='onclickItems({!! $data !!})'  data-toggle='modal' data-target='#UpdateItems' class='btn btn-warning'> Update </button>

                                                <a href='/unit-measure/{{$data->id}}' class="btn btn-success"> Unit Of Measure </button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Update Items --}}
     <div class="modal fade" id="UpdateItems" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" id="modal-body" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Items</h5>

                </div>
                <div class="modal-body">
                       <form onsubmit="Updateitems(event)"  action="" method="posts">
                        @csrf

                        <div class="p-2  row">
                             <div class="col-2">
                               Item Name
                            </div>
                            <div class=" col-6">
                                <input name="name" type="text" id="name" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                            </div>
                        </div>

                         <div class="p-2  row">
                             <div class="col-2">
                               Item Code
                            </div>
                            <div class="col-6">
                                <input name="code" type="text" id="code" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                            </div>
                        </div>

                         <div class="p-2  row">
                             <div class="col-2">
                               Cost
                            </div>
                            <div class="col-6">
                                <input name="cost" type="text" id="cost" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                            </div>
                        </div>

                         <div class="p-2  row">
                             <div class="col-2">
                              Category
                            </div>
                            <div class="col-6">
                               <select name="category_id" id="category" class="form-control" >
                                <option value="" disabled selected>Select Category</option>
                                <option value="1">Spare Parts</option>
                                <option value="2">Appliance</option>
                                <option value="3">Motorcycle</option>
                                <option value="4">Furniture</option>

                               </select>
                            </div>
                        </div>

                         <div class="p-2  row">
                             <div class="col-2">
                               Classification
                            </div>
                            <div class="col-6">
                               <select name="class_id" id="class" class="form-control" >
                                <option value="" disabled selected>Select Classification</option>
                                <option value="1">Genuine</option>
                                <option value="2">Replacement</option>
                                <option value="3">Apparells</option>
                                <option value="4">Accessories</option>
                               </select>
                            </div>
                        </div>

                        <div class="p-2  row">
                             <div class="col-2">
                              Sub Class
                            </div>
                            <div class="col-6">
                                <select name="sub_class_id" id="subclass" class="form-control" >
                                    <option value="" disabled selected>Select Sub Classification</option>
                                    <option value="1">Tube</option>
                                    <option value="2">Tubeless</option>
                                    <option value="3">Gear Oil</option>
                                    <option value="4">Engine Oil</option>
                               </select>
                            </div>
                        </div>
                         <div class="p-2  row">
                             <div class="col-2">
                              Status
                            </div>
                            <div class="col-6">
                                <select name="status_id" id="status" class="form-control" >
                                    <option value="" disabled selected>Select Status</option>
                                    <option value="1">Superceded</option>
                                    <option value="2">Damage</option>
                                    <option value="3">Brand New</option>
                                    <option value="4">Sold</option>
                               </select>
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




        document.addEventListener('DOMContentLoaded', async function() {
            await getItems();
        });


        function getItems(){
            try {
                axios.get('/items/get-items')
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

        function Updateitems(event){
            try {
                    event.preventDefault();
                    let form = event.target; // Get the form element
                    let formData = new FormData(form); // Get form data
                    axios.post('/items/update-items', formData)
                    .then(function(response) {
                        let icon;
                        if(response.data.success){
                            icon = 'success';
                            title='Updated';

                        }else{
                            icon = 'error';
                            title='Error';
                        }

                        Swal.fire(
                            title,
                            response.data.message,
                            icon,
                        );
                        getItems();
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

                $('#name').val(data.name);
                $('#code').val(data.code);
                $('#cost').val(data.cost);
                $('#category').val(data.category_id);
                $('#class').val(data.class_id);
                $('#subclass').val(data.sub_class_id);
                $('#status').val(data.status_id);
                $('#id').val(data.id);
                console.log(data);
            }catch(error){
                 console.log(error);
            }

        }

    </script>
    @endpush
</x-app-layout>


