<x-basic-layout>
    <div class="text-center">
        <a href="{{ route('posts.create') }}"
            class="mt-4 px-4 py-2 bg-green-600 text-white font-medium rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
            Create Post
        </a>
    </div>

    <div class="mt-6 rounded-lg border border-gray-200">
        <div class="overflow-x-auto rounded-t-lg">
            <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                <thead class="text-left">
                    <tr>
                        <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">#</th>
                        <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Title</th>
                        <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Posted By</th>
                        <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Created At</th>
                        <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($posts as $post)
                        <tr>
                            <td class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">{{ $post->id }}</td>
                            <td class="px-4 py-2 whitespace-nowrap text-gray-700">{{$post->title}}</td>
                            <td class="px-4 py-2 whitespace-nowrap text-gray-700">
                                {{ $post->user->name ? $post->user->name : "No User Found" }}</td>
                            <td class="px-4 py-2 whitespace-nowrap text-gray-700">{{ $post->created_at->toDateString() }}
                            </td>
                            <td class="px-4 py-2 whitespace-nowrap text-gray-700 space-x-2">
                            <div class="flex space-x-2">
                                <a href="{{ route('posts.show', $post->id) }}"
                                    class="inline-block px-4 py-1 text-xs font-medium text-white bg-green-600 rounded hover:bg-green-700">View</a>
                                @if($post->trashed())
                                
                                <form action="{{ route('posts.restore', $post->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit"
                                        class="inline-block px-3 py-1 text-xs font-medium text-white bg-blue-600 rounded hover:bg-blue-700">
                                        Restore
                                    </button>
                                </form>
                                <form action="{{ route('posts.forceDestroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display:inline";>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-block px-3 py-1 text-xs font-small text-white bg-red-600 rounded hover:bg-red-700">
                                        Permenant Delete
                                    </button>
                                </form>
                                @else
                                <a href="{{ route('posts.edit', $post->id) }}"
                                    class="inline-block px-4 py-1 text-xs font-medium text-white bg-blue-600 rounded hover:bg-blue-700">Edit</a>
                                {{-- <a href="#"
                                    class="inline-block px-4 py-1 text-xs font-medium text-white bg-red-600 rounded hover:bg-red-700">Delete</a> --}}
                                <span>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display:inline";>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-block px-3 py-1 text-xs font-medium text-white bg-red-600 rounded hover:bg-red-700">
                                        Delete
                                    </button>
                                </form>
                                <span>
                            @endif
                            </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
                   
                    {{-- <p class="text-sm text-gray-700 leading-5 dark:text-gray-400">
                            Showing <span class="font-medium">{{$posts->firstItem()}}</span> to <span class="font-medium">
                                {{$posts->lastItem()}} </span> of <span class="font-medium">{{$posts->total()}}</span> results
                        </p> --}}

                    <div class="m-4">
                        {{ $posts->onEachSide(3)->links() }}
                    </div>

                </div>




</x-basic-layout>