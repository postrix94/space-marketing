<?php
spl_autoload_register(function ($class) {
    $prefixes = [
        'App\\' => ROOT_PATH . '/app/',
        'Core\\' => ROOT_PATH . '/core/',
    ];

    // Ищем соответствующее пространство имен
    foreach ($prefixes as $prefix => $base_dir) {
        // Проверка, начинается ли класс с заданного префикса
        if (strncmp($prefix, $class, strlen($prefix)) === 0) {
            // Получение относительного пути к файлу
            $relative_class = substr($class, strlen($prefix));
            $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

            // Если файл существует, подключите его
            if (file_exists($file)) {
                require $file;
                return; // Завершаем после успешной загрузки
            }
        }
    }
});
