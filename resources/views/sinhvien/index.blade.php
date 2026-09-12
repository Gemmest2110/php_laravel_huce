@extends('layoutmaster')

@section('title', $title)
@section('description', $description)

@push('styles')
<style>
    .bang-sinh-vien { width: 100%; margin-top: 16px; border-collapse: collapse; }
    .bang-sinh-vien th, .bang-sinh-vien td { padding: 10px; text-align: left; border-bottom: 1px solid var(--mau-vien); }
    .bang-sinh-vien th { color: #fff; background: var(--mau-phu); }
    .bang-sinh-vien tbody tr:hover { background: #f7f5fa; }
    .bang-sinh-vien .stt, .bang-sinh-vien .diem { text-align: center; }
</style>
@endpush

@section('content')
    <p>Xin chào các bạn sinh viên</p>
    <table class="bang-sinh-vien">
        <thead><tr><th>STT</th><th>Mã số</th><th>Họ tên</th><th>Lớp</th><th>Điểm</th><th></th></tr></thead>
        <tbody>
            @foreach ($sinhviens as $sinhvien)
                <tr>
                    <td class="stt">{{ $loop->iteration }}</td>
                    <td>{{ $sinhvien['id'] }}</td>
                    <td>{{ $sinhvien['ten'] }}</td>
                    <td>{{ $sinhvien['lop'] }}</td>
                    <td class="diem">{{ $sinhvien['diem'] }}</td>
                    <td><a href="{{ url('/sinhvien/show/' . $sinhvien['id']) }}" style="color: var(--mau-phu);">Xem</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
