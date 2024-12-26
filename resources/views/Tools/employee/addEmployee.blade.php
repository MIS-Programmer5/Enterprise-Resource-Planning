<x-app-layout>
    <x-slot name="header">
        <span class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employee') }}
        </span>
        <x-nav-link :href="route('list.employee.page')" :active="request()->routeIs('add.items')">
            <span class="p-6  font-semibold text-xl text-gray-800 leading-tight">
                {{ __('List') }}
            </span>
        </x-nav-link>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <h1 class="p-6"><b>Add Employees</b></h1>
             <div class="p-6">
                    <form onsubmit="AddEmployees(event)"  action="" method="get">
                        @csrf
                        <div class="p-2 row">
                             <div class="col-2">
                               Fist Name :
                            </div>
                            <div class="p-2  col-6">
                                <input name="first_name" type="text" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                            </div>
                        </div>

                         <div class="p-2 row">
                             <div class="col-2">
                               Last Name
                            </div>
                            <div class="p-2  col-6">
                                <input name="last_name" type="text" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                            </div>
                        </div>

                         <div class="p-2 row">
                            <div class="col-2">
                               Middle Name
                            </div>
                            <div class="p-2  col-6">
                                <input name="middle_name" type="text" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                            </div>
                        </div>

                         <div class="p-2  row">
                             <div class="col-2">
                               Email
                            </div>
                            <div class="col-6">
                                <input name="email" type="email" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                            </div>
                        </div>

                         <div class="p-2  row">
                             <div class="col-2">
                             Phone No.
                            </div>
                            <div class="col-6">
                                <input name="phone_no" type="text" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                            </div>
                        </div>

                         <div class="p-2  row">
                             <div class="col-2">
                             Address
                            </div>
                            <div class="col-6">
                                <textarea name="address" class="form-control"></textarea>
                            </div>
                        </div>

                         <div class="p-2  row">
                             <div class="col-2">
                              Postal Code
                            </div>
                            <div class="col-6">
                               <input name="postal_code" type="text" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                            </div>
                        </div>

                        <div class="p-2  row">
                             <div class="col-2">
                              ID No.
                            </div>
                            <div class="col-6">
                               <input name="id_no" type="text" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                            </div>
                        </div>

                        <div class="p-2  row">
                             <div class="col-2">
                              Status
                            </div>
                            <div class="col-6">
                                <select name="status" id="" class="form-control" >
                                    <option value="" disabled selected>Select Status</option>
                                    <option value="1">Regular</option>
                                    <option value="2">Intern</option>
                                    <option value="3">OJT</option>
                                    <option value="4">Trainee</option>
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
        function AddEmployees(event){
            try {
                    event.preventDefault();
                    let form = event.target; // Get the form element
                    let formData = new FormData(form); // Get form data
                    axios.post('/employees/add-employees', formData)
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

