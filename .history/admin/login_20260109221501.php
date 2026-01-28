<?php
session_start();
if(isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    // Ganti username & password sesukamu di sini
    if($user == "admin" && $pass == "zstudio123") {
        $_SESSION['admin_logged_in'] = true;
        header("Location: index.php");
    } else {
        $error = "Username atau Password Salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login Admin | Z-STUDIO</title>
</head>
<body class="bg-[#030712] flex items-center justify-center min-h-screen">
    <div class="bg-gray-900 p-10 rounded-[32px] border border-white/10 w-full max-w-sm shadow-2xl text-center">
        <h2 class="text-2xl font-bold text-blue-500 mb-6">ADMIN ACCESS</h2>
        <?php if(isset($error)): ?>
            <p class="text-red-500 text-xs mb-4"><?= $error ?></p>
        <?php endif; ?>
        <form method="POST" class="space-y-4">
            <input type="text" name="username" placeholder="Username" class="w-full p-4 bg-black/40 border border-gray-800 rounded-xl outline-none focus:border-blue-500 text-white" required>
            <input type="password" name="password" placeholder="Password" class="w-full p-4 bg-black/40 border border-gray-800 rounded-xl outline-none focus:border-blue-500 text-white" required>
            <button type="submit" name="login" class="w-full bg-blue-600 py-4 rounded-xl font-bold hover:bg-blue-700 transition">LOGIN</button>
        </form>
    </div>
</body>
</html>