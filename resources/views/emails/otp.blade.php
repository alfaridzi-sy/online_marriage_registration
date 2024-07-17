<!-- resources/views/emails/otp.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP</title>
</head>
<body>
    <p>Hai,</p>
    <p>Kode OTP Anda adalah <strong>{{ $otp }}</strong>.</p>
    <p>Gunakan kode ini untuk melanjutkan proses login Anda. Kode ini berlaku selama 5 menit.</p>
    <p>Terima kasih.</p>
</body>
</html>
