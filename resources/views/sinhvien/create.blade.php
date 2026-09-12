@extends('layoutmaster')

@section('title', 'Thêm sinh viên')
@section('description', 'Nhập thông tin sinh viên mới')

@section('content')
    @include('partial.errors')

    <form class="form-card" action="{{ route('sinhvien.store') }}" method="POST">
        @csrf
        @include('sinhvien.form')

        <div class="form-actions">
            <button class="btn btn-primary" type="submit">Thêm sinh viên</button>
            <a class="btn btn-secondary" href="{{ route('sinhvien.index') }}">Hủy</a>
        </div>
    </form>
@endsection
