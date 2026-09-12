@extends('layoutmaster')

@section('title', 'Sửa lớp học')
@section('description', 'Cập nhật thông tin lớp học #' . $lophoc->id)

@section('content')
    @include('partial.errors')

    <form class="form-card" action="{{ route('lophoc.update', $lophoc) }}" method="POST">
        @csrf
        @method('PUT')
        @include('lophoc.form', ['lophoc' => $lophoc])

        <div class="form-actions">
            <button class="btn btn-primary" type="submit">Cập nhật</button>
            <a class="btn btn-secondary" href="{{ route('lophoc.index') }}">Hủy</a>
        </div>
    </form>
@endsection
