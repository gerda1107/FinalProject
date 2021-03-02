<?php

function ifRequestIsPost()
{
    if ($_SERVER['REQUEST_METHOD'] === "POST") return true;
    return false;
}