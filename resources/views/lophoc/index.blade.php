@extends('layoutmaster')

@section('title', 'Danh sách lớp học')
@section('description', 'Quản lý thông tin lớp học')

@section('content')
    <div class="toolbar">
        <h2>Danh sách lớp học</h2>
        <a class="btn btn-primary" href="{{ route('lophoc.create') }}">Thêm lớp học</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-wrapper">
        <table class="data-table">
            <thead><tr><th>ID</th><th>Tên lớp</th><th>Sĩ số</th><th>Giáo viên</th><th>Thao tác</th></tr></thead>
            <tbody>
                @forelse ($lophocs as $lophoc)
                    <tr>
                        <td>{{ $lophoc->id }}</td>
                        <td>{{ $lophoc->tenlop }}</td>
                        <td>{{ $lophoc->siso }}</td>
                        <td>{{ $lophoc->giaovien }}</td>
                        <td class="actions">
                            <a href="{{ route('lophoc.edit', $lophoc) }}">Sửa</a>
                            <form action="{{ route('lophoc.destroy', $lophoc) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa lớp học này?')">
                                @csrf
                                @method('DELETE')
                                <button class="link-danger" type="submit">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="empty-state">Chưa có lớp học nào.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination-wrapper">{{ $lophocs->links() }}</div>
@endsection
