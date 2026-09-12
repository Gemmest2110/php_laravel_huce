@extends('layoutmaster')

@section('title', 'Thông tin sinh viên')
@section('description', 'Chi tiết sinh viên #' . $sinhvien->id)

@section('content')
    <dl class="detail-list">
        <div><dt>Họ tên</dt><dd>{{ $sinhvien->name }}</dd></div>
        <div><dt>Tuổi</dt><dd>{{ $sinhvien->age }}</dd></div>
        <div><dt>Email</dt><dd>{{ $sinhvien->email }}</dd></div>
        <div><dt>Ngày tạo</dt><dd>{{ $sinhvien->created_at->format('d/m/Y H:i') }}</dd></div>
    </dl>

    <div class="form-actions">
        <a class="btn btn-primary" href="{{ route('sinhvien.edit', $sinhvien) }}">Sửa</a>
        <a class="btn btn-secondary" href="{{ route('sinhvien.index') }}">Quay lại</a>
    </div>
@endsection
