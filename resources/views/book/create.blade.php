<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Book create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-80 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h1>Create new book</h1>
                    <form action="{{ route('book.store') }}" method="POST" class="mt-6 space-y-6">
                        @csrf
                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="author" :value="__('Author')" />
                            <x-text-input id="author" class="block mt-1 w-full" type="text" name="author" :value="old('author')" required autofocus autocomplete="author" />
                            <x-input-error :messages="$errors->get('author')" class="mt-2" />
                        </div>
                        <div class="flex items-center ">
                            <x-primary-button >
                                {{ __('Submit') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
