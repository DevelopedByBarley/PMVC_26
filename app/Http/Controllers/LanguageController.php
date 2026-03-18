<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Core\Language;
use Symfony\Component\HttpFoundation\Response;

class LanguageController extends Controller
{
    public function switch(string $lang): Response
    {
        Language::switch($lang);

        $back = $_SERVER['HTTP_REFERER'] ?? '/';

        return $this->redirect($back);
    }
}
