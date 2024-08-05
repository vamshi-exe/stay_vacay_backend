@extends('layouts.admin')
@section('content')
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
                @if (Session::has('alert-success'))
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
                            <h4 class="card-title">Icons Table</h4>
                            {{-- <p class="card-description"> Add class <code>.table-hover</code> --}}
                            </p>

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Hosted name</th>
                                        <th>Hosted By</th>
                                        <th>Guest Price</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getdata as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->hosted_by }}</td>
                                            <td>{{ $item->guest_price }}</td>


                                            <td>
                                                @if ($item->image)
                                                    <img src="{{ asset('storage/' . $item->image) }}" width="100"
                                                        alt="State Image">
                                                @else
                                                    No Image
                                                @endif
                                            </td>
                                            <td>
                                                <label class="badge badge-info">
                                                    <a href="#">Edit</a>
                                                </label>


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
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
                <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © Countryside.com
                    2024</span>
                {{--  <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>  --}}
            </div>
        </footer>
        <!-- partial -->
    </div>
@endsection
