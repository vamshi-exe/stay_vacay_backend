@extends('layouts.admin')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Hosted Information</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Hosted</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add Hosted</h4>
                            {{--  <p class="card-description"> Basic form layout </p>  --}}
                            <form class="forms-sample" method="post" action="{{ url('/admin/hosted/savehosted') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label> Name</label>
                                    <input type="text" class="form-control" name="Name" id="exampleInputUsername1" placeholder="Hosted name" required>
                                </div>
                                <div class="form-group">
                                    <label> Hosted By</label>
                                    <input type="text" class="form-control" name="hostedBy" id="exampleInputUsername1" placeholder="Hosted By" required>
                                </div>
                                <div class="form-group">
                                    <label> Guest Price</label>
                                    <input type="text" class="form-control" name="guestPrice" id="exampleInputUsername1" placeholder="Guest Price" required>
                                </div>
                                <div class="form-group">
                                <label class="col-sm-3 col-form-label">State</label>

                                    <select class="form-control" name='state_id'>
                                        <option>Select Country</option>
                                        @foreach ($getdata as $item)
                                            <option value="{{ $item->state_id }}">{{ $item->state_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('country_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 col-form-label">Image</label>
                                    <input type="file" class="form-control" name='image' required />
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                                <button type="button" class="btn btn-light" onclick="window.location.href='{{ url('/admin/state/viewstate') }}'">Cancel</button>
                            </form>

                        </div>
                    </div>
                </div>


            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
                <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © bootstrapdash.com
                    2021</span>
                <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"> Free <a
                        href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin
                        template</a> from Bootstrapdash.com</span>
            </div>
        </footer>
        <!-- partial -->
    </div>
@endsection
