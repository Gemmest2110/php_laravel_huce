@extends('layoutmaster')

@section('title', 'Danh sách sinh viên')
@section('description', 'Quản lý thông tin sinh viên')

@section('content')
    <div class="toolbar">
        <h2>Danh sách sinh viên</h2>
        <a class="btn btn-primary" href="{{ route('sinhvien.create') }}">Thêm sinh viên</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-wrapper">
        <table class="data-table">
            <thead><tr><th>ID</th><th>Họ tên</th><th>Tuổi</th><th>Email</th><th>Thao tác</th></tr></thead>
            <tbody>
                @forelse ($sinhviens as $sinhvien)
                    <tr>
                        <td>{{ $sinhvien->id }}</td>
                        <td>{{ $sinhvien->name }}</td>
                        <td>{{ $sinhvien->age }}</td>
                        <td>{{ $sinhvien->email }}</td>
                        <td class="actions">
                            <a href="{{ route('sinhvien.show', $sinhvien) }}">Xem</a>
                            <a href="{{ route('sinhvien.edit', $sinhvien) }}">Sửa</a>
                            <form action="{{ route('sinhvien.destroy', $sinhvien) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sinh viên này?')">
                                @csrf
                                @method('DELETE')
                                <button class="link-danger" type="submit">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="empty-state">Chưa có sinh viên nào.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination-wrapper">{{ $sinhviens->links() }}</div>
@endsection
