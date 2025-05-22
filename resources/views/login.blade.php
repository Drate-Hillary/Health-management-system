<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('CSS/login.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <section class="login-section">
        <form action="{{ route('login') }}" class="form" method="POST">
            @csrf

            <span class="logo"><img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcRTZBxwrvdGaJ7KqVNsNOVofucXud0j0S6OpC_T2bRkN0BC8oAs-oLzZ0txf4rtjrlsQHQ0" alt="Health App Logo"></span>
            <h2>Welcome to Health</h2>
            <p>Log in using the form below</p>

            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <div class="input-wrapper">
                <div class="input-content">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="example@gmail.com" required>
                    <span class="symbol">
                        <img src="{{ asset('img/user.svg') }}" alt="">
                    </span>
                </div>

                <div class="input-content password-wrapper">
                    <a href="#" class="forgot-password">Forgot my ID?</a>
                    <label for="empid">Doctor or Patient ID</label>
                    <input type="password" id="empid" name="empid" placeholder="Enter your Doctor/Patient ID" required>
                    <span class="symbol">
                        <img src="{{ asset('img/lock.svg') }}" alt="">
                    </span>
                    <span class="eye">
                        <img src="{{ asset('img/visibility-eye.svg') }}" alt="">
                    </span>
                </div>

                <div class="remember">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Remember me</label>
                </div>

                <button type="submit" class="btn">Log in</button>
            </div>
        </form>
    </section>

    <script>
        const passwordInput = document.getElementById('empid');
        const eyeIcon = document.querySelector('.eye img');

        eyeIcon.addEventListener('click', () => {
            const isPassword = passwordInput.type === 'password';
            passwordInput.type = isPassword ? 'text' : 'password';
            eyeIcon.src = isPassword ? "{{ asset('img/no-visibility.svg') }}" : "{{ asset('img/visibility-eye.svg') }}";
        });
    </script>
</body>

</html>