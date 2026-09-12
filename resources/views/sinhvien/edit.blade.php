@extends('layoutmaster')

@section('title', 'Sửa sinh viên')
@section('description', 'Cập nhật thông tin sinh viên #' . $sinhvien->id)

@section('content')
    @include('partial.errors')

    <form class="form-card" action="{{ route('sinhvien.update', $sinhvien) }}" method="POST">
        @csrf
        @method('PUT')
        @include('sinhvien.form', ['sinhvien' => $sinhvien])

        <div class="form-actions">
            <button class="btn btn-primary" type="submit">Cập nhật</button>
            <a class="btn btn-secondary" href="{{ route('sinhvien.index') }}">Hủy</a>
        </div>
    </form>
@endsection
