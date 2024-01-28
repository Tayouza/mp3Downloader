<div class="w-full h-screen flex justify-center items-center">
    <form wire:submit.prevent="{{ isset($this->image) ? 'download' : 'verify' }}" class="flex flex-col justify-center items-center gap-4">
        <div class="flex flex-col gap-2 sm:flex-row">
            <label for="url" class="w-full flex flex-col gap-4 items-center text-gray-500 font-bold text-lg sm:flex-row">
                URL:
                <input type="url" wire:model="url" id="url" placeholder="https://youtube.com/watch?v=example" class="p-4 bg-zinc-100 rounded shadow w-[350px]">
            </label>
            @if($this->verified)
            <div class="flex justify-center">
                <select wire:model="type" class="w-18 p-2 bg-zinc-100 text-gray-500 font-bold shadow rounded">
                    <option value="mp3">mp3</option>
                    <option value="mp4">mp4</option>
                </select>
            </div>
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
        <div class="flex flex-col gap-4 w-[350px] text-center">
            <img src="{{ $this->image }}" alt="thumbnail">
            <span class="text-gray-300 text-sm font-bold sm:text-base">{{ $this->title }}</span>
        </div>
        @endif
        <div wire:loading.flex class="backdrop">
          <div class="loader"></div>
        </div>
    </form>
</div>
