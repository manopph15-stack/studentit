<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('Log in') }} · {{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <main class="auth-scene">
        <section class="login-artboard" aria-labelledby="login-title">
            <div class="login-avatar" aria-hidden="true">
                <svg viewBox="0 0 48 48" fill="none">
                    <circle cx="24" cy="15" r="8.5"></circle>
                    <path d="M7.5 40c1.8-9 7.7-13.5 16.5-13.5S38.7 31 40.5 40"></path>
                </svg>
            </div>

            <div class="login-panel">
                <h1 id="login-title" class="sr-only">{{ __('Log in to your account') }}</h1>

                <x-auth-session-status class="login-status" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="login-form">
                    @csrf

                    <div class="login-field">
                        <label class="sr-only" for="email">{{ __('Email') }}</label>
                        <div class="login-input-row">
                            <span class="login-input-icon" aria-hidden="true">
                                <svg viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10 10a3.25 3.25 0 1 0 0-6.5A3.25 3.25 0 0 0 10 10Zm0 1.5c-3.1 0-5.5 1.7-5.5 4v1h11v-1c0-2.3-2.4-4-5.5-4Z"></path>
                                </svg>
                            </span>
                            <input
                                id="email"
                                class="login-input"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="{{ __('Email address') }}"
                                autocomplete="username"
                                required
                                autofocus
                                aria-invalid="{{ $errors->has('email') ? 'true' : 'false' }}"
                            >
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="login-field-error" />
                    </div>

                    <div class="login-field">
                        <label class="sr-only" for="password">{{ __('Password') }}</label>
                        <div class="login-input-row">
                            <span class="login-input-icon" aria-hidden="true">
                                <svg viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M6.5 8V6a3.5 3.5 0 1 1 7 0v2h.75A1.75 1.75 0 0 1 16 9.75v5.5A1.75 1.75 0 0 1 14.25 17h-8.5A1.75 1.75 0 0 1 4 15.25v-5.5A1.75 1.75 0 0 1 5.75 8h.75Zm1.75 0h3.5V6a1.75 1.75 0 1 0-3.5 0v2Z"></path>
                                    <circle cx="10" cy="12" r="1"></circle>
                                </svg>
                            </span>
                            <input
                                id="password"
                                class="login-input"
                                type="password"
                                name="password"
                                placeholder="{{ __('Password') }}"
                                autocomplete="current-password"
                                required
                                aria-invalid="{{ $errors->has('password') ? 'true' : 'false' }}"
                            >
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="login-field-error" />
                    </div>

                    <div class="login-options">
                        <label class="remember-option" for="remember">
                            <input
                                id="remember"
                                type="checkbox"
                                name="remember"
                                value="1"
                                @checked(old('remember'))
                            >
                            <span>{{ __('Remember me') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="forgot-link" href="{{ route('password.request') }}">
                                {{ __('Forgot password?') }}
                            </a>
                        @endif
                    </div>

                    <button class="login-submit" type="submit">{{ __('Log in') }}</button>
                </form>

                @if (Route::has('register'))
                    <p class="register-prompt">
                        {{ __("Don't have an account?") }}
                        <a href="{{ route('register') }}">{{ __('Register') }}</a>
                    </p>
                @endif
            </div>
        </section>
    </main>
</body>
</html>