<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('CSS/login.css')}}">
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <section class="login-section">
        <form action="/login" class="form">
            <span class="logo"><img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcRTZBxwrvdGaJ7KqVNsNOVofucXud0j0S6OpC_T2bRkN0BC8oAs-oLzZ0txf4rtjrlsQHQ0" alt="Health App Logo"></span>
            <h2>Welcome to Health</h2>
            <p>Log in using the form below</p>

            <div class="input-wrapper">
                <div class="input-content">
                    <label for="email">Email</label>
                    <input type="email" id="email" placeholder="example@gmail.com" required>
                    <span class="symbol">
                        <img src="img/user.svg" alt="">
                    </span>
                </div>

                <div class="input-content password-wrapper">
                    <label for="password">Password</label>
                    <input type="password" id="password" placeholder="Password" required>
                    <span class="symbol">
                        <img src="{{ asset('img/lock.svg') }}" alt="">
                    </span>
                    <span class="eye">
                        <img src="{{ asset('img/visibility-eye.svg') }}" alt="">
                    </span>
                </div>

                <a href="#" class="forgot-password">Forgot Password?</a>

                <div class="remember">
                    <input type="checkbox" name="remember" id="remember" checked>
                    <label for="remember">Remember me</label>
                </div>

                <button type="submit" class="btn">Log in</button>
            </div>

            <!-- <p class="or">Or</p>

            <div class="buttons">
                <button type="button" class="btn social-btn">
                    <img width="24" height="24" src="https://img.icons8.com/color/48/google-logo.png" alt="Google Logo">
                    Continue with Google
                </button>
                <button type="button" class="btn social-btn">
                    <img width="24" height="24" src="https://img.icons8.com/ios-filled/50/mac-os.png" alt="Apple Logo">
                    Continue with Apple
                </button>

                <span class="sign-up">Don't have an account? <a href="#">Sign Up</a></span>
            </div> -->
        </form>
    </section>

    <!-- JS -->
    <script>
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.querySelector('.eye img');
    
        eyeIcon.addEventListener('click', () => {
            const isPassword = passwordInput.type === 'password';
            passwordInput.type = isPassword ? 'text' : 'password';
            eyeIcon.src = isPassword ? "{{ asset('img/visibility-eye.svg') }}" : "{{ asset('img/no-visibility.svg') }}";
        });
    </script>


</body>
</html>