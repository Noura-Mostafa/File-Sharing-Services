<x-auth-layout title="Login">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="container w-50 p-5  rounded bg-light">
        <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email">Email</label>
            <input id="email" class="form-control" type="email" name="email" value="{{old('email')}}" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password">Password</label>

            <input id="password" class="form-control"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded" name="remember">
                <span class="">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="mt-4 d-flex justify-content-between">
            @if (Route::has('password.request'))
                <a class="" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

           <button class="btn btn-primary" type="submit">Login</button>
        </div>
    </form>
    </div>
    
</x-auth-layout>
