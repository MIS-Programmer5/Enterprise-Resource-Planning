<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <b>Subclassifications</b>
                    <br>
                    <button class="btn btn-success" data-bs-toggle='modal' data-bs-target='#Add-SubClass'>
                        Add
                    </button>
                </div>
                <div class="p-6">
                    <div class="row ">
                        <div class="row">
                            <div class="col-3"><b>Classification:</b></div>
                            <div class="col-3">{{$class->name}}</div>

                            <div class="col-3"><b>Category:</b></div>
                            <div class="col-3">{{$class->category->name}}</div>
                        </div>
                    </div>
                    <br>
                    <table id="" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Subclassification</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($class->SubClass as $data)
                                <tr>
                                    <td>{{ $data->name }}</td>
                                    <td class="col-2">
                                        <button class="btn btn-success" onclick='OnclickUpdateSubClass({!! $data !!})'  data-bs-toggle='modal' data-bs-target='#Update-SubClass' >Update</button>
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>
    {{-- create Modal --}}
    <div class="modal fade" id="Add-SubClass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" id="modal-body" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Classifications </h5>

                </div>
                <div class="modal-body">
                    <form action="{{ route('add.subclass') }}" method="POST">
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
                            <input name="category_id" value="{{$class->category_id}}" type="hidden">
                        </div>
                        <div class="p-2  row">
                            <input name="parent" value="{{$class->id}}" type="hidden">
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <input type="submit" value="Add" class="btn btn-success">
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

    {{-- update modal --}}
    <div class="modal fade" id="Update-SubClass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" id="modal-body" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Subclassifications </h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('update.subclass') }}" method="POST">
                        @csrf
                        <div class="p-2 row">
                            <div class="col-2">
                                Name
                            </div>
                            <div class=" col-6">
                                <input name="name" type="text" id="subclass_name" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">

                            </div>
                        </div>
                        <div class="p-2  row">
                            <div class="col-2">
                                Classification:
                            </div>
                            <div class="col-6">
                                <select name="parent" id="class_id" class="form-control" required>
                                    <option value="" disabled selected>Select Category</option>
                                    @foreach ($classification as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row p-6">
                            <div class="col-2">
                                <input name="category_id" value="{{$class->category_id}}" type="hidden">
                                <input name="id" id="id" type="hidden">

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
            function OnclickUpdateSubClass(data){
                console.log(data);
                $('#subclass_name').val(data.name);
                $('#class_id').val(data.parent);
                $('#id').val(data.id);

            }
        </script>
    @endpush
</x-app-layout>
