Задание:
Разработка системы управления бронированием ресурсов

Описание
Создайте API для системы управления бронированием ресурсов. Допустим, у нас есть различные ресурсы (например, комнаты, автомобили и т.д.), которые можно бронировать на определённое время. Приложение должно предоставлять RESTful API для выполнения следующих операций:

1. Создание ресурса
    - Эндпоинт: POST /api/resources
    - Параметры запроса: name (string, обязательный), type (string, обязательный), description (string, необязательный)
2. Получение списка всех ресурсов
    - Эндпоинт: GET /api/resources
3. Создание бронирования
    - Эндпоинт: POST /api/bookings
    - Параметры запроса: resource_id (integer, обязательный), user_id (integer, обязательный), start_time (datetime, обязательный), end_time (datetime, обязательный)
4. Получение всех бронирований для ресурса
    - Эндпоинт: GET /api/resources/{id}/bookings
5. Отмена бронирования
    - Эндпоинт: DELETE /api/bookings/{id}

Требования
- Использовать Laravel (последней версии).
- Разместить код в публичном репозитории на GitHub.
- Использовать миграции для создания таблиц в базе данных.
- Использовать Eloquent ORM для работы с базой данных.
- Покрыть все операции тестами (unit и feature tests).
- Использовать Resource Classes для форматирования ответов API.
- Обработка ошибок и валидация входящих данных.
- Реализовать Service Layer для бизнес логики.
- Использовать паттерн Repository для работы с данными.
- Применить паттерн Observer для уведомлений о создании или отмене бронирования.

Дополнительные критерии
- Использование Dependency Injection.
- Соблюдение стандартов кодирования PSR.
- Применение принципов SOLID.
- Написание чистого, читаемого и поддерживаемого кода.

Оценка
Оценка будет основана на следующих критериях:
- Правильность работы API.
- Полнота и точность тестов.
- Структура и организация проекта.
- Качество кода и соблюдение стандартов.
- Умение применять паттерны проектирования.


