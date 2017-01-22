<!-- Admin Dashboard -->

@extends('admin.template')

@section('main')
  <!-- Page-Title -->
  <div class="row">
    <div class="col-sm-12">
      <h4 class="pull-left page-title">Dashboard</h4>
    </div>
  </div>

  <p>welcome {{Auth::guard('admin')->user()->nama}}</p>
@stop
