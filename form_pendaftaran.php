<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Pendaftaran Mahasantri</title>
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

input, select, textarea {
    width: 100%;
    padding: 12px;
    border-radius: 8px;
    border: 1px solid #333;
    background: #111;
    color: #fff;
    transition: 0.3s;
}

input:focus, select:focus, textarea:focus {
    outline: none;
    border-color: #00ffcc;
    box-shadow: 0 0 0 2px rgba(0,255,204,0.3);
    transform: scale(1.01);
}

.radio-group,
.checkbox-group {
    display: flex;
    gap: 18px;
    flex-wrap: wrap;
}

.radio-group label,
.checkbox-group label {
    display: flex;
    align-items: center;
    gap: 6px;
    font-weight: normal;
    color: #ddd;
    cursor: pointer;
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
    <h2>Form Pendaftaran Mahasantri</h2>

    <form method="get">

        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama">
        </div>

        <div class="form-group">
            <label>NIM</label>
            <input type="text" name="nim">
        </div>

        <div class="form-group">
            <label>Jenis Kelamin</label>
            <div class="radio-group">
                <label><input type="radio" name="jk" value="Pria"> Pria</label>
                <label><input type="radio" name="jk" value="Wanita"> Wanita</label>
            </div>
        </div>

        <div class="form-group">
            <label>Program Studi</label>
            <select name="prodi">
                <option value="">-- Pilih Prodi --</option>
                <option value="PPL">PPL</option>
                <option value="DM">DM</option>
            </select>
        </div>

        <div class="form-group">
            <label>Hobi</label>
            <div class="checkbox-group">
                <label><input type="checkbox" name="hobi[]" value="Ngoding"> Ngoding</label>
                <label><input type="checkbox" name="hobi[]" value="Desain"> Desain</label>
                <label><input type="checkbox" name="hobi[]" value="Membaca"> Membaca</label>
            </div>
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" rows="3"></textarea>
        </div>

        <button type="submit">Daftar</button>
    </form>

    <?php
    if (!empty($_GET)) {
        $nama   = $_GET['nama'] ?? '';
        $nim    = $_GET['nim'] ?? '';
        $jk     = $_GET['jk'] ?? '';
        $prodi  = $_GET['prodi'] ?? '';
        $hobi   = $_GET['hobi'] ?? [];
        $alamat = $_GET['alamat'] ?? '';

        if ($nama === '' || $nim === '' || $jk === '' || $prodi === '' || empty($hobi) || $alamat === '') {
            echo '<div class="error">⚠️ Semua data wajib diisi!</div>';
        } else {
            echo '<div class="output">';
            echo '<h3>Data Pendaftaran</h3>';
            echo "Nama : $nama <br>";
            echo "NIM : $nim <br>";
            echo "Jenis Kelamin : $jk <br>";
            echo "Program Studi : $prodi <br>";
            echo "Hobi : " . implode(', ', $hobi) . "<br>";
            echo "Alamat : $alamat";
            echo '</div>';
        }
    }
    ?>
</div>

</body>
</html>
