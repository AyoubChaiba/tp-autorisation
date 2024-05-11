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
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
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
                                        @can('update',$post)
                                            <td class="px-6 py-4">
                                                <a href="{{ route('posts.edit' , $post->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                            </td>
                                        @endcan
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
