@extends('layoutmaster')

@section('title', $title)
@section('description', $description)

@push('styles')
<style>
    .thong-tin-sv { width: 100%; margin-top: 16px; border-collapse: collapse; }
    .thong-tin-sv th, .thong-tin-sv td { padding: 10px; text-align: left; border-bottom: 1px solid var(--mau-vien); }
    .thong-tin-sv th { width: 140px; color: #fff; background: var(--mau-phu); }
    .thong-tin-sv td { background: #fff; }
    .thong-bao { padding: 16px; border-radius: 6px; background: #fff3cd; color: #856404; margin-top: 16px; }
</style>
@endpush

@section('content')
    @if ($sinhvien)
        <table class="thong-tin-sv">
            <tr>
                <th>Mã số</th>
                <td>{{ $sinhvien['id'] }}</td>
            </tr>
            <tr>
                <th>Họ tên</th>
                <td>{{ $sinhvien['ten'] }}</td>
            </tr>
            <tr>
                <th>Lớp</th>
                <td>{{ $sinhvien['lop'] }}</td>
            </tr>
            <tr>
                <th>Điểm</th>
                <td>{{ $sinhvien['diem'] }}</td>
            </tr>
        </table>
    @else
        <p class="thong-bao">Không tìm thấy sinh viên với ID đã cho.</p>
    @endif

    <p style="margin-top: 16px;">
        <a href="{{ url('/sinhvien') }}" style="color: var(--mau-phu);">← Quay lại danh sách</a>
    </p>
@endsection
