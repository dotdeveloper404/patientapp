@extends('layouts.app')


@push('css')
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('admin_assets/plugins/summernote/summernote-bs4.min.css')}}">
@endpush
@section('content')


<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Patient Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('portal.patient.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Patient Name</label>
                    <input required type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter patient name">
                    @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                  </div>
           
                  <div class="form-group">
                    <label for="exampleInputEmail1">Patient Name</label>
                    <textarea  required name="notes" style="width:100%;">   Place <em>some</em> <u>text</u> <strong>here</strong></textarea>
                  @error('notes')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                  </div>
             
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>



@endsection

@push('scripts')

<!-- Summernote -->
<script src="{{ asset('admin_assets/plugins/summernote/summernote-bs4.min.js')}}"></script>

<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()
  });

    </script>

@endpush