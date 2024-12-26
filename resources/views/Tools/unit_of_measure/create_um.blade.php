<x-app-layout>
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container mt-5">
                <div class="row">
                     <div class="col-md-12">
                        {{-- items info --}}
                         <div class="card">
                            <div class="card-header">
                                Items Details
                            </div>
                            <div class="card-body">
                                     <!-- item name -->
                                    <div class="row">
                                        <div class="col-3">
                                            <span for="item_name">Name: </span><span><b>{{ $item->name}}</b></span>
                                        </div>
                                        <div class="col-3">
                                            <span for="item_id">Code: </span><span><b>{{ $item->code}}</b></span>
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="col-3">
                                            <span >Category: </span><span><b>{{ $item->category->name ?? null  }}</b></span>
                                        </div>
                                        <div class="col-3">
                                            <span >Classification: </span><span><b>{{ $item->class->name ?? null }}</b></span>
                                        </div>
                                        <div class="col-3">
                                            <span >Subclassification: </span><span><b>{{ $item->subclass->name ?? null }}</b></span>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <br>
                        <!-- Item Unit Of Measurement -->
                        <div class="card">
                            <div class="card-header">
                                Item Unit of Measurement
                            </div>
                            <div class="card-body">
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
                                <form method="POST" action="{{ route('unit-measure.store') }}">
                                    @csrf
                                     <!-- item name -->

                                        <div class="card-body">

                                            <div class="form-group d-flex row">
                                                <div class="col-6">
                                                    <label for="quantity">Unit of Measure</label>
                                                    <input type="text"  class="form-control" name="um_name" id="name">
                                                </div>
                                                 <div class="col-6">
                                                    <label for="quantity">Unit Code</label>
                                                    <input type="text"  class="form-control" name="um_code" id="code">
                                                </div>
                                                <div class="col-6">
                                                    <label for="quantity">Quantity</label>
                                                    <input type="number" step="0.01" class="form-control" name="quantity" id="quantity">
                                                </div>
                                                <div class="col-6">
                                                    <label for="price_level">Unit Type</label>
                                                    <select name="unit_type" class="form-control">
                                                        <option value="1"> Base Unit </option>
                                                        <option value="2"> Subunit </option>
                                                    </select>
                                                </div>
                                                 <div class="col-6">
                                                    <label for="price_level">Base Unit</label>
                                                    <select name="parent" class="form-control">
                                                        <option value=""></option>
                                                        @foreach ($baseunits as $unit)
                                                            <option value="{{ $unit->id }}">{{ $unit->um_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <br>
                                            <input type="hidden" class="form-control" name="item_id" value="{{ $item->id }}">
                                            <button type="submit" class="btn btn-primary mb-2">Save</button>
                                        </div>

                                </form>
                                <div class="row">
                                    <!-- table -->
                                    <div class="col-md-12">
                                        <table class="table table-striped" id="umTable">
                                            <thead>
                                                <tr>
                                                    <th>Unit</th>
                                                    <th>Code</th>
                                                    <th>Unit Symbol</th>
                                                    <th>Quantity</th>
                                                    <th>Unit Type</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($item->UnitOfMeasure as $uom)
                                                <tr>

                                                    <td>{{ $uom->um_name }}</td>
                                                    <td>{{ $uom->um_code }}</td>
                                                    <td>{{ $uom->quantity }}</td>
                                                    <td>{{ $uom->unit_type > 1 ? "Subunit" : "Base Unit"}}</td>
                                                     <td>
                                                        <a href="#" class="btn btn-primary" data-toggle="modal"
                                                            data-target="#editModal" data-id="{{ $uom->id }}"
                                                            data-quantity="{{ $uom->quantity }}" data-price="{{ $uom->price ?? null  }}">Edit</a>
                                                        <a href="#" class="btn btn-danger">Delete</a>
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

                </div>
            </div>
        </div>
    </div>

        <!-- Edit Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Quantity and Price</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editForm">
                            <input type="hidden" name="id" id="id">

                            <div class="form-group">
                                <label for="edit-quantity">Quantity</label>
                                <input type="number" step="0.01" class="form-control" name="u_quantity"
                                    id="u_quantity">
                            </div>
                            <div class="form-group">
                                <label for="edit-price">Custom Price</label>
                                <input type="number" step="0.01" class="form-control" name="u_price" id="u_price" readonly>
                            </div>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @push('scripts')

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/tagify"></script>
    <script>
            $('#quantity, #price').on('input', function() {
                var quantity = $('#quantity').val();
                var price = $('#cost').val();
                var customPrice = quantity * price;
                $('#price').val(customPrice);
            });

            $('#u_quantity').on('input', function() {
                var quantity = $('#u_quantity').val();
                var price = $('#cost').val();
                var customPrice = quantity * price;
                $('#u_price').val(customPrice);
            });
            $('#editModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var quantity = button.data('quantity');
                var price = button.d8ata('price');
                var modal = $(this);
                modal.find('#u_quantity').val(quantity);
                modal.find('#u_price').val(price);
                modal.find('#id').val(id);
            });
            $('#editForm').submit(function(e) {
                e.preventDefault();
                var id = $('#editModal').find('#id').val();
                var quantity = $('#editModal').find('#u_quantity').val();
                var price = $('#editModal').find('#u_price').val();
                $.ajax({
                    type: 'post',
                    url: '{{ route('unit-measure.update_um') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        u_quantity: quantity,
                        u_price: price
                    },
                    success: function(data) {
                        $('#editModal').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Data updated successfully'
                        });



                    },
                    error: function(data) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: data.responseJSON.message
                        });
                    }
                });
            });
            // delete ITEMS UM
            $('tr').on('click', '.btn-danger', function(e) {
                e.preventDefault();
                var id = $(this).closest('tr').find('td').eq(0).find('a').data('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'post',
                            url: '{{ route('unit-measure.delete') }}',
                            data: {
                                _token: '{{ csrf_token() }}',
                                id: id
                            },
                            success: function(data) {
                                Swal.fire(
                                    'Deleted!',
                                    'The record has been deleted.',
                                    'success'
                                );
                                // reload the page
                                location.reload();
                            },
                            error: function(data) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: data.responseJSON.message
                                });
                            }
                        });
                    }
                });
            });
        </script>
    @endpush

    </x-app-layout>
