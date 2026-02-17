# test-Stream_Telecom
Контроллеры (app/Http/Controllers/)

    LinkController.php – обработка запросов, связанных со ссылками.
    AuthController.php – регистрация, аутентификация и выход пользователя (опциональная часть).

Модели (app/Models/)

    Link.php – для таблицы links, содержит поля user_id, original_url, short_code, а также связи user() и visits().
    LinkVisit.php – для таблицы link_visits, хранит информацию о каждом переходе: link_id, ip, user_agent, visited_at. Отключены стандартные timestamps.

Сервисы (app/Services/)

    ShortCodeGenerator.php – генерирует уникальный короткий код (из цифр и латинских букв) длиной 6 символов. Проверяет уникальность в БД, при исчерпании попыток выбрасывает исключение.

Миграции (database/migrations/)

    2025_01_01_000001_create_links_table.php – создаёт таблицу links с полями id, user_id (внешний ключ), original_url, short_code (уникальный), timestamps.
    2025_01_01_000002_create_link_visits_table.php – создаёт таблицу link_visits с полями id, link_id (внешний ключ), ip, user_agent, visited_at. Без created_at/updated_at.

Представления (resources/views/)

    layouts/app.blade.php – базовый шаблон с навигацией (регистрация, вход, выход), подключением стилей и выводом сообщений.
    links/index.blade.php – главная страница с формой сокращения ссылки и отображением результата.
    auth/login.blade.php – форма входа.
    auth/register.blade.php – форма регистрации.

Маршруты (routes/)

    web.php – все маршруты приложения:
        / (GET) – главная страница.
        /shorten (POST) – создание короткой ссылки.
        /go/{shortCode} (GET) – редирект.
        /register, /login, /logout – маршруты аутентификации.