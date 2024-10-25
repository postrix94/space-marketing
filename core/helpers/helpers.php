<?php
/**
 * @param ...$values
 * @return void
 */
function dd(...$values): void
{
    echo "<pre>";
    var_dump($values);
    echo "</pre>";
    exit;
}

/**
 * @return void
 */
function abort(): void
{
    require_once ROOT_PATH . "/resources/view/errors/404.php";
    exit;
}

/**
 * @param string $name
 */
function view(string $name): int
{
    return file_exists(ROOT_PATH . "/resources/view/{$name}.php")
        ? require_once ROOT_PATH . "/resources/view/{$name}.php"
        : require_once ROOT_PATH . "/resources/view/errors/404.php";
}


/**
 * @param string $key
 * @param string $message
 * @return void
 */
function session_flash(string $key, string $message): void
{
    $_SESSION[$key] = $message;
}


/**
 * @param string $key
 * @return string|null
 */
function show_flash_message(string $key): null|string
{
    $message = null;

    if (isset($_SESSION[$key])) {
        $message = $_SESSION[$key];
        unset($_SESSION[$key]);
    }

    return $message;
}

/**
 * @return string
 */
function getDomain(): string
{
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    $domain = $_SERVER['HTTP_HOST'];

    $fullUrl = $protocol . '://' . $domain;

    return $fullUrl;
}