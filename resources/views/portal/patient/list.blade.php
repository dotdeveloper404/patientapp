@extends('layouts.app')


@push('styles')

<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('admin_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('admin_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('admin_assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">



@endpush()

@section('content')

<div class="card">

    @if ($alert = Session::get('alert'))
    <div class="alert alert-{{ $alert['type'] }} alert-dismissible fade show" role="alert">
        {{ $alert['message'] }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="card-header">
        <h3 class="card-title">DataTable with default features</h3>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Patient Name</th>
                    <th>Patient Notes</th>
                    <th>Created Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($patients as $patient)

                <tr>
                    <td>{{ $loop->iteration }} </td>
                    <td{{ $patient->name }} </td>
                    <td{{ $patient->notes }}</td>
                     <td>{{ \Carbon\Carbon::parse( $patient->created_at )->format('d/m/Y')}}</td>
                            <td>
                                <div class="d-flex">
                                    <a class="delete bg-danger d-flex align-items-center justify-content-center mr-2" href="javascript:void(0)" data-url="{{ route('portal.patient.destroy', $patient->id) }}">
                                        <i class="fas fa-trash-alt text-white"></i>
                                    </a>
                                    <a class="edit ms-2 bg-primary d-flex align-items-center justify-content-center" href="{{ route('portal.patient.edit', $patient->id) }}">
                                        <i class="fas fa-edit text-white"></i>
                                    </a>
                                </div>
                            </td>
                </tr>

                @endforeach
            </tbody>

        </table>
    </div>
    <!-- /.card-body -->
</div>

@endsection('content')


@push('scripts')

<!-- DataTables  & Plugins -->
<script src="{{ asset('admin_assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('admin_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('admin_assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('admin_assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('admin_assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('admin_assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('admin_assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('admin_assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('admin_assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('admin_assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('admin_assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('admin_assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
       
        });

    });
</script>

@endpush()