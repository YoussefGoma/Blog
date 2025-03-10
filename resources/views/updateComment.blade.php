<x-basic-layout>
<div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800">Edit Comment</h2>
            </div>

            <div class="px-6 py-4">
                <form method="POST" action={{route('comments.update',$comment->id)}}>
                    @csrf
                    @method('put')                    
                    <!-- Description Textarea -->
                    <div class="mb-4">
                        <label for="content" class="block text-sm font-medium text-gray-700 mb-1">content</label>
                        <textarea
                            name="content"
                            id="content"
                            rows="2"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 py-2 px-3 border"
                        >{{$comment->content}}</textarea>
                    </div>
                    
                    <div class="mb-6">
                        <label for="creator" class="block text-sm font-medium text-gray-700 mb-1">Post Creator</label>
                        <select
                            name="post_creator"
                            id="author"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 py-2 px-3 border bg-white"
                            disabled
                        >
                            @foreach ($users as $user)
                            <option value="{{$user->id}}" {{$user->id==$comment->user_id ? 'selected' : ''}}>{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex justify-end">
                        <button
                            type="submit"
                            class="px-4 py-2 bg-green-600 text-white font-medium rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 hover:cursor-pointer"
                        >
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-basic-layout>