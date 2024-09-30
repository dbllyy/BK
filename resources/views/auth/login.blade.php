<!DOCTYPE html>
<html>
<head>
    <title>Task Management</title>
    <link rel="stylesheet" type="text/css" href="slide_navbar_style.css">
    <link rel="icon" href="../images/logo-mini.png" type="image/png">
    <link rel="stylesheet" href="../css/login/styles.css"> <!-- Assuming you saved Google Fonts in this file -->
</head>
<body>
    <div class="main">  	
        <input type="checkbox" id="chk" aria-hidden="true">

        <div class="signup">
            <form>
                <label style="text-align: center;" for="chk" aria-hidden="true">Selamat Datang</label>
                <img src="../images/services.svg" alt="Gambar Layanan" style="display: block; margin: 20px auto; max-width: 75%; margin-top: -40px;">
            </form>
        </div>

        <div class="login">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <label for="chk" aria-hidden="true">Login Di Sini</label>
                <input type="name" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus autocomplete="username">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                <input type="password" name="password" placeholder="Password" required autocomplete="current-password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />

                <button type="submit">Login</button>

            </form>
        </div>
    </div>

    <script src="../js/logout.js"></script>
</body>
</html>
