<?php

namespace App\Livewire;

use App\Rules\YTUrl;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Downloader extends Component
{
    public $url = 'https://www.youtube.com/watch?v=TtPAFtcvRV8';
    public $message;
    public $image;

    public function render()
    {
        return view('downloader');
    }

    public function getThumb(): void
    {
        $this->validate([
            'url' => ['required', 'url', new YTUrl]
        ]);

        $thumb = exec('python3 ' . base_path('get_thumbnail.py') . ' ' . $this->url);
        $this->image = $thumb;
    }

    public function download()
    {
        $this->validate([
            'url' => ['required', 'url', new YTUrl]
        ]);

        $path = exec('python3 ' . base_path('converter') . ' ' . $this->url . ' ./storage');
        return Storage::download('public/' . $path);
    }
}
