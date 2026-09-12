<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SinhVienController extends Controller
{
    // Thêm dấu chấm phẩy (;) ở cuối mảng này
    private $sinhviens = [
        ['id' => 1, 'ten' => 'Nguyễn Văn A', 'lop' => '68PM34', 'diem' => 8],
        ['id' => 2, 'ten' => 'Nguyễn Văn B', 'lop' => '68PM34', 'diem' => 5],
        ['id' => 3, 'ten' => 'Nguyễn Văn C', 'lop' => '68PM34', 'diem' => 9],
        ['id' => 4, 'ten' => 'Nguyễn Văn D', 'lop' => '68PM34', 'diem' => 7],
        ['id' => 5, 'ten' => 'Nguyễn Văn E', 'lop' => '68PM34', 'diem' => 6],
    ]; // <--- QUAN TRỌNG: Phải có dấu chấm phẩy ở đây

    public function index() {
        return view('sinhvien.index', [
            'title' => 'Danh sách sinh viên',
            'description' => 'Trang danh sách sinh viên',
            'sinhviens' => $this->sinhviens
        ]);
    }

    public function show($id = "") {
        // get sinh vien theo id
        $sinhvien = collect($this->sinhviens)->firstWhere('id', $id);
        return view('sinhvien.show', [
            'title' => 'Thông tin sinh viên',
            'description' => 'Trang thông tin sinh viên',
            'sinhvien' => $sinhvien
        ]);
    }

    public function create() {
        return view('sinhvien.create', [
            'title' => 'Thêm sinh viên',
            'description' => 'Trang thêm sinh viên'
        ]);
    }

    public function store(Request $request) {
        dd($request->all());
    }
}