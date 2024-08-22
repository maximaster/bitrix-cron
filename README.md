# maximaster/bitrix-crontab

Упрощает установку служебных процедур Битрикса на cron.

```bash
composer require maximaster/bitrix-crontab
```

## [Выполнение всех агентов на Cron](https://dev.1c-bitrix.ru/learning/course/?COURSE_ID=43&LESSON_ID=2943)

```bash
php ./vendor/bin/bitrix-cron enable-agents
```

Добавьте в crontab выполнение скрипта:

```
* * * * * php $PROJECT_DIR/vendor/bin/bitrix-cron run-agents $DOCUMENT_ROOT
```

заменив `$PROJECT_DIR` на директоорию проекта, а `$DOCUMENT_ROOT` на
веб-директорию, где находится Битрикс. `$DOCUMENT_ROOT` можно не указывать,
тогда будет делаться попытка определить его автоматически, с небольшой потерей
производителности на каждый запуск.
