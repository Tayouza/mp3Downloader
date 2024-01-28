<div class="w-full h-screen flex justify-center items-center">
    <form wire:submit.prevent="{{ isset($this->image) ? 'download' : 'verify' }}" class="flex flex-col justify-center items-center gap-4">
        <div class="flex gap-2">
            <label for="url" class="flex gap-4 items-center text-gray-500 font-bold text-lg">
                URL:
                <input type="url" wire:model="url" id="url" placeholder="https://youtube.com/watch?v=example" class="p-4 rounded shadow w-[350px]">
            </label>
            @if($this->verified)
            <select wire:model="type" class="w-18 p-2 bg-zinc-800 text-gray-500 font-bold shadow">
                <option value="mp3">mp3</option>
                <option value="mp4">mp4</option>
            </select>
            @endif
        </div>
        @error('url')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
        <div class="flex justify-center items-center">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                {{ $this->verified ? 'Download' : 'Verificar'}}
            </button>
        </div>
        <span>{{ $this->message }}</span>
        @if ($this->verified)
            <img src="{{ $this->image }}" alt="thumbnail" class="w-[350px]">
            <span>{{ $this->title }}</span>
        @endif
    </form>
</div>
