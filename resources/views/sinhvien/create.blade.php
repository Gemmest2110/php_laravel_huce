@extends('layoutmaster')

@section('title', $title)
@section('description', $description)

@section('content')
    <p>Xin chào các bạn sinh viên</p>
    <form action='/sinhvien/store' method='post'>
        @csrf
        <label for="ten">Tên:</label>
        <input type="text" id="ten" name="ten">
        <label for="lop">Lớp:</label>
        <input type="text" id="lop" name="lop">
        <label for="diem">Điểm:</label>
        <input type="number" id="diem" name="diem" step="0.01" min="0" max="10">
        <input type="submit" value="Thêm sinh viên">
    </form>
@endsection
