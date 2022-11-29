@error($name)
    <div class="flex gap-3 mt-3 items-center">
        <x-svgs.error/>
        <span class="text text-red-error">{{ $message }}</span>
    </div>
@enderror