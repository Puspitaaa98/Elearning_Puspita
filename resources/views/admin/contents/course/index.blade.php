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
        <a href="/admin/course/create" class="btn btn-primary my-3">+ Course</a>
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
              <td class="d-flex">
                <a href="/admin/course/edit/{{ $course->id }}" class="btn btn-warning me-2">Edit</a>
                <form action="/admin/course/delete/{{ $course->id }}" method="POST">
                  @method ('DELETE')
                  @csrf
                  <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
                </form>
              </td>
            </tr>
          @endforeach
        </table>
      </div>
    </div>
  </section>
@endsection