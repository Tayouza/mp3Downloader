<?php

namespace App\Livewire;

use App\Rules\YTUrl;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Downloader extends Component
{
    public $url = 'https://www.youtube.com/watch?v=TtPAFtcvRV8';

    public $message;

    public $type = 'mp3';

    public $verified = false;

    public $title;

    public $image;

    public function render()
    {
        return view('downloader');
    }

    public function verify(): void
    {
        $this->validate([
            'url' => ['required', 'url', new YTUrl],
        ]);

        $information = exec('python3 '.base_path('scripts/get_information_video.py').' '.$this->url);
        [$thumb, $title] = explode(',', $information);

        $this->image = $thumb;
        $this->title = $title;
        $this->verified = true;
    }

    public function download()
    {
        $this->validate([
            'url' => ['required', 'url', new YTUrl],
            'type' => ['required', Rule::in(['mp3', 'mp4'])],
        ]);

        if ($this->type === 'mp3') {
            $path = exec('python3 '.base_path('scripts/convert_to_mp3.py').' '.$this->url.' ./storage/mp3');
        }

        if ($this->type === 'mp4') {
            $path = exec('python3 '.base_path('scripts/convert_to_mp4.py').' '.$this->url.' ./storage/mp4');
        }

        return Storage::download('public/'.$path);
    }
}
