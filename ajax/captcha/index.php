<html>
<head>
  <title>Google reCAPTCHA</title>
  
  <!-- Load Librari Google reCaptcha nya -->
  <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
  <h2>Form Komentar</h2>
  <hr>
  <form method="post" action="proses.php">
    <label><b>Nama</b></label><br>
    <input type="text" name="nama"><br><br>
    
    <label><b>Email</b></label><br>
    <input type="email" name="email"><br><br>
    
    <label><b>Komentar</b></label><br>
    <textarea rows="5" name="komentar"></textarea><br><br>
    
    <div class="g-recaptcha" data-sitekey="6Ld6aI4UAAAAAM4VkUkYD1qtf9XI0ALd2DcHP5hj"></div>
    
    <hr>
    <button type="submit">Kirim</button>
  </form>
</body>
</html>