<?php

namespace Controller;

abstract class BaseController
{
    private $layout = __DIR__ . '/../views/layout.php';
    private $view = __DIR__ . '/../views/';
    private $title;
    private $vars = [];

    /**
     * @return mixed
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @param mixed $view
     */
    public function setView($view)
    {
        $this->view .= $view;
    }

    /**
     * @return array
     */
    public function getVars()
    {
        return $this->vars;
    }

    /**
     * @param array $vars
     */
    public function setVars($vars)
    {
        $this->vars = $vars;
    }


    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return void
     * setTile, setVars, setView et go
     */
    public function render(): void
    {
        ob_start();
        $title = $this->title;
        $vars = $this->vars;
        include $this->view;
        $content = ob_get_clean();
        include $this->layout;
    }
}