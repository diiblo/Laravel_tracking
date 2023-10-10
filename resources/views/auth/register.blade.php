<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Noms')" />
            <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- surname -->
        <div class="mt-4">
            <x-input-label for="surname" :value="__('Prénoms')" />
            <x-text-input id="surname" class="block w-full mt-1" type="text" name="surname" :value="old('surname')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('surname')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Mot de passe')" />

            <x-text-input id="password" class="block w-full mt-1"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />

            <x-text-input id="password_confirmation" class="block w-full mt-1"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        
        {{-- Fonctions --}}
        <div class="mt-4">
            <x-input-label for="fonction" :value="__('Votre fonction')" />
            <select name="fonction" class="border-gray-300 dark:border-gray-700 bg-gray-200 text-black focus:border-[#266ba2]  focus:ring-[#266ba2]  rounded-md shadow-sm" id="fonction">
                @foreach ( $fonctions as $fonction )
                
                    <option value="{{ $fonction->id }}">{{ $fonction->nameFon }}</option>
                     
                @endforeach
            </select>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="text-gray-600 underline rounded-md text-sm hover:text-[#266ba2] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Vous avez déjà un compte ?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Enregistrez') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
