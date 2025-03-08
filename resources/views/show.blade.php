<x-basic-layout>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
       <div class="max-w-3xl mx-auto space-y-6">
           <div class="bg-white rounded border border-gray-200">
               <div class="px-4 py-3 bg-gray-50 border-b border-gray-200 flex justify-between">
                   <h2 class="px-4 py-1 text-base font-medium text-gray-700">Post Info</h2>
                   <a href="{{ route('posts.edit',$post['id']) }}" class="px-4 py-1 bg-green-600 text-white font-medium rounded hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                   Edit
                    </a>
               </div>
               <div class="px-4 py-4">
                   <div class="mb-2">
                       <h3 class="px-4 py-1 text-lg font-medium text-gray-800">Title :- <span class="font-normal">{{$post['title']}}</span></h3>
                   </div>
                   <div>
                       <h3 class="px-4 py-1 text-lg font-medium text-gray-800">Description :-</h3>
                       <p class="px-4 py-1 text-gray-600">{{$post['desc']}}</p>
                   </div>
               </div>
           </div>


           <div class="bg-white rounded border border-gray-200">
               <div class="px-4 py-3 bg-gray-50 border-b border-gray-200">
                   <h2 class=" px-4 py-1 text-base font-medium text-gray-700">Author Info</h2>
               </div>
               <div class="px-4 py-4">
                   <div class="mb-2">
                       <h3 class="px-4 py-1 text-lg font-medium text-gray-800">Name :- <span class="font-normal">{{$post['author']['name']}}</span></h3>
                   </div>
                   <div class="mb-2">
                       <h3 class="px-4 py-1 text-lg font-medium text-gray-800">Email :- <span class="font-normal">{{$post['author']['email']}}</span></h3>
                   </div>
                   <div>
                       <h3 class="px-4 py-1 text-lg font-medium text-gray-800">Created At :- <span class="font-normal">{{$post['created_at']}}</span></h3>
                   </div>
               </div>
           </div>


           <!-- Back Button -->
           <div class="flex justify-end">
               <a href="{{ route('posts.index') }}" class="px-4 py-2 bg-gray-600 text-white font-medium rounded hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                   Back to All Posts
               </a>
           </div>
       </div>
   </div>
</x-basic-layout>
