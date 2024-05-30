<x-guest-layout>
    <x-authentication-card class="bg-white shadow-md rounded-lg p-8 max-w-lg mx-auto my-12">
        <!-- Logo Section -->
        <x-slot name="logo">
            <div class="flex justify-center mb-6">
                <x-authentication-card-logo class="w-24 h-24" />
            </div>
        </x-slot>

        <!-- Validation Errors -->
        <x-validation-errors class="mb-4 text-red-600" />

        <!-- Registration Form -->
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name Input -->
            <div class="mb-4">
                <x-label for="name" value="{{ __('Name') }}" class="block font-semibold text-lg" />
                <x-input id="name" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <!-- Email Input -->
            <div class="mb-4">
                <x-label for="email" value="{{ __('Email') }}" class="block font-semibold text-lg" />
                <x-input id="email" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <!-- Password Input -->
            <div class="mb-4">
                <x-label for="password" value="{{ __('Password') }}" class="block font-semibold text-lg" />
                <x-input id="password" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="password" name="password" required autocomplete="new-password" />
            </div>

            <!-- Confirm Password Input -->
            <div class="mb-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="block font-semibold text-lg" />
                <x-input id="password_confirmation" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <!-- Terms and Privacy Policy -->
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mb-4">
                    <x-label for="terms" class="flex items-center">
                        <x-checkbox name="terms" id="terms" required class="mr-2 border-gray-300 rounded shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                        <span class="text-sm text-gray-600">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-indigo-600 hover:text-indigo-900">'.__('Terms of Service').'</a>',
                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-indigo-600 hover:text-indigo-900">'.__('Privacy Policy').'</a>',
                            ]) !!}
                        </span>
                    </x-label>
                </div>
            @endif

            <!-- Register Button and Login Link -->
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-indigo-600 hover:text-indigo-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
