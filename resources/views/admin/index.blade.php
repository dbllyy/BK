<!DOCTYPE html>
<html>

<head>
    <title>Task Management - Login</title>
    <link rel="stylesheet" type="text/css" href="slide_navbar_style.css">
    <link rel="icon" href="../images/logo-mini.png" type="image/png">
    <link rel="stylesheet" href="../css/login/styles.css"> <!-- Assuming styles for your form -->
</head>

<body>
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">

        <div class="signup">
            <form>
                <label style="text-align: center;" for="chk" aria-hidden="true">Selamat Datang</label>
                <img src="../images/services.svg" alt="Gambar Layanan"
                    style="display: block; margin: 20px auto; max-width: 75%; margin-top: -40px;">
            </form>
        </div>

        <div class="login">
            <!-- Form login Laravel -->
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Label login -->
                <label for="chk" aria-hidden="true">Login Di Sini</label>

                <!-- Input Nama_Staff -->
                <input type="text" name="Nama_Staff" placeholder="Username" value="{{ old('Nama_Staff') }}" required
                    autofocus autocomplete="username">
                <!-- Menampilkan error jika ada -->
                <x-input-error :messages="$errors->get('Nama_Staff')" class="mt-2" />

                <!-- Input Password -->
                <input type="password" name="password" placeholder="Password" required autocomplete="current-password">
                <!-- Menampilkan error jika ada -->
                <x-input-error :messages="$errors->get('password')" class="mt-2" />

                <!-- Tombol submit -->
                <button type="submit">Login</button>
            </form>

            <!-- Menampilkan error pesan global -->
            @if($errors->any())
                <div>
                    <p>{{ $errors->first() }}</p>
                </div>
            @endif
        </div>
    </div>

    <script src="../js/logout.js"></script>
</body>

</html>
