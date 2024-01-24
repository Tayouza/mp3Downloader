<?php

use App\Livewire\Downloader;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(Downloader::class)
        ->assertStatus(200);
});
