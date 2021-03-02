<?php

namespace core;

class Validation
{
    private $password;

    public function validateName($field)
    {
        if (empty($field)) return 'Prašome įvesti vardą.';

        if (!preg_match("/^[a-z ,.'-]+$/i", $field)) return 'Varde gali būti tik raidės.';

        if(strlen($field) > 40) return 'Vardas per ilgas.';

        return '';
    }

    public function validateLastame($field)
    {
        if (empty($field)) return 'Prašome įvesti pavardę.';

        if (!preg_match("/^[a-z ,.'-]+$/i", $field)) return 'Pavardėje gali būti tik raidės.';

        if (strlen($field) > 40) return 'Pavardė per ilga.';

        return '';
    }

    public function validateEmail($field, &$userModel)
    {
        if (empty($field)) return "Prašome įvesti savo el. paštą.";

        if (filter_var($field, FILTER_VALIDATE_EMAIL) === false) return "Prašome patikrinti ar el.paštas įvestas teisingai.";

        if ($userModel->findUserByEmail($field)) return "Toks el.paštas jau egzistuoja.";

        return '';
    }

    public function validatePassword($passField, $min, $max)
    {
        if (empty($passField)) return "Prašome įvesti slaptažodį.";

        $this->password = $passField;

        if (strlen($passField) < $min) return "Slaptažodis turi būti bent $min simbolių ilgio.";

        if (strlen($passField) > $max) return "Slaptažodis negali būti ilgesnis nei $max simboliai.";

        if (!preg_match("#[0-9]+#", $passField)) return "Slaptažodis turi turėti bent vieną skaičių.";
        if (!preg_match("#[a-z]+#", $passField)) return "Slaptažodis turi turėti bent vieną raidę.";

        return '';
    }

    public function confirmPassword($repeatField)
    {
        if (empty($repeatField)) return "Prašome pakartoti slaptažodį.";

        if (!$this->password) return 'Slaptažodis neįvestas';

        if ($repeatField !== $this->password) return "Slaptažodžiai nevienodi.";
    }

    public function ifEmptyArr($arr)
    {
        foreach ($arr as $var) {
            if (!empty($var)) return false;
        }
        return true;
    }

}