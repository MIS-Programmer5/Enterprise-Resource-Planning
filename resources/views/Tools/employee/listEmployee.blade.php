<x-app-layout>
    <x-slot name="header">
        <x-nav-link :href="route('add.employee.page')" :active="request()->routeIs('add.items')">
            <span class="p-6  font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Add') }}
            </span>
        </x-nav-link>

        <x-nav-link :href="route('list.items.page')" :active="request()->routeIs('add.items')">
            <span class="p-6  font-semibold text-xl text-gray-800 leading-tight">
                {{ __('List') }}
            </span>
        </x-nav-link>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <h1 class="p-6">List</h1>
             <div class="p-6">
                    <table id="employee-list-table" class="table-bordered">
                    </table>
                </div>
            </div>
        </div>
    </div>

     <div class="modal fade" id="UpdateItems" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" id="modal-body" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Items</h5>

                </div>
                <div class="modal-body">
                       <form onsubmit="Updateitems(event)"  action="" method="posts">
                        @csrf
                          <div class="p-2 row">
                             <div class="col-2">
                               Fist Name :
                            </div>
                            <div class="p-2  col-6">
                                <input name="first_name" id="fname" type="text" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                            </div>
                        </div>

                         <div class="p-2 row">
                             <div class="col-2">
                               Last Name
                            </div>
                            <div class="p-2  col-6">
                                <input name="last_name" id="lname" type="text" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                            </div>
                        </div>

                         <div class="p-2 row">
                            <div class="col-2">
                               Middle Name
                            </div>
                            <div class="p-2  col-6">
                                <input name="middle_name" id="mname" type="text" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                            </div>
                        </div>

                         <div class="p-2  row">
                             <div class="col-2">
                               Email
                            </div>
                            <div class="col-6">
                                <input name="email" id="email" type="email" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                            </div>
                        </div>

                         <div class="p-2  row">
                             <div class="col-2">
                             Phone No.
                            </div>
                            <div class="col-6">
                                <input name="phone_no" id="phone_no" type="text" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                            </div>
                        </div>

                         <div class="p-2  row">
                             <div class="col-2">
                             Address
                            </div>
                            <div class="col-6">
                                <textarea name="address" id="address" class="form-control"></textarea>
                            </div>
                        </div>

                         <div class="p-2  row">
                             <div class="col-2">
                              Postal Code
                            </div>
                            <div class="col-6">
                               <input name="postal_code" id="postal_code" type="text" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                            </div>
                        </div>

                        <div class="p-2  row">
                             <div class="col-2">
                              ID No.
                            </div>
                            <div class="col-6">
                               <input name="id_no" id="id_no" type="text" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                            </div>
                        </div>

                        <div class="p-2  row">
                             <div class="col-2">
                              Status
                            </div>
                            <div class="col-6">
                                <select name="status" id="status" class="form-control" >
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
                                <input name="id" type="hidden" id="id" >

                            </div>
                            <div class="col-2">
                               <button type="submit" class="btn btn-success">Update</button>

                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

     @push('scripts')
    <script>
        // Your JavaScript code here

      let employees = $('#employee-list-table').DataTable({
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
                        { data: null, title: "<b class='text-nowrap'>Name</b>" },
                        { data: 'email', title: "<b class='text-nowrap'>Email</b>" },
                        { data: 'phone_no', title: "<b class='text-nowrap'> Phone Number </b>" },
                        { data: 'address', title: "<b class='text-nowrap'> Address </b>" },
                        { data: 'postal_code', title: "<b class='text-nowrap'> Postal Code</b>" },
                        { data: 'id_no', title: "<b class='text-nowrap'>ID No.</b>" },
                        { data: 'status', title: "<b class='text-nowrap'> Status</b>" },
                        { data: null, title: "<b class='text-nowrap'> Active</b>" }
                    ],
                    columnDefs: [
                        {  targets: [0],
                            width: '20%',
                            className: "text-nowrap col-1",
                            render: function(data, type, row) {
                                return data.last_name+`, `+data.first_name+` `+data.middle_name;
                            }
                        },
                        { targets: [1], width: '20%', className: "text-nowrap col-1" },
                        { targets: [2], width: '20%', className: "text-nowrap col-1" },
                        { targets: [3], width: '20%', className: "text-nowrap col-1" },
                        { targets: [4], width: '20%', className: "text-nowrap col-1" },
                        { targets: [5], width: '20%', className: "text-nowrap col-1" },
                        { targets: [6], width: '20%', className: "text-nowrap col-1" },
                        {
                            targets: [7],
                            width: '20%',
                            className: "text-nowrap col-1",
                            render: function(data, type, row) {
                                return `<button onclick='onclickEmployee(`+JSON.stringify(data)+`)'  data-toggle='modal' data-target='#UpdateItems' class='btn btn-warning'> Update </button>`;
                            }
                        }
                    ]
                });


        document.addEventListener('DOMContentLoaded', async function() {
            await getEmployees();
        });


        function getEmployees(){
            try {
                axios.get('/employees/get-employees')
                    .then(function(response) {
                      RenderEmployeesTable(response.data);
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

        function RenderEmployeesTable(data){
            try {
                employees.search('').columns().search('').clear().draw();
                employees.rows.add(data).draw(true);

            } catch (error) {
                console.log(error);
            }
        }

        function onclickEmployee(data){
            try {
                $('#fname').val(data.first_name);
                $('#lname').val(data.last_name);
                $('#mname').val(data.middle_name);
                $('#email').val(data.email);
                $('#phone_no').val(data.phone_no);
                $('#address').val(data.address);
                $('#postal_code').val(data.postal_code);
                $('#id_no').val(data.id_no);
                $('#status').val(data.status);
                $('#id').val(data.id);
                console.log(data);
            }catch(error){
                 console.log(error);
            }

        }

    </script>
    @endpush
</x-app-layout>


