<?php

namespace core;

class Validation
{
    public function validateName($field)
    {
        if (empty($field)) return 'Please enter your Name.';

        if (!preg_match("/^[a-z ,.'-]+$/i", $field)) return 'Name must only contain name Chars.';

        return '';
    }

    public function validateLastame($field)
    {
        if (empty($field)) return 'Please enter your Lastname.';

        if (!preg_match("/^[a-z ,.'-]+$/i", $field)) return 'Lastname must only contain name Chars.';

        return '';
    }

}