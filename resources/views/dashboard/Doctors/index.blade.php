@extends('dashboard.layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('Dashboard/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('Dashboard/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('Dashboard/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('Dashboard/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('Dashboard/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('Dashboard/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{ URL::asset('dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
    <style>
        .button-group-sm {
            display: flex;
            gap: 5px;
            /* Adjust space between buttons */
        }

        .button-group-sm .btn {
            padding: 0.25rem 0.5rem;
            /* Adjust button padding for smaller size */
            font-size: 0.85rem;
            /* Adjust font size */
        }
    </style>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Empty</span>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
            </div>
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
            </div>
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
            </div>
            <div class="mb-3 mb-xl-0">
                <div class="btn-group dropdown">
                    <button type="button" class="btn btn-primary">14 Aug 2019</button>
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                        id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate"
                        data-x-placement="bottom-end">
                        <a class="dropdown-item" href="#">2015</a>
                        <a class="dropdown-item" href="#">2016</a>
                        <a class="dropdown-item" href="#">2017</a>
                        <a class="dropdown-item" href="#">2018</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('dashboard.messages_alert')
    <!-- row -->


    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            {{ __('Dashboard/Doctors.create_doctor') }}
                        </button>
                    </div>

                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    {{-- <th class="wd-20p border-bottom-0">{{ __('Dashboard/Doctors.email') }}</th> --}}
                                    <th class="wd-15p border-bottom-0">#</th>
                                    <th class="wd-20p border-bottom-0">{{ __('Dashboard/Doctors.name') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('Dashboard/Doctors.phone') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('Dashboard/Doctors.price') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('Dashboard/Doctors.appointments') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('Dashboard/Doctors.section') }}</th>
                                    <th class="wd-20p border-bottom-0">{{ __('Dashboard/Doctors.status') }}</th>
                                    <th class="wd-20p border-bottom-0">{{ __('Dashboard/Doctors.Processes') }}</th>

                                    {{-- <th class="wd-15p border-bottom-0" style="text-align: left;">#</th>
                                    <th class="wd-20p border-bottom-0" style="text-align: left;">
                                        {{ __('Dashboard/Doctors.name') }}</th>
                                    <th class="wd-15p border-bottom-0" style="text-align: left;">
                                        {{ __('Dashboard/Doctors.phone') }}</th>
                                    <th class="wd-15p border-bottom-0" style="text-align: left;">
                                        {{ __('Dashboard/Doctors.price') }}</th>
                                    <th class="wd-15p border-bottom-0" style="text-align: left;">
                                        {{ __('Dashboard/Doctors.appointments') }}</th>
                                    <th class="wd-15p border-bottom-0" style="text-align: left;">
                                        {{ __('Dashboard/Doctors.section') }}</th>
                                    <th class="wd-20p border-bottom-0" style="text-align: left;">
                                        {{ __('Dashboard/Doctors.status') }}</th>
                                    <th class="wd-20p border-bottom-0" style="text-align: left;">
                                        {{ __('Dashboard/Doctors.Processes') }}</th> --}}

                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($doctors as $index => $doctor)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $doctor->name }}</td>
                                        {{-- <td>{{ $doctor->email }}</td> --}}
                                        <td>{{ $doctor->phone }}</td>
                                        <td>{{ $doctor->price }}</td>
                                        <td>{{ $doctor->appointments }}</td>
                                        <td>{{ $doctor->section->name }}</td> <!-- Displaying the section name -->
                                        <td>

                                            {{-- <div class="d-inline-flex align-items-center">
                                                <div class="dot-label bg-{{ $doctor->status == 1 ? 'success' : 'danger' }} ml-1"
                                                    style="width: 10px; height: 10px; border-radius: 50%;"></div>
                                                <span
                                                    class="ml-1">{{ $doctor->status == 1 ? __('Dashboard/Doctors.active') : __('Dashboard/Doctors.inactive') }}</span>
                                            </div> --}}



                                            <div class="d-inline-flex align-items-center">
                                                <span
                                                    class="badge badge-{{ $doctor->status == 1 ? 'success' : 'danger' }} mr-2"
                                                    style="font-size: 12px;">
                                                    {{ $doctor->status == 1 ? __('Dashboard/Doctors.active') : __('Dashboard/Doctors.inactive') }}
                                                </span>
                                            </div>




                                            {{-- <div class="d-inline-flex align-items-center">
                                                <i class="fa fa-circle text-{{ $doctor->status == 1 ? 'success' : 'danger' }} mr-2"
                                                    style="font-size: 12px;"></i>
                                                <span>{{ $doctor->status == 1 ? __('Dashboard/Doctors.active') : __('Dashboard/Doctors.inactive') }}</span>
                                            </div> --}}
                                        </td>
                                        <td>
                                            {{-- <div class="button-group-sm">
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                    data-target="#edit{{ $doctor->id }}">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#delete{{ $doctor->id }}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </div> --}}
                                            <div class="button-group-sm">
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                    data-target="#edit{{ $doctor->id }}">
                                                    <i class="fas fa-edit"></i>
                                                    {{-- {{ __('Dashboard/sections_trans.edit_sections') }} --}}
                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#delete{{ $doctor->id }}">
                                                    <i class="fas fa-trash-alt"></i>
                                                    {{-- {{ __('Dashboard/sections_trans.delete_sections') }} --}}
                                                </button>
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
        <!--/div-->

    </div>


    @include('dashboard.Doctors.add')
    @include('dashboard.Doctors.edit')
    @include('dashboard.Doctors.delete')
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('Dashboard/js/table-data.js') }}"></script>
    <!--Internal  Notify js -->
    <script src="{{ URL::asset('dashboard/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('/plugins/notify/js/notifit-custom.js') }}"></script>
@endsection
