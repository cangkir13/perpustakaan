<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-primary-button class="mb-4">
                        <a href="book/create">{{ __('create new book') }}</a>
                    </x-primary-button>
                    @isset($books)
                        <table class="border-collapse border border-slate-400">
                            <thead>
                                <tr>
                                    <th class="border border-slate-300 ">Title</th>
                                    <th class="border border-slate-300">Author</th>
                                    <th class="border border-slate-300">Description</th>
                                    <th class="border border-slate-300">Category</th>
                                    <th class="border border-slate-300">Stock</th>
                                    <th class="border border-slate-300">Action</th>
                                </tr>
                            </thead>
                            @foreach($books as $book)
                                <tbody>
                                    <tr>
                                        <td class="border border-slate-300">{{$book->title}}</td>
                                        <td class="border border-slate-300">{{$book->author}}</td>
                                        <td class="border border-slate-300">{{$book->description}}</td>
                                        <td class="border border-slate-300">{{$book->category->name}}</td>
                                        <td class="border border-slate-300">{{$book->stock}}</td>
                                        <td class="border border-slate-300">
                                            <a href="book/{{$book->id}}/edit">Edit</a>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
