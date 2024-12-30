<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Message</title>
</head>

<body>
    <h1>Pesan dari Form Kontak</h1>
    <p><strong>Nama Lengkap:</strong> {{ $full_name }}</p>
    <p><strong>Email:</strong> {{ $mailMessage }}</p>
    <p><strong>Subjek:</strong> {{ $subject }}</p>
    <p><strong>Pesan:</strong></p>
    <p>{{ $messageContent }}</p>
</body>

</html>
