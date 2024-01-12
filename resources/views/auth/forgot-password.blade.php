<x-layout.auth>

    <div
        class="flex justify-center items-center min-h-screen bg-[url('/assets/images/map.svg')] dark:bg-[url('/assets/images/map-dark.svg')] bg-cover bg-center">
        <div class="panel sm:w-[480px] m-6 max-w-lg w-full">
            <h2 class="font-bold text-2xl mb-3">Password Reset</h2>
            <p class="mb-7">{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}</p>

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <x-validation-errors class="mb-4" />
            <form class="space-y-5" action="{{ route('password.email') }}">
                <div>
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" class="form-input" placeholder="Enter Email" autoComplete="off" />
                </div>
                <button class="btn btn-primary w-full">
                {{ __('Email Password Reset Link') }}
                </button>
            </form>
        </div>
    </div>

</x-layout.auth>
