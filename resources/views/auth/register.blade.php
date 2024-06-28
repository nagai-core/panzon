<x-guest-layout>

    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf
        <div class="mt-4">
            <p class="text-lg font-semibold text-gray-700">ユーザ登録</p>
        </div>
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>


        <!-- Username -->
        <div class="mt-4">
            <x-input-label for="username" :value="__('ユーザーネーム')" />
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Icon -->
        <div class="mt-4">
            <x-input-label for="icon" :value="__('アイコン')" />
            <x-text-input id="icon" class="block mt-1 w-full" type="file" name="icon" accept="image/*" />
            <x-input-error :messages="$errors->get('icon')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="address" :value="__('住所')" />
            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')"
                required autocomplete="address" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <!-- Postcode -->
        <div class="mt-4">
            <x-input-label for="postcode" :value="__('郵便番号')" />
            <x-text-input id="postcode" class="block mt-1 w-full" type="text" name="postcode" :value="old('postcode')"
                required autocomplete="postcode" />
            <x-input-error :messages="$errors->get('postcode')" class="mt-2" />
        </div>


        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
