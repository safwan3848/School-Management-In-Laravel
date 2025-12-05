<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @include('home.auth.css')
</head>

<body>
    <div class="login-container">
        <div class="login-card">

            <div class="login-header">
                <div class="material-logo">
                    <div class="logo-layers">
                        <div class="layer layer-1"></div>
                        <div class="layer layer-2"></div>
                        <div class="layer layer-3"></div>
                    </div>
                </div>
                <h2>Login User</h2>
                <p>to continue to your account</p>
            </div>
            @if (session('error'))
                <div class="alert error-alert">
                    {{ session('error') }}
                </div>
            @endif

            {{-- LOGIN FORM FIXED --}}
            <form class="login-form" id="loginForm" method="POST" action="{{ route('login') }}" novalidate>
                @csrf

                <div class="form-group">
                    <div class="input-wrapper">
                        <input type="email" id="email" name="email" required autocomplete="email">
                        <label for="email">Email</label>
                        <div class="input-line"></div>
                        <div class="ripple-container"></div>
                    </div>
                    <span class="error-message" id="emailError">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="form-group">
                    <div class="input-wrapper password-wrapper">
                        <input type="password" id="password" name="password" required autocomplete="current-password">
                        <label for="password">Password</label>
                        <div class="input-line"></div>

                        <button type="button" class="password-toggle" id="passwordToggle"
                            aria-label="Toggle password visibility">
                            <div class="toggle-ripple"></div>
                            <span class="toggle-icon"></span>
                        </button>

                        <div class="ripple-container"></div>
                    </div>

                    <span class="error-message" id="passwordError">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="form-options">
                    <a href="#" class="forgot-password">Forgot password?</a>
                </div>

                <button type="submit" class="login-btn material-btn">
                    <div class="btn-ripple"></div>
                    <span class="btn-text">LOGIN</span>
                    <div class="btn-loader">
                        <svg class="loader-circle" viewBox="0 0 50 50">
                            <circle class="loader-path" cx="25" cy="25" r="12" fill="none"
                                stroke="currentColor" stroke-width="3" />
                        </svg>
                    </div>
                </button>
            </form>

            <div class="divider">
                <span>or</span>
            </div>

            <div class="social-login">
                <a href="{{ route('auth.google') }}" class="social-btn">
                    <div class="social-ripple"></div>
                    <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg"
                        class="social-icon-img" alt="Google">
                    <span>Continue with Google</span>
                </a>

                <a href="{{ route('auth.facebook') }}" class="social-btn">
                    <div class="social-ripple"></div>
                    <img src="https://www.svgrepo.com/show/448224/facebook.svg" class="social-icon-img" alt="Facebook">
                    <span>Continue with Facebook</span>
                </a>
            </div>

            <div class="signup-link">
                <p>Don't have an account?
                    <a href="{{ route('frontend.register') }}" class="create-account">
                        Create Account
                    </a>
                </p>
            </div>

            {{-- Success Message --}}
            <div class="success-message" id="successMessage">
                <div class="success-elevation">
                    <div class="success-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                        </svg>
                    </div>
                    <h3>Welcome!</h3>
                    <p>Signing you in...</p>
                </div>
            </div>

        </div>
    </div>

    @include('home.auth.script')
</body>

</html>
