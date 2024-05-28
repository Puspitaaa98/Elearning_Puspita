@extends('admin.main')
@section('content')
<div class="pagetitle">
    <h1>Course</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"></li>
        <li class="breadcrumb-item active">Course</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="card">
      <div class="card-body">
        <table class="table">
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Category</th>
            <th>Description</th>
          </tr>
          @foreach($courses as $course)
            <tr>
              <td>1</td>
              <td>{{ $course->name }}</td>
              <td>{{ $course->category }}</td>
              <td>{{ $course->description }}</td>
              <td>
                <a href="#" class="btn btn-warning">Edit</a>
                <a href="#" class="btn btn-danger">Hapus</a>
              </td>
            </tr>
          @endforeach
        </table>
      </div>
    </div>
  </section>
@endsection