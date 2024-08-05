
@extends('layouts.admin')
@section('content')


<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Country Information</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Country</a></li>
            <li class="breadcrumb-item active" aria-current="page">Form elements</li>
          </ol>
        </nav>
      </div>
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Country</h4>
                    <form class="forms-sample" method="post" action="{{ url('/admin/country/updatecountry') }}">
                        @csrf
                        <input type="hidden" name="hiddenid" value="{{ $editdata->country_id }}">

                        <div class="form-group">
                            <label>Country Name</label>
                            <input type="text" class="form-control" value="{{ old('countryName', $editdata->country_name) }}" name="countryName" id="exampleInputUsername1" placeholder="Country name">
                        </div>

                        <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                        <button type="button" class="btn btn-light" onclick="window.location.href='{{ url('/admin/country/viewcountries') }}'">Cancel</button>
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
        <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © bootstrapdash.com 2021</span>
        <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
      </div>
    </footer>
    <!-- partial -->
  </div>



@endsection
