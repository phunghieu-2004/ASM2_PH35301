@extends('layouts.master')

@section('title')
    Thêm mới Thể loại
@endsection

@section('content')
    @if (!empty($_SESSION['errors']))
        <div class="alert alert-warning">
            <ul>
                @foreach ($_SESSION['errors'] as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @php
            unset($_SESSION['errors']);
        @endphp
    @endif

    <form action="{{ url('admin/category/store') }}" method="POST">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Tên thể loại:</label>
                    <input type="text" class="form-control" id="name" placeholder="Nhập tên thể loại" name="name" required maxlength="100">
                </div>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary mt-5">Thêm mới</button>
    </form>
@endsection
