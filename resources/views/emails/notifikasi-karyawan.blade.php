<!DOCTYPE html>
<html>
<head>
    <title>{{ $subjectText }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            background-color: #0073e6;
            padding: 20px;
            color: white;
        }
        .header img {
            max-width: 100px;
            margin-bottom: 10px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }
        .header h2 {
            margin: 0;
            font-size: 18px;
            font-weight: normal;
            color: #cce4ff;
        }
        .content {
            padding: 20px;
            line-height: 1.6;
            color: #333333;
            font-size: 16px;
        }
        .footer {
            text-align: center;
            padding: 15px;
            font-size: 14px;
            color: #888888;
            background: #f1f1f1;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header Section -->
        <div class="header">
            <img src="{{ asset('img/logopn.png') }}" alt="Company Logo">
            <h1>Nama Perusahaan Anda</h1>
            <h2>{{ $subjectText }}</h2>
        </div>
        <!-- Content Section -->
        <div class="content">
            <p>{{ $messageText }}</p>
            <p>Terima kasih telah menjadi bagian dari perjalanan kami. Jika Anda memiliki pertanyaan atau butuh bantuan, jangan ragu untuk menghubungi kami.</p>
        </div>
        <!-- Footer Section -->
        <div class="footer">
            &copy; {{ date('Y') }} Nama Perusahaan Anda. Semua Hak Dilindungi.
        </div>
    </div>
</body>
</html>
