<?php

test('the home page redirects to the student list', function () {
    $response = $this->get('/');

    $response->assertRedirect('/sinhvien');
});
