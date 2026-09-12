<?php

use App\Models\SinhVien;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('student pages can be displayed', function () {
    $sinhvien = SinhVien::factory()->create();

    $this->get(route('sinhvien.index'))->assertOk()->assertSee($sinhvien->name);
    $this->get(route('sinhvien.create'))->assertOk();
    $this->get(route('sinhvien.show', $sinhvien))->assertOk()->assertSee($sinhvien->email);
    $this->get(route('sinhvien.edit', $sinhvien))->assertOk()->assertSee($sinhvien->name);
});

test('a student can be created updated and deleted', function () {
    $this->post(route('sinhvien.store'), [
        'name' => 'Nguyễn Văn A',
        'age' => 20,
        'email' => 'a@example.com',
    ])->assertRedirect(route('sinhvien.index'));

    $sinhvien = SinhVien::where('email', 'a@example.com')->firstOrFail();

    $this->put(route('sinhvien.update', $sinhvien), [
        'name' => 'Nguyễn Văn A đã sửa',
        'age' => 21,
        'email' => 'a@example.com',
    ])->assertRedirect(route('sinhvien.index'));

    $this->assertDatabaseHas('sinh_viens', [
        'id' => $sinhvien->id,
        'name' => 'Nguyễn Văn A đã sửa',
        'age' => 21,
    ]);

    $this->delete(route('sinhvien.destroy', $sinhvien))
        ->assertRedirect(route('sinhvien.index'));

    $this->assertDatabaseMissing('sinh_viens', ['id' => $sinhvien->id]);
});

test('student data is validated', function () {
    $this->from(route('sinhvien.create'))
        ->post(route('sinhvien.store'), [
            'name' => '',
            'age' => 0,
            'email' => 'not-an-email',
        ])
        ->assertRedirect(route('sinhvien.create'))
        ->assertSessionHasErrors(['name', 'age', 'email']);
});
