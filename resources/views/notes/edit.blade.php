   <x-app-layout>
       <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6 mt-10">
           <h2 class="text-2xl font-bold mb-6">Edit Note</h2>

           <form method="POST" action="{{ route('notes.update', $note->id) }}">
               @csrf
                  @method('put')
               <!-- Title -->
               <div class="mb-4">
                   <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                   <input type="text" name="title" value="{{ $note->title }}" id="title"
                       class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                       maxlength="100" required>
               </div>

               <!-- Content -->
               <div class="mb-4">
                   <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Content</label>
                   <textarea name="content" id="content" rows="6"
                       class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>{{ $note->content }}</textarea>
               </div>

               <!-- Submit Button -->
               <div class="flex justify-end">
                   <button type="submit"
                       class="px-6 py-2 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700 transition">
                       Save Note
                   </button>
               </div>
           </form>
       </div>
   </x-app-layout>
