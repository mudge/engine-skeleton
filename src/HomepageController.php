<?php
declare(strict_types=1);

namespace App;

use Engine\Controller;

final class HomepageController extends Controller
{
    public function index(): void
    {
        $this->render('index.html');
    }
}
