<?php

use App\Models\LopHoc;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('class pages can be displayed', function () {
    $lophoc = LopHoc::factory()->create();

    $this->get(route('lophoc.index'))->assertOk()->assertSee($lophoc->tenlop);
    $this->get(route('lophoc.create'))->assertOk();
    $this->get(route('lophoc.edit', $lophoc))->assertOk()->assertSee($lophoc->tenlop);
});

test('a class can be created updated and deleted', function () {
    $this->post(route('lophoc.store'), [
        'tenlop' => '68PM34',
        'siso' => 45,
        'giaovien' => 'Nguyễn Văn B',
    ])->assertRedirect(route('lophoc.index'));

    $lophoc = LopHoc::where('tenlop', '68PM34')->firstOrFail();

    $this->put(route('lophoc.update', $lophoc), [
        'tenlop' => '68PM35',
        'siso' => 40,
        'giaovien' => 'Nguyễn Văn B',
    ])->assertRedirect(route('lophoc.index'));

    $this->assertDatabaseHas('lop_hocs', [
        'id' => $lophoc->id,
        'tenlop' => '68PM35',
        'siso' => 40,
    ]);

    $this->delete(route('lophoc.destroy', $lophoc))
        ->assertRedirect(route('lophoc.index'));

    $this->assertDatabaseMissing('lop_hocs', ['id' => $lophoc->id]);
});

test('class data is validated', function () {
    $this->from(route('lophoc.create'))
        ->post(route('lophoc.store'), [
            'tenlop' => '',
            'siso' => 0,
            'giaovien' => '',
        ])
        ->assertRedirect(route('lophoc.create'))
        ->assertSessionHasErrors(['tenlop', 'siso', 'giaovien']);
});
