   <x-app-layout>
       <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6 mt-10">
           <h2 class="text-2xl font-bold mb-6">{{ $note->title }}</h2>

           <p class="text-gray-800 dark:text-gray-100 mb-4">{{ $note->content }}</p>

               <div class="flex items-center text-gray-600">
                   <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 me-2" viewBox="0 0 20 20" fill="currentColor">
                       <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm11 5H4V6h13v1z" clip-rule="evenodd" />
                   </svg>
                   <span class="text-sm">Created on {{ $note->created_at->format('F j, Y') }}</span>
               </div>
           </div>
   </x-app-layout>
