<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="dashboard">
                    <header class="p-6">
                        <h2 >Branch List</h2>
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            @endif
                    </header>
                    <div  class="p-6">
                        <table class="table table-striped table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>Branch Name</th>
                                    <th>Branch Code</th>
                                    <th>Address</th>
                                    <th>Type</th>
                                    <th>Contact Number</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($branches as $branch)
                                    <tr>
                                        <td>{{ $branch->branch_name }}</td>
                                        <td>{{ $branch->branch_code }}</td>
                                        <td>{{ $branch->branch_address }}</td>
                                        <td>{{ $branch->branch_type }}</td>
                                        <td>{{ $branch->branch_cell }}</td>
                                        <input id="company_id" name='company_id' type="hidden">
                                        <td>
                                            <div class="button-group">
                                                <a onclick='viewBranch({!! $branch !!})' class="action-btn"
                                                    href="{{ route('branch.show', ['id' => $branch->id]) }}"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                        class="bi bi-eye " viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                                        <path
                                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                                    </svg></a>
                                                <button class="action-btn" data-bs-target="#branchUpdateModal" data-bs-toggle="modal"  onclick='viewBranch({!!$branch!!})'>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen"  viewBox="0 0 16 16">
                                                        <path
                                                            d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z" />
                                                    </svg></button>
                                                <button class="action-btn"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                        <path
                                                            d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                                    </svg></button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- Modal Branch Update-->
    <div class="modal fade" id="branchUpdateModal" tabindex="-1" aria-labelledby="branchUpdateModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('branch.update') }}" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="branchUpdateModalLabel">Update Branch</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form -->
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="branch_name_update" class="form-label">Branch Name</label>
                                <input type="text" class="form-control" id="branch_name_update" name="branch_name">
                            </div>
                            <div class="col-md-6">
                                <label for="branch_code_update" class="form-label">Branch Code</label>
                                <input type="text" class="form-control" id="branch_code_update" name="branch_code">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="branch_type_update" class="form-label">Branch Type</label>
                                <select  class="form-control" id="branch_type_update" name="branch_type">
                                        <option value="0" selected disabled>Select Branch Type</option>
                                        <option value="Branch">Branch</option>
                                        <option value="Warehouse">Warehouse</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="branch_cell_update" class="form-label">Contanct No.</label>
                                <input type="text" class="form-control" id="branch_cell_update" name="branch_cell">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="branch_email_update" class="form-label">Email</label>
                                <input type="text" class="form-control" id="branch_email_update" name="branch_email">
                            </div>
                            <div class="col-md-6">
                                <label for="branch_address_update" class="form-label">Branch Address</label>
                                <input type="text" class="form-control" id="branch_address_update" name="branch_address">
                            </div>

                        </div>
                        <input id="branch_id" name='branch_id' type="hidden">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" value="Update" CLASS = "btn btn-outline-success">
                </div>
            </div>

            </form>

        </div>
    </div>

    <!-- Modal Branch Update-->
    {{-- <div class="modal fade" id="create-branch-modal" tabindex="-1" aria-labelledby="branchUpdateModal"
        aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('branch.store') }}" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="branchUpdateModalLabel">Add Branch</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form -->
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="branch_name_update" class="form-label">Branch Name</label>
                                    <input type="text" class="form-control" id="branch_name" name="branch_name">
                                </div>
                                <div class="col-md-6">
                                    <label for="branch_code_update" class="form-label">Branch Code</label>
                                    <input type="text" class="form-control" id="branch_code" name="branch_code">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="branch_type_update" class="form-label">Branch Type</label>
                                    <select  class="form-control" id="" name="branch_type">
                                        <option value="0" selected disabled>Select Branch Type</option>
                                        <option value="Branch">Branch</option>
                                        <option value="Warehouse">Warehouse</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="branch_cell_update" class="form-label">Contanct No.</label>
                                    <input type="text" class="form-control" id="branch_cell" name="branch_cell">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="branch_email_update" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="branch_email" name="branch_email">
                                </div>

                                <div class="col-md-6">
                                    <label for="branch_address_update" class="form-label">Branch Address</label>
                                    <input type="text" class="form-control" id="branch_address" name="branch_address">
                                </div>

                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" value="Add" CLASS = "btn btn-outline-success">
                    </div>
                </div>
            </form>

        </div>
    </div> --}}
    @push('scripts')
        <script>


            function viewBranch(data) {
                console.log(data);
                document.getElementById('branch_name_update').value = data.branch_name;
                document.getElementById('branch_code_update').value = data.branch_code;
                document.getElementById('branch_type_update').value = data.branch_type;
                document.getElementById('branch_cell_update').value = data.branch_cell;
                document.getElementById('branch_email_update').value = data.branch_email;
                document.getElementById('branch_address_update').value = data.branch_address;
                document.getElementById('branch_id').value = data.id;

            }
        </script>
    @endpush
    </x-app-layout>
