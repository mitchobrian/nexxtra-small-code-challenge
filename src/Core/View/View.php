<?php
namespace Nscc\Core\View;

class View
{
    public static function header(string $title = "title"): string {
        return '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>'.$title.'</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        </head>';
    }

    public static function bodyOpen(): string {
        return '<body>';
    }

    public static function bodyClose(): string {
        return '</body>';
    }

    public static function footer(): string {
        return '</html>';
    }

}
