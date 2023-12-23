<x-app-layout>
    <x-slot name="header">
        <h2>
            <span>{{ $category->name }}</span>
            <span> / </span>
            <span class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight"> {{ $course->name }} </span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ $course->lessons }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
