<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    @can('create','App\\Models\Post')
                        <button type="button" class="p-6 text-white dark:bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition duration-300 ease-in-out shadow-md">
                            Create new post
                        </button>
                    @endcan                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    title
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    content
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    user_id
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ( $posts as $post )
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $post->id }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ Str::limit($post->title , 50 , '...') }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ Str::limit($post->content , 50 , '...') }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $post->user_id }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @can('view',$post)
                                                <a href="{{ route('posts.show' , $post->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Show</a>
                                            @endcan
                                            @can('update',$post)
                                                |
                                                <a href="{{ route('posts.edit' , $post->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                            @endcan
                                            @can('delete',$post)
                                                |
                                                <a href="{{ route('posts.delete' , $post->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
