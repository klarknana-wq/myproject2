<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Данные конференции</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body style="font-family: sans-serif; padding: 20px;">
    <div class="room-images">
        <img src="{{ asset('images/room1.jpg') }}" alt="Зал 1" class="room-img">
        <img src="{{ asset('images/room2.jpg') }}" alt="Зал 2" class="room-img">
    </div>
    <h2>Данные конференции получены:</h2>
    <ul style="line-height: 2;">
        <li><strong>Название:</strong> {{ $data['title'] ?? 'Не указано' }}</li>
        <li><strong>Помещение:</strong> {{ $data['room'] ?? 'Не указано' }}</li>
        <li><strong>Дата начала:</strong> {{ $data['start_date'] ?? 'Не указано' }}</li>
        <li><strong>Способ оплаты:</strong> {{ $data['payment_method'] ?? 'Не указано' }}</li>
        <li><strong>Описание:</strong> {{ $data['description'] ?? 'Не указано' }}</li>
    </ul>
    <br>
    <a href="/conference" style="color: #ff2d20;">Назад к форме</a>
</body>
</html>
