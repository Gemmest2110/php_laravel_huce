@extends('layoutmaster')

@section('title', 'Thêm lớp học')
@section('description', 'Nhập thông tin lớp học mới')

@section('content')
    @include('partial.errors')

    <form class="form-card" action="{{ route('lophoc.store') }}" method="POST">
        @csrf
        @include('lophoc.form')

        <div class="form-actions">
            <button class="btn btn-primary" type="submit">Thêm lớp học</button>
            <a class="btn btn-secondary" href="{{ route('lophoc.index') }}">Hủy</a>
        </div>
    </form>
@endsection
