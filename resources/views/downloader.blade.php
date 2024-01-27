<div class="w-full h-screen flex justify-center items-center">
    <form wire:submit.prevent="{{ isset($this->image) ? 'download' : 'getThumb' }}" class="flex flex-col justify-center items-center gap-4">
        <label for="url" class="flex gap-4 items-center text-gray-500 font-bold text-lg">
            URL:
            <input type="url" wire:model="url" id="url" placeholder="https://youtube.com/watch?v=example" class="p-4 rounded shadow w-[350px]">
        </label>
        @error('url')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
        <div class="flex justify-center items-center">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Download</button>
        </div>
        <span>{{ $this->message }}</span>
        @if (isset($this->image))
            <img src="{{ $this->image }}" alt="thumbnail" class="w-[350px]">
        @endif
    </form>
</div>
