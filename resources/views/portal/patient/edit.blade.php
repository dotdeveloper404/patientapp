@extends('layouts.app')

@section('content')


<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Patient Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('portal.patient.update',$patient->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Patient Name</label>
                    <input type="text" name="name" value="{{ $patient->name}}" class="form-control" id="exampleInputEmail1" placeholder="Enter patient name">
                    @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                  </div>
           
                  <div class="form-group">
                    <label for="exampleInputEmail1">Patient Name</label>
                    <textarea name="notes">{{$patient->notes}}</textarea>
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