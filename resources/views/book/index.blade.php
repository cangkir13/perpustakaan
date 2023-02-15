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
                        <table class="table-auto w-full text-left">
                            <thead class="bg-teal-400 text-white">
                                <tr class="border-b">
                                    <th class="px-4 py-2 bg-gray-800 text-white font-bold uppercase text-sm">Id</th>
                                    <th class="px-4 py-2 bg-gray-800 text-white font-bold uppercase text-sm">Title</th>
                                    <th class="px-4 py-2 bg-gray-800 text-white font-bold uppercase text-sm">Author</th>
                                    <th class="px-4 py-2 bg-gray-800 text-white font-bold uppercase text-sm">Description</th>
                                    <th class="px-4 py-2 bg-gray-800 text-white font-bold uppercase text-sm">Category</th>
                                    <th class="px-4 py-2 bg-gray-800 text-white font-bold uppercase text-sm">Stock</th>
                                    <th class="px-4 py-2 bg-gray-800 text-white font-bold uppercase text-sm">Action</th>
                                  </tr>
                            </thead>
                            @foreach($books as $book)
                                <tbody>
                                    <tr class="bg-slate-500">
                                        <td class="border px-4 py-2">{{$book->id}}</td>
                                        <td class="border px-4 py-2">{{$book->title}}</td>
                                        <td class="border px-4 py-2">{{$book->author}}</td>
                                        <td class="border px-4 py-2">{{$book->description}}</td>
                                        <td class="border px-4 py-2">{{$book->category->name}}</td>
                                        <td class="border px-4 py-2">{{$book->stock}}</td>
                                        <td class="border px-6 py-2 text-center">
                                            <a href="book/{{$book->id}}/edit" class="bg-gray-400 text-black font-bold py-1 px-1 rounded border border-black">Edit</a>
                                            <a href="book/{{$book->id}}" class="bg-gray-400 text-black font-bold py-1 px-1 rounded border border-black pr-4">SHow</a>
                                            <form method="POST" action="{{ route('book.destroy', $book->id) }}">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="bg-gray-400 text-black font-bold py-1 px-3 rounded border border-black">Delete</button>
                                            </form>
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

<style>
.bg-gray-400 {
        background-color: #E2E8F0;
    }
    .text-black {
        color: #22292F;
    }
    .font-bold {
        font-weight: bold;
    }
    .py-2 {
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
    }
    .px-4 {
        padding-left: 1rem;
        padding-right: 1rem;
    }
    .rounded {
        border-radius: 0.25rem;
    }
    .border {
        border-width: 1px;
    }
    .border-black {
        border-color: #22292F;
    }
</style>
