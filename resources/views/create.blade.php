<x-basic-layout>
<div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800">{{isset($post) ?'Edit Post':'New Post'}}</h2>
            </div>

            <div class="px-6 py-4">
                <form method="POST" action="/posts{{isset($post) ? '/'.$post['id']:''}}">
                    @csrf
                    <!-- Title Input -->
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                        <input
                            name="title"
                            type="text"
                            id="title"
                            value= "{{isset($post) ? $post['title'] : ""}}"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 py-2 px-3 border"
                        >
                    </div>
                    
                    <!-- Description Textarea -->
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea
                            name="description"
                            id="description"
                            rows="5"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 py-2 px-3 border"
                        >{{isset($post)? $post['desc']:''}}</textarea>
                    </div>
                    
                    <div class="mb-6">
                        <label for="creator" class="block text-sm font-medium text-gray-700 mb-1">Post Creator</label>
                        <select
                            name="post_creator"
                            id="creator"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 py-2 px-3 border bg-white"
                        >
                            <option value="1" {{ isset($post) && $post['author']['name'] == 'Ahmed' ? 'selected' : '' }} >Ahmed</option>
                            <option value="2" {{ isset($post) && $post['author']['name'] == 'Youssef' ? 'selected' : '' }}>Youssef</option>
                            <option value="3" {{ isset($post) && $post['author']['name'] == 'Ali' ? 'selected' : '' }}>Ali</option>

                        </select>
                    </div>
                    <div class="flex justify-end">
                        <button
                            type="submit"
                            class="px-4 py-2 bg-green-600 text-white font-medium rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 hover:cursor-pointer"
                        >
                            {{isset($post) ?'Update':'Submit'}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-basic-layout>