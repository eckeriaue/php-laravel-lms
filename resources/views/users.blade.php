<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Все пользователи') }}
        </h2>
    </x-slot>

    
    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <section class="grid grid-cols-5 auto-rows-[220px] p-6 gap-4 text-gray-900 dark:text-gray-100">
                    @foreach($users as $user)
                        <article class="flex flex-col items-center justify-center text-center shadow-lg rounded-2xl py-2 px-4 outline outline-gray-300 dark:outline-gray-700">
                            <p> {{ $user->name }} </p>
                            <p> {{ $user->email }} </p>
                        </article>
                    @endforeach
                </section>
            </div>
        </div>
    </div>

</x-app-layout>