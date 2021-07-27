<?php


namespace Controller;


class ErrorController extends BaseController
{
    public function Err404()
    {
        $this->setView('404.php');
        return $this->render();
    }
}