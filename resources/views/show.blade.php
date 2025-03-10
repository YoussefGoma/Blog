<x-basic-layout>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
       <div class="max-w-3xl mx-auto space-y-6">
           <div class="bg-white rounded border border-gray-200">
               <div class="px-4 py-3 bg-gray-50 border-b border-gray-200 flex justify-between">
                   <h2 class="px-4 py-1 text-base font-medium text-gray-700">Post Info</h2>
                   <div class="flex space-x-2">
                   <a href="{{ route('posts.edit',$post->id) }}" class="px-3 py-1 bg-blue-600 text-white font-small rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 flex items-center justify-center">
                   Edit
                    </a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display:inline";>
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-3 py-2 text-base font-small text-white bg-red-600 rounded hover:bg-red-700 
                       focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 flex items-center justify-center">
                            Delete
                        </button>
                    </form>
               </div>
                </div>
               <div class="px-4 py-4">
                   <div class="mb-2">
                       <h3 class="px-4 py-1 text-lg font-medium text-gray-800">Title :- <span class="font-normal">{{$post->title}}</span></h3>
                   </div>
                   <div>
                       <h3 class="px-4 py-1 text-lg font-medium text-gray-800">Description :-</h3>
                       <p class="px-4 py-1 text-gray-600">{{$post->description}}</p>
                   </div>
               </div>
           </div>


           <div class="bg-white rounded border border-gray-200">
               <div class="px-4 py-3 bg-gray-50 border-b border-gray-200">
                   <h2 class=" px-4 py-1 text-base font-medium text-gray-700">Author Info</h2>
               </div>
               <div class="px-4 py-4">
                   <div class="mb-2">
                       <h3 class="px-4 py-1 text-lg font-medium text-gray-800">Name :- <span class="font-normal">{{$user->name}}</span></h3>
                   </div>
                   <div class="mb-2">
                       <h3 class="px-4 py-1 text-lg font-medium text-gray-800">Email :- <span class="font-normal">{{$user->email}}</span></h3>
                   </div>
                   <div>
                       <h3 class="px-4 py-1 text-lg font-medium text-gray-800">Created At :- <span class="font-normal">{{$user->created_at->format('l jS \\of F Y h:i:s A');}}</span></h3>
                   </div>
               </div>
           </div>


           <!-- Back Button -->
           <div class="flex justify-end">
               <a href="{{ route('posts.index') }}" class="px-4 py-2 bg-gray-600 text-white font-medium rounded hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                   Back to All Posts
               </a>
           </div>

           <div class="max-w-3xl mx-auto">
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-gray-800">Comments</h2>
                    </div>

                    <div class="px-6 py-4">
                        <form method="post" action={{route('comments.store',$post->id)}}>
                            @csrf
                            <!-- Description Textarea -->
                            <div class="mb-4">
                                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                <textarea
                                    name="content"
                                    id="content"
                                    rows="2"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 py-2 px-3 border"
                                ></textarea>
                            </div>
                            
                            <div class="mb-6">
                                <label for="creator" class="block text-sm font-medium text-gray-700 mb-1">comment Creator</label>
                                <select
                                    name="author"
                                    id="author"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 py-2 px-3 border bg-white"
                                >
                                    @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="postId" value="{{$post->id}}">
                            <div class="flex justify-end">
                                <button
                                    type="submit"
                                    class="px-4 py-2 bg-green-600 text-white font-medium rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 hover:cursor-pointer"
                                >Add Comment</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
       </div>

   <!-- Display Comments Section -->
<div class="max-w-3xl mx-auto mt-8 bg-white rounded-lg shadow overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-200">
        <h2 class="text-xl font-semibold text-gray-800">All Comments</h2>
    </div>

    <div class="px-6 py-4 space-y-4">
        @foreach ($post->comments->reverse() as $comment)
            <div class="bg-gray-100 rounded-lg p-4 shadow-md">
                <div class="flex items-center space-x-3 justify-between">
                    <div>
                    <div class="text-lg font-semibold text-gray-800">{{ $comment->user->name }}</div>
                    <span class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="flex space-x-2">
                        <a href="{{ route('comments.edit',$comment->id) }}" class="px-3 py-1 bg-blue-600 text-white font-small rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 flex items-center justify-center">
                        Edit
                            </a>
                            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display:inline";>
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-3 py-1 text-base font-small text-white bg-red-600 rounded hover:bg-red-700 
                            focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 flex items-center justify-center">
                                    Delete
                                </button>
                            </form>
                    </div>
                </div>
                <p class="text-gray-700 mt-2">{{ $comment->content }}</p>
            </div>
        @endforeach
    </div>
</div>
   </div>
</x-basic-layout>
