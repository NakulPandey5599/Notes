<x-app-layout>
       
            <div class="mx-auto container py-20 px-6">
                <div class="flex items-center justify-between mb-6">
                    <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100">Your Notes</h1>
                    <a href="{{ route('notes.create') }}">
    <x-primary-button>
        Add Note
    </x-primary-button>
</a>


                </div>
        <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6">
            @forelse ($notes as $note)
                <x-note-item :note="$note"></x-note-item>
            @empty
                <div class="col-span-full text-center text-gray-400 py-16">No Notes Found</div>
            @endforelse
            <div class="mt-6">
    {{ $notes->links() }}
</div>
        </div>
    </div>
</x-app-layout>
