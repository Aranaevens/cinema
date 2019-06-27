<?php

$form = new IntlDateFormatter('fr_FR.UTF-8', IntlDateFormatter::SHORT, IntlDateFormatter::NONE);
$GLOBALS['f'] = $form;

function dateFormatted($date)
{
    return $GLOBALS['f']->format($date);
}

function dateYears($todiff)
{
    $now = new DateTime('now', new DateTimeZone('Europe/Paris'));
    $var = $todiff->diff($now);
    return $var->format('%Y');
}

?>