  @extends('layouts.master')
  @section('content')
      <!-- Branch Create Modal-->
      <div class="dashboard">
          <div>
              <div>
                  <div class="modal-header">
                      <h4 class="modal-title" id="branchCreateModalLabel">Branch Form</h4>

                  </div>
                  <div class="modal-body">
                      <!-- Form -->
                      <form action="{{ route('branch.store') }}" method="POST">
                          @csrf
                          <div class="row mb-3">
                              <div class="col-md-6">
                                  <label for="supp_name" class="form-label">Branch Name</label>
                                  <input type="text" class="form-control" id="branch_name" name="branch_name" required>
                              </div>
                              <div class="col-md-6">
                                  <label for="branch_code" class="form-label">Branch Code</label>
                                  <input type="text" class="form-control" id="branch_code" name="branch_code" required>
                              </div>
                          </div>
                          <div class="row mb-3">
                              <div class="col-md-6">
                                  <label for="contact_no_1" class="form-label">Branch Type</label>
                                  <input type="text" class="form-control" id="contact1" name="branch_type" required>
                              </div>
                              <div class="col-md-6">
                                  <label for="branch_cell" class="form-label" required>Contact Number</label>
                                  <input type="text" class="form-control" id="branch_cell" name="branch_cell">
                              </div>
                          </div>
                          <div class="row mb-3">
                              <div class="col-md-6">
                                  <label for="branch_email" class="form-label">Email Address</label>
                                  <input type="text" class="form-control" id="branch_email" name="branch_email" required>
                              </div>

                              <div class="col-md-6">
                                  <label for="branch_address" class="form-label">Branch Address</label>
                                  <input type="text" class="form-control" id="branch_address" name="branch_address"
                                      required>
                              </div>
                          </div>
                          <div class="row mb-3">
                              <div class="col-md-6">
                                  <label for="options" class="form-label">Select Company</label>
                                  <select id="options" name="company_id" class="form-control" required
                                      onchange="fetchcompany(this.value)">
                                      @foreach ($companies as $company)
                                          <option value="{{ $company->id }}">
                                              {{ $company->company_name }}
                                          </option>
                                      @endforeach
                                  </select>
                              </div>


                          </div>
                          <div class="modal-footer">
                              <a type="button" class="btn btn-secondary" href="\branch_list">Back <svg
                                      xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor"
                                      class="bi bi-reply-fill" viewBox="0 0 16 16">
                                      <path
                                          d="M5.921 11.9 1.353 8.62a.72.72 0 0 1 0-1.238L5.921 4.1A.716.716 0 0 1 7 4.719V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z" />
                                  </svg> </a>
                              <div style="padding-left: 10px">
                                  <button type="submit" CLASS = "btn btn-outline-success"> Save <svg
                                          xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                          fill="currentColor" class="bi bi-floppy2-fill" viewBox="0 0 16 16">
                                          <path d="M12 2h-2v3h2z" />
                                          <path
                                              d="M1.5 0A1.5 1.5 0 0 0 0 1.5v13A1.5 1.5 0 0 0 1.5 16h13a1.5 1.5 0 0 0 1.5-1.5V2.914a1.5 1.5 0 0 0-.44-1.06L14.147.439A1.5 1.5 0 0 0 13.086 0zM4 6a1 1 0 0 1-1-1V1h10v4a1 1 0 0 1-1 1zM3 9h10a1 1 0 0 1 1 1v5H2v-5a1 1 0 0 1 1-1" />
                                      </svg> </button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>

          </div>
      </div>
  @endsection


  @section('script')
      <script>
          function fetchcompany(data) {
              console.log(data);
          }
      </script>
  @endsection
