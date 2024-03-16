
@extends('layouts.app')
@php

@section('content')
<div class="contianer-fluid">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
          <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">All student</span>
              <span class="info-box-number">
                {{App\Models\student::count()}}
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-thumbs-up"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">paid student</span>
              <span class="info-box-number">{{App\Models\student::whereHas('fees', function ($query)  {
            $query->whereMonth('payDate', '=', now()->month)
                ->whereYear('payDate', '=', now()->year);
        })->count()}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">unpaid student</span>
              <span class="info-box-number">{{App\Models\student::whereDoesntHave('fees', function ($query)  {
            $query->whereMonth('payDate', '=', now()->month)
                ->whereYear('payDate', '=', now()->year);
        })->count()}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-white elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">subject</span>
              <span class="info-box-number">   {{App\Models\subject::count()}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>

      <!--after-->
      <div class="row">
        <div class="table-responsive">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>name</th>
                        <th>father name</th>
                        <th>contact nunber</th>
                        <th>address</th>
                    </tr>
                </thead>
                <tbody>
                @foreach(App\Models\student::get() as $student)
                <tr>
                    <td>{{$student->name}}</td>
                    <td>{{$student->father_name}}</td>
                    <td>{{$student->phone}}</td>
                    <td>{{$student->address}}</td>
                
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
      </div>

</div>

@endsection