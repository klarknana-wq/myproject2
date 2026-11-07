<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Выбор помещения</title>
</head>
<body>
    <h2>Создать форму заявки</h2>
    @if ($errors->any())
        <div style="color: red; margin-bottom: 20px;">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $errors }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/room" method="POST">
        @csrf
        <label for="room">Выберите помещение:</label>
        <select name="room" id="room" required>
            <option value="Аудитория">Аудитория</option>
            <option value="Коворкинг">Коворкинг</option>
            <option value="Кинозал">Кинозал</option>
        </select>
        <button type="submit">Отправить</button>
    </form>
</body>
</html>
