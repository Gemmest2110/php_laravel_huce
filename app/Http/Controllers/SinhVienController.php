<?php

namespace App\Http\Controllers;

use App\Models\SinhVien;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class SinhVienController extends Controller
{
    public function index(): View
    {
        $sinhviens = SinhVien::latest()->paginate(10);

        return view('sinhvien.index', compact('sinhviens'));
    }

    public function create(): View
    {
        return view('sinhvien.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'age' => ['required', 'integer', 'min:1', 'max:150'],
            'email' => ['required', 'email', 'max:255', 'unique:sinh_viens,email'],
        ]);

        SinhVien::create($validated);

        return redirect()
            ->route('sinhvien.index')
            ->with('success', 'Sinh viên mới đã được thêm thành công.');
    }

    public function show(SinhVien $sinhvien): View
    {
        return view('sinhvien.show', compact('sinhvien'));
    }

    public function edit(SinhVien $sinhvien): View
    {
        return view('sinhvien.edit', compact('sinhvien'));
    }

    public function update(Request $request, SinhVien $sinhvien): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'age' => ['required', 'integer', 'min:1', 'max:150'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('sinh_viens', 'email')->ignore($sinhvien),
            ],
        ]);

        $sinhvien->update($validated);

        return redirect()
            ->route('sinhvien.index')
            ->with('success', 'Thông tin sinh viên đã được cập nhật.');
    }

    public function destroy(SinhVien $sinhvien): RedirectResponse
    {
        $sinhvien->delete();

        return redirect()
            ->route('sinhvien.index')
            ->with('success', 'Sinh viên đã được xóa.');
    }
}
