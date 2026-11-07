<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\RegisterController;

Route::get('/register', [registerController::class, 'showRegistrationForm'])->name('registerForm');
Route::post('/register',[RegisterController::class, 'register'])->name('register');

Route::get('/', function () {
    return '
        <div style="font-family: sans-serif; padding: 40px; line-height: 2;">
            <h1>Задания </h1>
            <ul>
                <li><a href="/room" style="font-size: 18px; color: #ff2d20;">Открыть Задание 2 (Выбор помещения)</a></li>
                <li><a href="/conference" style="font-size: 18px; color: #ff2d20;">Открыть Задание 3 (Форма конференции)</a></li>
            </ul>
        </div>
    ';
});



// ЗАДАНИЕ 2
Route::get('/room', function () {
    return view('room-form');
});

Route::post('/room', function (Request $request) {
    $validated = $request->validate([
        'room' => 'required|in:Аудитория,Коворкинг,Кинозал',
    ], [
        'room.required' => 'Вы обязательно должны выбрать помещение!',
        'room.in' => 'Выбрано недопустимое помещение.',
    ]);

    $room = $validated['room'];
    return view('room-result', compact('room'));
});


// ЗАДАНИЕ 3

Route::get('/conference', function () {
    return view('conference-form');
});

Route::post('/conference', function (Request $request) {
    $data = $request->validate([
        'title' => 'required|string|min:3|max:255', 
        'room' => 'required|in:Аудитория,Коворкинг,Кинозал', 
        'start_date' => 'required|date|after_or_equal:today', 
        'payment_method' => 'required|in:Карта,Безналичный расчет,Наличные', 
        'description' => 'required|string|min:10', 
    ], [

        'title.required' => 'Поле "Название конференции" обязательно для заполнения.',
        'title.min' => 'Название конференции должно быть не короче 3 символов.',
        'room.required' => 'Выберите помещение.',
        'start_date.required' => 'Укажите дату начала.',
        'start_date.date' => 'Введите корректный формат даты.',
        'start_date.after_or_equal' => 'Дата конференции не может быть в прошлом.',
        'payment_method.required' => 'Выберите способ оплаты.',
        'description.required' => 'Заполните описание конференции.',
        'description.min' => 'Описание должно содержать минимум 10 символов.',
    ]);
    return view('conference-result', compact('data'));
});
