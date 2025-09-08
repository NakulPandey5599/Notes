<div
    class="w-full h-64 flex flex-col justify-between dark:bg-gray-800 bg-white 
           dark:border-gray-700 rounded-lg border border-gray-400 mb-6 py-5 px-4 
           transition transform hover:shadow-lg hover:scale-105">

    <!-- Title & Content (clickable) -->
    <a href="{{ route('notes.show', $note->id) }}" class="block">
        <h4 class="text-gray-800 dark:text-gray-100 font-bold mb-3">
            {{ $note->title }}
        </h4>
        <p class="text-gray-600 dark:text-gray-300 text-sm">
            {{ Str::words($note->content, 20) }}
        </p>
    </a>

    <!-- Footer -->
    <div class="flex items-center justify-between text-gray-800 dark:text-gray-100 mt-4">
        <p class="text-sm">
            {{ $note->created_at?->format('F j, Y') }}
        </p>

        <!-- Action Buttons -->
        <div class="flex items-center space-x-2">
            <!-- Edit Button -->
            <a href="{{ route('notes.edit', $note->id) }}"
                class="inline-flex w-8 h-8 rounded-full bg-gray-800 dark:bg-gray-100 dark:text-gray-800 text-white 
                       items-center justify-center focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black"
                aria-label="Edit note">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="18"
                    height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z"></path>
                    <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                    <line x1="13.5" y1="6.5" x2="17.5" y2="10.5"></line>
                </svg>
            </a>

            <!-- Delete Button -->
            <form method="POST" action="{{ route('notes.destroy', $note->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="inline-flex w-8 h-8 rounded-full bg-red-600 dark:bg-red-400 dark:text-gray-800 text-white 
                           items-center justify-center focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black"
                    aria-label="Delete note"
                    onclick="return confirm('Are you sure you want to delete this note?')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="18"
                        height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z"></path>
                        <line x1="4" y1="7" x2="20" y2="7"></line>
                        <line x1="10" y1="11" x2="10" y2="17"></line>
                        <line x1="14" y1="11" x2="14" y2="17"></line>
                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                        <path d="M9 7V4h6v3"></path>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>
