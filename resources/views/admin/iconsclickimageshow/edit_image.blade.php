@extends('layouts.admin')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Guest Information</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Guest</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Update Guest</h4>
                            {{--  <p class="card-description"> Basic form layout </p>  --}}
                            <form class="forms-sample" method="post"
                                action="{{ url('/admin/IconsButtonClick/updatenextpageshow') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="hiddenid" value="{{ $editdata->Ibtn_id }}">

                                <div class="form-group">
                                    <label class="col-sm-3 col-form-label">State</label>
                                    <select class="form-control" name='state_id'>
                                        <option value="">Select State</option>
                                        @foreach ($getdata as $item)
                                            <option value="{{ $item->state_id }}"
                                                {{ $item->state_id == $editdata->state_id ? 'selected' : '' }}>
                                                {{ $item->state_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('state_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Kilometer Way</label>
                                    <input type="text" class="form-control" name="Kilometer" id="exampleInputUsername1"
                                        value="{{ $editdata->Kilometer }}" placeholder="Kilometer Way" required>
                                </div>

                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="text" class="form-control" name="date" id="exampleInputUsername1"
                                        placeholder="Date" value="{{ $editdata->date }}" required>
                                </div>

                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" class="form-control" value="{{ $editdata->price }}" name="price"
                                        id="exampleInputUsername1" placeholder="Price" required>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 col-form-label">Image</label>
                                    <input type="file" class="form-control" name='image' />
                                    @if ($editdata->image)
                                        <img src="{{ asset('storage/' . $editdata->image) }}" width="120" />
                                    @endif
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                                <button type="button" class="btn btn-light"
                                    onclick="window.location.href='{{ url('/admin/state/viewstate') }}'">Cancel</button>
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
