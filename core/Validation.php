<?php

namespace core;

class Validation
{
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

        if (!preg_match("/^[a-z ,.'-]+$/i", $field)) return 'Pavardėję gali būti tik raidės.';

        if (strlen($field) > 40) return 'Pavardė per ilga.';

        return '';
    }

}