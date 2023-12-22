<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Информация о профиле') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Обновите информацию о профиле и адрес электронной почты своей учетной записи.") }}
        </p>


        <div class="mt-2 mb-4">
            <label
                class="ms-2 text-sm text-gray-600 dark:text-gray-400"
                x-data="{
                    enableToggleTransition: false,
                    toggleTheme(event) {
                        this.enableToggleTransition = true
                        localStorage.setItem('currentTheme', event.target.checked ? 'dark' : '')
                        if (event.target.checked) {
                            document.documentElement.classList.add('dark')
                        }
                        else {
                            document.documentElement.classList.remove('dark')
                        }

                        const timer = setTimeout(() => {
                            this.enableToggleTransition = false
                            clearTimeout(timer)
                        }, 200)
                    }
                }"
            >
            <template x-if="enableToggleTransition">
                <style>
                    * {transition: all; transition-duration: 150ms;}
                </style>
            </template>

                <input
                    @input="toggleTheme($event)"
                    type="checkbox"
                    :checked="localStorage.currentTheme === 'dark'"
                    class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-sky-600 shadow-sm focus:ring-sky-500 dark:focus:ring-sky-600 dark:focus:ring-offset-gray-800">
                темный режим
            </label>
        </div>
    </header>


    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Имя')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Ваш адрес электронной почты непроверен.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500 dark:focus:ring-offset-gray-800">
                            {{ __('Нажмите здесь, чтобы повторно отправить письмо для проверки.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('На ваш адрес электронной почты отправлена новая ссылка для проверки.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Сохранить') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Сохранено.') }}</p>
            @endif
        </div>
    </form>
</section>
