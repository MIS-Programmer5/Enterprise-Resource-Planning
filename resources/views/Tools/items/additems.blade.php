<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <h1 class="p-6">Add Items</h1>
            <div class="p-6">
                <a href="{{ route('list.items.page') }}">
                    <button class="btn btn-success">
                        List
                    </button>
                 </a>
            </div>
             <div class="p-6">
                    <form onsubmit="Additems(event)"  action="" method="post">
                        @csrf
                        <div class="p-2 row">
                             <div class="col-2">
                               Item Name
                            </div>
                            <div class="p-2  col-6">
                                <input name="name" type="text" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                            </div>
                        </div>
                         <div class="p-2  row">
                             <div class="col-2">
                               Item Code
                            </div>
                            <div class="col-6">
                                <input name="code" type="text" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                            </div>
                        </div>
                         <div class="p-2  row">
                                <input name="cost_id" value="1" type="hidden" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                        </div>
                         <div class="p-2  row">
                             <div class="col-2">
                              Category
                            </div>
                            <div class="col-6">
                               <select name="category_id" id="" class="form-control" >
                                <option value="" disabled selected>Select Category</option>
                                @foreach ($category as $data)
                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                @endforeach
                               </select>
                            </div>
                        </div>

                         <div class="p-2  row">
                             <div class="col-2">
                               Classification
                            </div>
                            <div class="col-6">
                               <select name="class_id" id="" class="form-control" >
                                <option value="" disabled selected>Select Classification</option>
                                 @foreach ($class as $data)
                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                @endforeach
                               </select>
                            </div>
                        </div>
                        <div class="p-2  row">
                             <div class="col-2">
                              Sub Class
                            </div>
                            <div class="col-6">
                                <select name="sub_class_id" id="" class="form-control" >
                                    <option value="" disabled selected>Select Sub Classification</option>
                                    @foreach ($subclass as $data)
                                        <option value="{{$data->id}}">{{$data->name}}</option>
                                    @endforeach
                               </select>
                            </div>
                        </div>
                         <div class="p-2  row">
                             <div class="col-2">
                              Status
                            </div>
                            <div class="col-6">
                                <select name="status_id" id="" class="form-control" >
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
                            </div>
                            <div class="col-2">
                                <input type="submit" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
     @push('scripts')
    <script>
        // Your JavaScript code here
        function Additems(event){
            try {

                    event.preventDefault();
                    let form = event.target; // Get the form element
                    let formData = new FormData(form); // Get form data
                    axios.post('/items/add-items', formData)
                    .then(function(response) {
                        Swal.fire(
                            'Add Succeded',
                            response.data,
                            'success',
                        );
                            form.reset();
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



    </script>
    @endpush
</x-app-layout>

