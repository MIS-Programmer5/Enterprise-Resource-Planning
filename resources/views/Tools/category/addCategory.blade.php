<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <span class="">Add Categories </span>

            <a href="{{ route('list.category.page') }}" class="btn btn-success">
                    list
            </a>


             <div class="">
                    <form onsubmit="AddCategory(event)"  action="" method="get">
                        @csrf

                        <div class="p-2 row">
                             <div class="col-2">
                               Categories Name
                            </div>
                            <div class="p-2  col-6">
                                <input name="name" type="text" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" required>
                            </div>
                        </div>
                        <div class="p-2 row">
                             <div class="col-2">
                               Item Alias
                            </div>
                            <div class="p-2  col-6">
                                <select name="item_alias" id="" class="form-control" required>
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
                                <select name="qty_type" id="" class="form-control" required>
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
                                <textarea name="description" class="form-control" required></textarea>
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
        function AddCategory(event){
            try {

                    event.preventDefault();
                    let form = event.target; // Get the form element
                    let formData = new FormData(form); // Get form data
                    axios.post('/category/add-category', formData)
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

