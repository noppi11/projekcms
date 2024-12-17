<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
/* General Styles */
body {
    background-image: url('https://source.unsplash.com/1600x900/?sunset'); /* Background gambar */
    background-size: cover;
    background-position: center;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Form Container */
.form-container {
    background: #ffffff;
    padding: 30px;
    width: 400px;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    text-align: center;
}

/* Form Title */
.form-title {
    font-size: 24px;
    margin-bottom: 20px;
    font-weight: bold;
    color: #333;
}

/* Form Group */
.form-group {
    margin-bottom: 20px;
    text-align: left;
}

/* Input Styles */
input[type="text"],
input[type="email"],
input[type="password"],
select {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

/* Button */
.form-btn {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
}

.form-btn:hover {
    background-color: #0056b3;
}

/* Link Text */
.form-text a {
    color: #007bff;
    text-decoration: none;
}

.form-text a:hover {
    text-decoration: underline;
}


    </style>
</head>
<body>
    
<div class="form-container">
    <form action="<?php echo base_url('auth/simpan')?>" method="POST" class="form">
        <h2 class="form-title">Register</h2>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" value="<?= set_value('username')?>" required>
        </div>
        <div class="form-group">
            <label for="email">Nama</label>
            <input type="text" id="text" name="nama" placeholder="Enter your name"  value="<?= set_value('nama')?>" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" value="<?= set_value('password')?>" required>
        </div>
        <button type="submit" class="form-btn">Register</button>
        <p class="form-text">
            Already have an account? <a href="<?php echo base_url('auth')?>">Login here</a>
        </p>
    </form>
</div>


</body>
</html>