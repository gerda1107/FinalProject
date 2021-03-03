<?php

namespace core;

/**
 * Class to validate inputs and other data
 */
class Validation
{
    private $password;

    /**
     * If empty, has other chars than name or too long we return err message. Else we return empty string.
     *
     * @param string $field
     * @return string
     */
    public function validateName($field)
    {
        if (empty($field)) return 'Prašome įvesti vardą.';

        if (!preg_match("/^[a-z ,.'-]+$/i", $field)) return 'Varde gali būti tik raidės.';

        if(strlen($field) > 40) return 'Vardas per ilgas.';

        return '';
    }

    /**
     * If empty, has other chars than lastname or too long we return err message. Else we return empty string.
     *
     * @param string $field
     * @return string
     */
    public function validateLastame($field)
    {
        if (empty($field)) return 'Prašome įvesti pavardę.';

        if (!preg_match("/^[a-z ,.'-]+$/i", $field)) return 'Pavardėje gali būti tik raidės.';

        if (strlen($field) > 40) return 'Pavardė per ilga.';

        return '';
    }

    /**
     * If empty, not valid or already exists in db we return err message. Else we return empty string.
     *
     * @param string $field
     * @param object $userModel
     * @return string
     */
    public function validateRegisterEmail($field, &$userModel)
    {
        if (empty($field)) return "Prašome įvesti savo el. paštą.";

        if (filter_var($field, FILTER_VALIDATE_EMAIL) === false) return "Prašome patikrinti ar el.paštas įvestas teisingai.";

        if ($userModel->findUserByEmail($field)) return "Toks el.paštas jau egzistuoja.";

        return '';
    }

    /**
     * If empty, not valid or email does not exists in db we return err message. Else we return empty string.
     *
     * @param string $field
     * @param object $userModel
     * @return string
     */
    public function validateLoginEmail($field, &$userModel)
    {
        if (empty($field)) return "Prašome įvesti savo el. paštą.";

        if (filter_var($field, FILTER_VALIDATE_EMAIL) === false) return "Prašome patikrinti ar el.paštas įvestas teisingai.";

        if (!$userModel->findUserByEmail($field)) return "Toks vartotojas neegzistuoja.";

        return '';
    }

    /**
     * If empty, not long enough, too long or does not have int/char we return err message. Else we return empty string.
     *
     * @param string $passField
     * @param int $min
     * @param int $max
     * @return string
     */
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

    /**
     * If empty, first pass field not given or does not match we return err message.
     *
     * @param string $repeatField
     * @return string
     */
    public function confirmPassword($repeatField)
    {
        if (empty($repeatField)) return "Prašome pakartoti slaptažodį.";

        if (!$this->password) return 'Slaptažodis neįvestas';

        if ($repeatField !== $this->password) return "Slaptažodžiai nevienodi.";
    }

    /**
     * If empty or too long we return err message. Else return string.
     *
     * @param string $field
     * @return string
     */
    public function validateComment($field)
    {
        if (empty($field)) return 'Prašome įvesti komentarą.';

        if (strlen($field) > 500) return 'Komentaras per ilgas.';

        return '';
    }

    /**
     * If arr empty, return true. Else return false.
     *
     * @param array $arr
     * @return bool
     */
    public function ifEmptyArr($arr)
    {
        foreach ($arr as $var) {
            if (!empty($var)) return false;
        }
        return true;
    }
}