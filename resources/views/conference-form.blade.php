<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Заявка на конференцию</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/script.js') }}"></script>


</head>
<body style="font-family: sans-serif; padding: 20px;">
    <div class="room-images">
        <img src="{{ asset('images/room1.jpg') }}" alt="Зал 1" class="room-img">
        <img src="{{ asset('images/room2.jpg') }}" alt="Зал 2" class="room-img">
    </div>
    <h2>Форма заявки на проведение конференции</h2>
        @if ($errors->any())

        <div style="color: red; margin-bottom: 20px;">
            <strong style="display:block; marigin-bottom: 5px;">Пожалуйста, исправьте ошибки:</strong>
            <ul>
                @foreach ($errors->all() as $message)
                <li>{{ is_array($message) ? implode (',', $message) : $message }}</li>
                @endforeach
            </ul>
        </div>
        <div id="auth-alert" style="display: none; background-color: #fde8e8; color: #9b1c1c; border: 1px solid #f8b4b4; padding: 15px; border-radius: 4px; margin-bottom: 20px; font-family: sans-serif;">
            <ul style="margin: 0; padding-left: 20px;">
                 <li>Для бронирования необходимо авторизоваться</li>
            </ul>
        </div>
        @endif
    <form action="/conference" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
        <p>
            <label>Название конференции:</label><br>
            <input type="text" name="title" required style="width: 300px; padding: 5px;">
        </p>

        <p>
            <label>Помещение:</label><br>
            <select name="room" required style="width: 312px; padding: 5px;">
                <option value="Аудитория">Аудитория</option>
                <option value="Коворкинг">Коворкинг</option>
                <option value="Кинозал">Кинозал</option>
            </select>
        </p>

        <p>
            <label>Дата начала:</label><br>
            <input type="date" name="start_date" required style="width: 300px; padding: 5px;">
        </p>

        <p>
            <label>Способ оплаты:</label><br>
            <select name="payment_method" required style="width: 312px; padding: 5px;">
                <option value="Карта">Банковская карта</option>
                <option value="Безналичный расчет">Безналичный расчет</option>
                <option value="Наличные">Наличными при посещении</option>
            </select>
        </p>

        <p>
            <label>Описание конференции:</label><br>
            <textarea name="description" rows="4" required style="width: 300px; padding: 5px;"></textarea>
        </p>

        <button type="button" id="btn-book" class="btn-book">Забронировать</button>
        <button type="submit" style="padding: 8px 15px; background: #ff2d20; color: white; border: none; cursor: pointer;">Отправить заявку</button>
    </form>
</body>
</html>

