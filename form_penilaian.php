<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Penilaian Mahasantri</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
* {
    box-sizing: border-box;
}

body {
    margin: 0;
    min-height: 100vh;
    font-family: 'Segoe UI', Arial, sans-serif;
    background: linear-gradient(270deg, #0f2027, #203a43, #2c5364, #1cb5e0);
    background-size: 600% 600%;
    animation: gradientBG 15s ease infinite;
    display: flex;
    align-items: center;
    justify-content: center;
}

@keyframes gradientBG {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

.container {
    background: rgba(18, 18, 18, 0.92);
    backdrop-filter: blur(10px);
    width: 100%;
    max-width: 520px;
    padding: 32px;
    border-radius: 18px;
    box-shadow: 0 25px 60px rgba(0,0,0,0.7);
    color: #fff;
    animation: fadeIn 0.8s ease;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(25px); }
    to { opacity: 1; transform: translateY(0); }
}

h2 {
    text-align: center;
    margin-bottom: 28px;
    font-size: 24px;
    background: linear-gradient(90deg, #00ffcc, #1cb5e0);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.form-group {
    margin-bottom: 18px;
}

label {
    display: block;
    margin-bottom: 6px;
    font-weight: 600;
    color: #bfffea;
}

input, select {
    width: 100%;
    padding: 12px;
    border-radius: 8px;
    border: 1px solid #333;
    background: #111;
    color: #fff;
    transition: 0.3s;
}

input:focus, select:focus {
    outline: none;
    border-color: #00ffcc;
    box-shadow: 0 0 0 2px rgba(0,255,204,0.3);
    transform: scale(1.01);
}

button {
    width: 100%;
    padding: 14px;
    border: none;
    border-radius: 10px;
    font-size: 15px;
    font-weight: bold;
    cursor: pointer;
    color: #000;
    background: linear-gradient(135deg, #00ffcc, #1cb5e0);
    transition: 0.3s;
}

button:hover {
    transform: translateY(-3px);
    box-shadow: 0 18px 35px rgba(0,255,204,0.45);
}

.output {
    margin-top: 28px;
    padding-top: 18px;
    border-top: 1px solid rgba(255,255,255,0.2);
    animation: fadeIn 0.6s ease;
}

.lulus {
    color: #00ff9c;
    font-weight: bold;
}

.tidak-lulus {
    color: #ff5c5c;
    font-weight: bold;
}

.error {
    margin-top: 20px;
    padding: 14px;
    border-radius: 8px;
    font-weight: bold;
    background: linear-gradient(135deg, #ff4d4d, #ff7676);
    color: #000;
    animation: shake 0.4s ease;
}

@keyframes shake {
    0% { transform: translateX(0); }
    25% { transform: translateX(-6px); }
    50% { transform: translateX(6px); }
    75% { transform: translateX(-6px); }
    100% { transform: translateX(0); }
}
</style>
</head>

<body>

<div class="container">
    <h2>Form Penilaian Mahasantri</h2>

    <form method="post">

        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password">
        </div>

        <div class="form-group">
            <label>Mata Kuliah</label>
            <select name="matkul">
                <option value="">-- Pilih Mata Kuliah --</option>
                <option value="WEB DESIGN">WEB DESIGN</option>
                <option value="WEB PROGRAMMING">WEB PROGRAMMING</option>
                <option value="PHP">PHP</option>
                <option value="SQL">SQL</option>
            </select>
        </div>

        <div class="form-group">
            <label>Nilai</label>
            <input type="number" name="nilai" min="0" max="100">
        </div>

        <button type="submit">Proses Nilai</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $matkul   = $_POST['matkul'] ?? '';
        $nilai    = $_POST['nilai'] ?? '';

        if ($username === '' || $password === '' || $matkul === '' || $nilai === '') {
            echo '<div class="error">⚠️ Semua data wajib diisi!</div>';
        } else {
            $status = ($nilai >= 70) ? "LULUS" : "TIDAK LULUS";
            $class  = ($nilai >= 70) ? "lulus" : "tidak-lulus";

            echo '<div class="output">';
            echo '<h3>Hasil Penilaian</h3>';
            echo "Username : " . htmlspecialchars($username) . "<br>";
            echo "Mata Kuliah : " . htmlspecialchars($matkul) . "<br>";
            echo "Nilai : " . htmlspecialchars($nilai) . "<br>";
            echo "Status : <span class='$class'>$status</span>";
            echo '</div>';
        }
    }
    ?>
</div>

</body>
</html>
