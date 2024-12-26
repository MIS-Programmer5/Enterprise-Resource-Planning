<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <b>Classification List</b>

                    <br>

                    <button class="btn btn-success" data-bs-toggle='modal' data-bs-target='#Add-Class'>
                        Add
                    </button>
                    <br>
                    <br>

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                     @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                </div>
                <div class="p-6">
                    <table id="" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Classification</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($class as $data)
                                <tr>
                                    <td>{{ $data->name }}</td>
                                   <td>{{ $data->category->name  }}</td>
                                    <td class="col-2">
                                        <button class="btn btn-success" onclick='UpdateModalClass({!! $data !!})' data-bs-toggle='modal' data-bs-target='#Update-Class' >Update</button>
                                        <button onclick="window.location='{{route('list.subclass.page',['id'=>$data->id] )}}'" class="btn btn-success">Details</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="Add-Class" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" id="modal-body" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Classifications </h5>

                </div>
                <div class="modal-body">
                    <form action="{{ route('add.class') }}" method="POST">
                        @csrf

                        <div class="p-2 row">
                            <div class="col-2">
                                Name
                            </div>
                            <div class=" col-6">
                                <input name="name" type="text" id="name"
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">

                            </div>
                        </div>

                        <div class="p-2  row">
                            <div class="col-2">
                                Category
                            </div>
                            <div class="col-6">
                                <select name="category_id" id="category" class="form-control" required>
                                    <option value="" disabled selected>Select Category</option>
                                    @foreach ($category->all() as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row p-6">
                            <div class="col-2">
                                <input type="submit" value="Submit" class="btn btn-success">

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

    {{-- Update Modal --}}
     <div class="modal fade" id="Update-Class" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" id="modal-body" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Classifications </h5>

                </div>
                <div class="modal-body">
                    <form action="{{ route('update.class') }}" method="POST">
                        @csrf

                        <div class="p-2 row">
                            <div class="col-2">
                                Name
                            </div>
                            <div class=" col-6">
                                <input name="name" type="text" id="class_name"  class="form-control">
                            </div>
                        </div>

                        <div class="p-2  row">
                            <div class="col-2">
                                Category
                            </div>
                            <div class="col-6">
                                <select name="category_id" id="class_category" class="form-control" required>
                                    <option value="" disabled selected>Select Category</option>
                                    @foreach ($category->all() as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row p-6">
                            <div class="col-2">
                                <input type="hidden" id="class_id" name="id">
                                <input type="submit" value="Submit" class="btn btn-success">

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
            function UpdateModalClass(data){
                console.log(data);
                $('#class_name').val(data.name);
                $('#class_category').val(data.category_id);
                $('#class_id').val(data.id);
            }



        </script>
    @endpush
</x-app-layout>
