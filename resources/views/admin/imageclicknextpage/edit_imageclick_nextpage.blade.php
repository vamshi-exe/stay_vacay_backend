
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
        @yield('content')
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add State</h4>
                        <form class="form-sample" method="post" action="{{url('/admin/IconsButtonClick/updateimageclicknextpage')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="hiddenid" value="{{ $editdata->pro_id }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"> Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="name" name='Name'value="{{ $editdata->Name }}" />
                                            @error('Name') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Image 1</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" name='image1'/>
                                            @if ($editdata->image1)
                                            <img src="{{ asset('storage/' . $editdata->image1) }}" width="120" />
                                        @endif
                                            @error('image1') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Image 2</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control"  name='image2'/>
                                            @if ($editdata->image2)
                                            <img src="{{ asset('storage/' . $editdata->image2) }}" width="120" />
                                        @endif
                                            @error('image2') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">image 3</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control"  name='image3'/>
                                            @if ($editdata->image3)
                                            <img src="{{ asset('storage/' . $editdata->image3) }}" width="120" />
                                        @endif
                                            @error('image3') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">image 4</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control"name='image4'/>
                                            @if ($editdata->image4)
                                            <img src="{{ asset('storage/' . $editdata->image4) }}" width="120" />
                                        @endif
                                            @error('image4') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"> Image 5</label>
                                        <div class="col-sm-9">
                                                <div class="col-sm-9">
                                                    <input type="file" class="form-control" name='image5'/>
                                                    @if ($editdata->image5)
                                                    <img src="{{ asset('storage/' . $editdata->image5) }}" width="120" />
                                                @endif
                                                @error('image5') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"> Address Home</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder=" Enter your Address"value="{{ $editdata->address_home}}" name='addreshome' />
                                            @error('addreshome') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"> Facility Available</label>
                                        <div class="col-sm-9">
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" value="{{ $editdata->facility_available }}"placeholder=" Enter your Facility" name='facility'/>

                                                @error('facility') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"> Hosted By </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder=" Enter your Hosted" value="{{ $editdata->hosted_by }}"name='Hosted' />
                                            @error('Hosted') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <textarea id="editor" class="form-control" placeholder="Enter your Description" name="description">{{ old('description', $editdata->discreaption) }}</textarea>
                                            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
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
    @yield('scripts')
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
@section('scripts')
<!-- Include CKEditor script -->
<script src="{{ asset('admin/assets/js/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('editor');
</script>
@endsection
