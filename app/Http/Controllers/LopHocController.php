<?php

namespace App\Http\Controllers;

use App\Models\LopHoc;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LopHocController extends Controller
{
    public function index(): View
    {
        $lophocs = LopHoc::latest()->paginate(10);

        return view('lophoc.index', compact('lophocs'));
    }

    public function create(): View
    {
        return view('lophoc.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->rules());

        LopHoc::create($validated);

        return redirect()
            ->route('lophoc.index')
            ->with('success', 'Lớp học mới đã được thêm thành công.');
    }

    public function edit(LopHoc $lophoc): View
    {
        return view('lophoc.edit', compact('lophoc'));
    }

    public function update(Request $request, LopHoc $lophoc): RedirectResponse
    {
        $validated = $request->validate($this->rules());

        $lophoc->update($validated);

        return redirect()
            ->route('lophoc.index')
            ->with('success', 'Lớp học đã được cập nhật.');
    }

    public function destroy(LopHoc $lophoc): RedirectResponse
    {
        $lophoc->delete();

        return redirect()
            ->route('lophoc.index')
            ->with('success', 'Lớp học đã được xóa.');
    }

    /**
     * @return array<string, array<int, string>>
     */
    private function rules(): array
    {
        return [
            'tenlop' => ['required', 'string', 'max:255'],
            'siso' => ['required', 'integer', 'min:1'],
            'giaovien' => ['required', 'string', 'max:255'],
        ];
    }
}
