<?php
declare(strict_types=1);

class AppController {

    private $request;

    public function __construct() {
        session_start();
        $this->request = $_SERVER['REQUEST_METHOD'];
    }

    protected function isGet(): bool {
        return $this->request === 'GET';
    }

    protected function isPost(): bool {
        return $this->request === 'POST';
    }

    protected function renderPage(string $page = null, array $variables = []) {

        $pagePath = $page ? dirname(__DIR__).'/Views/'.get_class($this).'/'. $page.'.php' : '';
        // $pagePath = $page ? dirname(__DIR__).'/Views/'. $page.'.php' : '';

        $output = 'Error: File not found';

        if(file_exists($pagePath)){
            extract($variables);
            ob_start();
            include $pagePath;
            $output = ob_get_clean();
        }
        print $output;
    }
}
