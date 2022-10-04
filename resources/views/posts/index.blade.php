<x-app-layout>
    <x-slot:header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Posts') }}
        </h2>
    </x-slot:header>
    <div class="m-2 p-2 flex justify-end">
        <a href="{{ route('posts.create') }}" class="bg-green-400 hover:bg-green-600 text-white px-4 py-2">New Post</a>
    </div>
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50 dark:bg-gray-600 dark:text-gray-200">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                Id</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                Title</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                Image</th>
                            <th scope="col" class="relative px-6 py-3">Edit</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($posts as $post)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $post->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $post->title }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <img src="{{ asset($post->image) }}" class="w-16 h-auto">
                                </td>
                                <td class="px-6 py-4 text-right text-sm">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('posts.edit', $post->id) }}"
                                            class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Edit</a>
                                        <form class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white"
                                            method="POST" action="{{ route('posts.destroy', $post->id) }}"
                                            onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
