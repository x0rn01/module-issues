<form wire:submit.prevent="createIssue" action="#" method="POST" class="space-y-4 px-4 py-6">
    <div>
        <input wire:model.defer="title" type="text" class="w-full bg-gray-100 text-sm border-none rounded-xl placeholder-gray-900
                            px-4 py-2" placeholder="Request object">
        @error('title')
        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <textarea wire:model.defer="description" name="idea" id="idea" cols="30" rows="4"
                  class="w-full border-none bg-gray-100 rounded-xl placeholder-gray-100 text-sm px-4 py-2"
                  placeholder="Describe your idea"></textarea>
        @error('description')
        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="flex items-center justify-between space-x-3">
        <button type="submit"
                class="flex items-center justify-center w-1/2 h-11 text-xs bg-blue-400 font-semibold
                                    rounded-xl border border-blue-200 hover:bg-blue-600 transition duration-150
                                    easi-in py-3 px-6 text-white">
            <span class="ml-1">Submit</span>
        </button>
    </div>
    <div>
        @if (session('success_message'))
            <div
                x-data="{ isVisible: true }"
                x-init="
                    setTimeout(() => {
                        isVisible = false
                    }, 5000)
                "
                x-show.transition.duration.1000ms="isVisible"
                class="text-green-400 mt-4"
            >
                {{ session('success_message') }}
            </div>
        @endif
    </div>
</form>
