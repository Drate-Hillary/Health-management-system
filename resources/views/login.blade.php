<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
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
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17 9.6875H7C5.61929 9.6875 4.5 10.7228 4.5 12V18.9375C4.5 20.2147 5.61929 21.25 7 21.25H17C18.3807 21.25 19.5 20.2147 19.5 18.9375V12C19.5 10.7228 18.3807 9.6875 17 9.6875Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.375 9.6875V7.375C7.375 6.14837 7.86228 4.97199 8.72963 4.10463C9.59699 3.23728 10.7734 2.75 12 2.75C13.2266 2.75 14.403 3.23728 15.2704 4.10463C16.1377 4.97199 16.625 6.14837 16.625 7.375V9.6875" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M8.53128 17.7812H15.4688" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    <span class="eye">
                        <img src="img/visibility-eye.svg" alt="">
                    </span>
                </div>

                <a href="#" class="forgot-password">Forgot Password?</a>

                <div class="remember">
                    <input type="checkbox" name="remember" id="remember" checked>
                    <label for="remember">Remember me</label>
                </div>

                <button type="submit" class="btn">Log in</button>
            </div>

            <p class="or">Or</p>

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
            </div>
        </form>
    </section>

    <!-- JS -->
    <script>
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.querySelector('.eye img');
    
        eyeIcon.addEventListener('click', () => {
            const isPassword = passwordInput.type === 'password';
            passwordInput.type = isPassword ? 'text' : 'password';
            eyeIcon.src = isPassword ? 'img/visibility-eye.svg' : 'img/no-visibility.svg';
        });
    </script>


</body>
</html>