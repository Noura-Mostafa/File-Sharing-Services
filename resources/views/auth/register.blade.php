<x-auth-layout title="Register">

<div class="container w-50 p-5  rounded bg-light">

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <label for="name">Name</label>
            <input id="name" class="form-control" type="text" name="name" :value="{{old('name')}}" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <label for="email">email</label>
            <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password">Password</label>

            <input id="password" class="form-control"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <label for="password_confirmation">Confirm Password</label>

            <input id="password_confirmation" class="form-control"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-4 d-flex justify-content-between">
            <a class="" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <button class="btn btn-primary" type="submit">Register</button>

        </div>
    </form>

</div>
</x-auth-layout>
