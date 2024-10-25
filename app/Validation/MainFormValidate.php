<?php

namespace App\Validation;

class MainFormValidate
{
    private const RULE_FIRST_NAME = '/^.{1,50}$/u';
    private const RULE_LAST_NAME = '/^.{1,50}$/u';
    private const RULE_PHONE = '/^\+?\d{1,3}?[ -]?\(?\d{1,4}\)?[ -]?\d{1,4}[ -]?\d{1,4}[ -]?\d{1,9}$/';
    private const RULE_EMAIL = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/ ';
    private array $errors = [];

    /**
     * @param array $data
     * @param $stopOnFirstFailure
     * @return array
     */
    public function validate(array $data, $stopOnFirstFailure = true): array
    {
        foreach ($data as $key => $value) {
            $this->checkRules($key, $value);

            if($stopOnFirstFailure && count($this->errors)) break;
        }

        return $this->errors;
    }

    /**
     * @param string $filed
     * @param string $value
     * @return void
     */
    private function checkRules(string $filed, string $value): void
    {
        switch ($filed) {
            case "firstName":
                if (!preg_match(self::RULE_FIRST_NAME, $value)) {
                    $this->errors[] = "Поле {$filed} обязательно. Длина от 1 до 5 символов";
                }

                break;
            case "lastName":
                if (!preg_match(self::RULE_LAST_NAME, $value)) {
                    $this->errors[] = "Поле {$filed} обязательно. Длина от 1 до 5 символов";
                }

                break;
            case "phone":
                if (!preg_match(self::RULE_PHONE, $value)) {
                    $this->errors[] = "Введите правильно телефон";
                }
                break;
            case 'email':
                if (!preg_match(self::RULE_EMAIL, $value)) {
                    $this->errors[] = "Введите правильно email";
                }
                break;
        }
    }
}