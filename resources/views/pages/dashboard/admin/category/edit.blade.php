@extends('layouts.dashboard-admin')

@section('title', 'Dashboard Admin | Category Page')

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Admin Dashboard</h2>
                <p class="dashboard-subtitle">
                  Edit Category
                </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul style="margin: 0;">
                                    @foreach ($errors->all() as $e)
                                        <li>{{ $e }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.category.update', $item->id) }}" method="post" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name">Category Name</label>
                                                <input type="text" name="name" id="name" class="form-control" value="{{ $item->name }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="photo">Category Photo</label>
                                                <input type="file" name="photo" id="photo" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col text-right">
                                            <button type="submit" class="btn btn-success">Edit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
