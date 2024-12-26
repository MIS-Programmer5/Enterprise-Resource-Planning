<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-gray-800">Items</h3>
                        <a href="" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">New Item</a>
                    </div>
                    <table class="w-full mt-4" id="items-table">
                        <thead>
                            <tr>
                                <th class="text-left">Actions</th>
                                <th class="text-left">Code</th>
                                <th class="text-left">Name</th>
                                <th class="text-left">Cost</th>
                                <th class="text-left">Quantity</th>
                                <th class="text-left">UM</th>
                                <th class="text-left">Category</th>
                                <th class="text-left">Classification</th>
                                <th class="text-left">Brand</th>
                                <th class="text-left">Supplier</th>
                                <th class="text-left">Price</th>
                                <th class="text-left">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="scripts">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
                axios.get('/items-data')
                    .then(function (response) {
                        $('#items-table').DataTable({
                            processing: true,
                            serverSide: true,
                            data: response.data.data,
                            columns: [
                                { data: 'actions', name: 'actions', orderable: false, searchable: false },
                                { data: 'code', name: 'code' },
                                { data: 'name', name: 'name' },
                                { data: 'cost', name: 'cost' },
                                { data: 'quantity', name: 'quantity' },
                                { data: 'unit_measure', name: 'unit_measure' },
                                { data: 'category', name: 'category' },
                                { data: 'classification', name: 'classification' },
                                { data: 'brand', name: 'brand' },
                                { data: 'supplier', name: 'supplier' },
                                { data: 'price', name: 'price' },
                                { data: 'status', name: 'status' }
                            ]
                        });
                    })
                    .catch(function (error) {
                        console.error('There was an error fetching the items!', error);
                    });
            });
        </script>
    </x-slot>
</x-app-layout>
