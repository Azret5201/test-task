# Review

- Не увидел использования возможностей php7 и php7.4 а именно:
    - [Typed properties](https://www.php.net/manual/ru/migration74.new-features.php)
    - [Return type declarations](https://www.php.net/manual/en/migration70.new-features.php)
- При создании записи `UrlController::getUrl` нет проверки на уникальность. `substr(uniqid($new_url->id), 0, -9)` не гарантирует уникальное значение от вызова к вызову.
- В требованиях указано, что короткая ссылка должна быть вида: http://yourdomain/abCdE, в вашем случае короткая ссылка имеет лишний сегмент short_url
- При добавлении одного и того же url нет сообщения о том, что в бд уже есть подобный урл. Добавил несколько одинаковых url
- Не верное соблюдение [форматирование кода](https://www.php-fig.org/psr/psr-2/) - методы названы methodName, а переменные var_name. 
- Отправка данных на сервер происходит через GET запрос, вместо POST или PUT
- В коде не должно присутстсвовать отладочных данных:

```php
Route::get('/test', function (\Illuminate\Http\Request $request){
    dd($_SERVER['HTTP_USER_AGENT']);
});
```
- Не понятно для чего создан каталог с вьюхами: `resources/views/vendor`

## Заключение

Тестовое задание дается для того, чтобы кандидат мог продемонстрировать свои знания и лучшие практики. Не нужно делать задание на скорость.
