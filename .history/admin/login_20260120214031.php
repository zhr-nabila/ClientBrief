<?php
session_start();
if (isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    if ($user === "admin" && $pass === "admin123") {
        $_SESSION['admin_logged_in'] = true;
        header("Location: index.php");
        exit();
    } else {
        $error = "Username atau Password salah.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Admin Login | ClientBrief</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #0f172a; /* Warna gelap agar blur terlihat */
        }

        /* CSS KHUSUS UNTUK MENGHILANGKAN PUTIH AUTOFILL */
        input:-webkit-autofill,
        input:-webkit-autofill:hover, 
        input:-webkit-autofill:focus {
            -webkit-text-fill-color: white;
            -webkit-box-shadow: 0 0 0px 1000px rgba(255, 255, 255, 0.05) inset;
            transition: background-color 5000s ease-in-out 0s;
            backdrop-filter: blur(12px);
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen p-6">
    <div class="w-full max-w-md bg-white/[0.02] border border-white/10 p-10 rounded-[32px] backdrop-blur-xl shadow-2xl">
        <div class="text-center mb-10">
            <h1 class="text-2xl font-black tracking-tighter text-white">ClientBrief <span class="text-blue-500">ADMIN</span></h1>
            <p class="text-gray-500 text-sm mt-2">Silakan masuk untuk mengelola projek.</p>
        </div>

        <?php if (isset($error)): ?>
            <div class="bg-red-500/10 border border-red-500/20 text-red-500 text-xs p-4 rounded-xl mb-6 text-center"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST" class="space-y-4">
            <div>
                <label class="text-[10px] font-bold text-gray-500 uppercase tracking-widest ml-1 mb-2 block">Username</label>
                <input type="text" name="username" 
                    class="w-full bg-white/[0.05] border border-white/10 p-4 rounded-xl text-white outline-none focus:border-blue-500 transition backdrop-blur-md" 
                    required autocomplete="off">
            </div>
            <div>
                <label class="text-[10px] font-bold text-gray-500 uppercase tracking-widest ml-1 mb-2 block">Password</label>
                <input type="password" name="password" 
                    class="w-full bg-white/[0.05] border border-white/10 p-4 rounded-xl text-white outline-none focus:border-blue-500 transition backdrop-blur-md" 
                    required>
            </div>
            <button type="submit" name="login" 
                class="w-full bg-blue-600 py-4 rounded-2xl font-bold text-white mt-4 hover:bg-blue-700 transition shadow-lg shadow-blue-600/20">
                Masuk
            </button>
        </form>
    </div>
</body>

</html>