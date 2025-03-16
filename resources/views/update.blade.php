<x-basic-layout>
<div class="max-w-3xl mx-auto">
    @if ($errors->any())
    <div role="alert" class="rounded-sm border-s-4 border-red-500 bg-red-50 p-4 mb-2">
        <div class="flex items-center gap-2 text-red-800">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
            <path
              fill-rule="evenodd"
              d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
              clip-rule="evenodd"
            />
          </svg>
      
          <strong class="block font-medium"> Something went wrong </strong>
        </div>
        @foreach ($errors->all() as $error)
        <p class="mt-2 text-sm text-red-700"> - {{ $error }}</p>
        @endforeach
        
      </div>
      @endif
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800">New Post</h2>
            </div>

            <div class="px-6 py-4">
                <form method="POST" action={{route('posts.update',$post->id)}} enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <!-- Title Input -->
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                        <input
                            name="title"
                            type="text"
                            id="title"
                            value={{$post->title}}
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
                        >{{$post->description}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Post Image (jpg, png only)</label>
                        @if ($post->image)
                            <div class="mb-2">
                                <img src="{{ $post->image_url }}" alt="Current image" style="max-width: 200px;">
                                <p>Current image</p>
                            </div>
                        @endif
                        <input
                        type="file"
                        name="image"
                        id="image"
                        accept=".jpg,.png"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 py-2 px-3 border"
                    >
                        <small class="text-muted">Leave empty to keep current image</small>
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
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
                            <option value="{{$user->id}}" {{$user->id==$post->user_id ? 'selected' : ''}}>{{$user->name}}</option>
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