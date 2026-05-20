<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login - Inventaris Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        .login-box {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h2 {
            text-align: center;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #007bff;
            border: none;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background: #0056b3;
        }

        .error {
            color: red;
            font-size: 13px;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="login-box">
        <h2>Login</h2>

        <?php if (isset($_GET['pesan']) && $_GET['pesan'] == "gagal"): ?>
            <p class="error">Username atau Password salah!</p>
        <?php endif; ?>

        <form action="proses_login.php" method="post">
            <label>Username</label>
            <input type="text" name="username" required placeholder="Masukkan username">

            <label>Password</label>
            <input type="password" name="password" required placeholder="Masukkan password">

            <button type="submit">Login</button>
        </form>
    </div>

</body>

</html>