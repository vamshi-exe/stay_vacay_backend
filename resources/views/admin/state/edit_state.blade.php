
@extends('layouts.admin')
@section('content')


  <div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Form elements </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Forms</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                </ol>
            </nav>
        </div>
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update State</h4>
                        <form class="form-sample" method="post" action="{{url('/admin/state/updatestate')}}" enctype="multipart/form-data">
                            @csrf


                            <!-- Hidden field for state_id -->
                            <input type="hidden" name="hiddenid" value="{{ $editdata->state_id }}">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">State Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" value="{{ $editdata->state_name }}" class="form-control" placeholder="State name" name='stateName' />
                                            @error('stateName') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" value="{{ $editdata->address }}" class="form-control" placeholder="Address" name='address' />
                                            @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Country</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name='country_id'>
                                                <option value="">Select Country</option>
                                                @foreach ($getdata as $item)
                                                    <option value="{{ $item->country_id }}" {{ $item->country_id == $editdata->country_id ? 'selected' : '' }}>
                                                        {{ $item->country_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('country_id') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Add Guests</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="{{ $editdata->guests }}" placeholder="Add Guests" name='guests' />
                                            @error('guests') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Add Age</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="{{ $editdata->age }}" placeholder="Add Age" name='age' />
                                            @error('age') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Image</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" name='image' />
                                            @if ($editdata->image)
                                                <img src="{{ asset('storage/' . $editdata->image) }}" width="120" />
                                            @endif
                                            @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                            <button type="button" class="btn btn-light" wire:click="resetForm">Cancel</button>
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
            <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © Countryside.com
                2024</span>
            {{--  <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"> Free <a
                    href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin
                    template</a> from Bootstrapdash.com</span>  --}}
        </div>
    </footer>
    <!-- partial -->
</div>

@endsection
