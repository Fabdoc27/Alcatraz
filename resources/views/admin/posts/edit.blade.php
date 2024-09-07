@section('title', 'Edit Post: ' . $post->title)

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Edit Post: {{ $post->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{-- Post Form --}}
                    <form method="post" action="{{ route('admin.posts.update', $post) }}" class="space-y-6">
                        @csrf
                        @method('PUT')

                        {{-- Title --}}
                        <div>
                            <x-input-label for="title" value="Title" class="mb-2" />
                            <x-text-input id="title" name="title" type="text" class="block w-full mt-1"
                                :value="old('title', $post->title)" required autofocus autocomplete="title" />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        {{-- Category --}}
                        <div>
                            <x-input-label for="categories" value="Category" class="mb-2" />
                            <select
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600"
                                id="categories" name="category_id" required>
                                <option selected>Choose a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected(old('category_id', $post->category->id) === $category->id)>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
                        </div>

                        {{-- Content --}}
                        <div>
                            <x-input-label for="content" value="Content" class="mb-2" />
                            <textarea id="content" rows="4"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                name="content" autocomplete="content" required placeholder="Write your thoughts here...">{{ old('content', $post->content) }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('content')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>Update</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
