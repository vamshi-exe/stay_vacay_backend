
@extends('layouts.admin')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Hosted Tables </h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">Hosted tables</li>
          </ol>
        </nav>
      </div>
      <div class="row">
        @if(Session::has('alert-success'))

        <div class="alert alert-success alert-dismissible" style="width: 96%;margin-left: 2%;">

          <h4>
            <i class="icon fa fa-check"></i>
            Success...!
          </h4>
           {!! session('alert-success') !!}
        </div>
      @endif
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Addres Table</h4>
              {{-- <p class="card-description"> Add class <code>.table-hover</code> --}}
              </p>

              <table class="table table-hover" id="example" style="width:100%">
                <thead>
                  <tr>

                    <th>Name</th>
                    <th>Address Home</th>
                    <th>Facility Available</th>
                    <th>Hosted By</th>
                    <th>Action</th>
                  </tr>
                </thead>



                {{--  <tbody>
                    @foreach($getdata as $item)
                <tr>
                    <td>{{ $item->Name }}</td>
                    <td>{{ $item->address_home }}</td>
                    <td>{{ $item->facility_available }}</td>

                    <td>{{ $item->hosted_by }}</td>


                    <td>
                        <label class="badge badge-info">
                            <a href="{{ route('admin.editimageclicknextpage', ['getId' => $item->pro_id]) }}">Edit</a>
                        </label>

                        <form action="{{ route('admin.deletimageclicknextpage', ['id' => $item->pro_id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('post')
                            <button type="submit" class="badge badge-danger">Delete</button>
                        </form>
                    </td>
                </tr>

                @endforeach
            </tbody>  --}}
              </table>
            </div>
          </div>
        </div>




      </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <footer class="footer">
      <div class="container-fluid d-flex justify-content-between">
        <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © Countryside.com 2024</span>
        {{--  <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>  --}}
      </div>
    </footer>
    <!-- partial -->
  </div>

@endsection
@push('styles')
<link rel="stylesheet" href="{{ url('admin/assets/css/dataTables.dataTables.min.css') }}">
@endpush

@push('scripts')
<script src="{{ url('admin/assets/js/jquery.min.js') }}"></script>
<script src="{{ url('admin/assets/js/dataTables.min.js') }}"></script>

{{--
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#example").DataTable({
            processing: true,
            serverSide: false,
            scrollX: true,
            paging: true,
            ajax: {
                url: "{{ url('/admin/IconsButtonClick/getviewimageclicknextpage') }}",
                dataSrc: 'data'
            },
            searching: true,
            columns: [
                {
                    data: null,
                    className: "text-center",
                    render: function(data, type, row, meta) {
                        return meta.row + 1; // Serial number - row number
                    }
                },
                { data: "Name", className: "text-center" },
                { data: "address_home", className: "text-center" },
                { data: "facility_available", className: "text-center" },
                { data: "hosted_by", className: "text-center" },
                {
                    data: null, // Ensure this is not data from the server
                    render: function(data, type, full, meta) {
                        var encodedId = btoa(full['pro_id']); // Base64 encode the ID
                        var deletebtn = `
                            <input type="hidden" id="deleteinput_${full['pro_id']}" value="${full['pro_id']}">
                            <a href="editimageclicknextpage/${encodedId}" id="getId" class="btn btn-warning btn-xs actionBTN" title="Edit">
                                <i class="fa fa-pencil" title="Edit"></i> Edit
                            </a> |
                            <button class="btn btn-danger btn-xs actionBTN" data-toggle="modal" onclick="return deleteItemType('${full['pro_id']}', ${meta.row});">
                                <i class="fa fa-trash" title="Delete"></i> Delete
                            </button>`;
                        return deletebtn;
                    },
                    className: "text-center"
                }
            ]
        });
    });

    function deleteItemType(id, rowIndex) {
        // Implement delete functionality here
        console.log('Delete ID:', id, 'Row Index:', rowIndex);
        return false;
    }
</script>  --}}
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#example").DataTable({
            processing: true,
            serverSide: false,
            scrollX: true,
            paging: true,
            ajax: {
                url: "{{ url('/admin/IconsButtonClick/getviewimageclicknextpage') }}",
                dataSrc: 'data'
            },
            searching: true,
            columns: [
                {
                    data: null,
                    className: "text-center",
                    render: function(data, type, row, meta) {
                        return meta.row + 1; // Serial number - row number
                    }
                },
                { data: "Name", className: "text-center" },
                { data: "address_home", className: "text-center" },
                { data: "facility_available", className: "text-center" },
                { data: "hosted_by", className: "text-center" },
                {
                    data: null,
                    render: function(data, type, full, meta) {
                        var encodedId = btoa(full['pro_id']); // Base64 encode the ID
                        return `
                            <a href="editimageclicknextpage/${encodedId}" id="getId" class="btn btn-warning btn-xs actionBTN" title="Edit">
                                <i class="fa fa-pencil" title="Edit"></i> Edit
                            </a> |
                            <button class="btn btn-danger btn-xs actionBTN" onclick="deleteItemType('${encodedId}', ${meta.row});">
                                <i class="fa fa-trash" title="Delete"></i> Delete
                            </button>
                        `;
                    },
                    className: "text-center"
                }
            ]
        });
    });

    function deleteItemType(encodedId, rowIndex) {
        if (confirm('Are you sure you want to delete this item?')) {
            $.ajax({
                url: "{{ url('/admin/IconsButtonClick/deletimageclicknextpage') }}/" + encodedId,
                type: 'POST', // Use POST method to send DELETE request
                data: {
                    _method: 'DELETE', // Simulate DELETE request
                    _token: $('meta[name="csrf-token"]').attr('content') // Include CSRF token
                },
                success: function(response) {
                    if (response.success) {
                        $('#example').DataTable().row(rowIndex).remove().draw();
                        alert('Item deleted successfully!');
                    } else {
                        alert('Error deleting item!');
                    }
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                    alert('An error occurred while deleting the item.');
                }
            });
        }
        return false;
    }
</script>


