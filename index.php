<?php

class Site {

    public function __construct() {
        $this->requestUri = (filter_input(INPUT_SERVER, 'REQUEST_URI')) ?? $_SERVER['REQUEST_URI'];
        $coreUrl = substr($this->requestUri, 1);
        $url = parse_url($coreUrl);
        $this->url = ($url['path']) ?? '';
        $this->docRoot = (filter_input(INPUT_SERVER, 'DOCUMENT_ROOT')) ?? $_SERVER['DOCUMENT_ROOT'];
        $this->host = (filter_input(INPUT_SERVER, 'HTTP_HOST')) ?? $_SERVER['HTTP_HOST'];

        $this->requestMethod = (filter_input(INPUT_SERVER, 'REQUEST_METHOD')) ?? $_SERVER['REQUEST_METHOD'];
        $this->getPage();
    }

    public function getPage($header = "HTTP/1.1 200 OK") {

        $content = (strlen($this->url)) ? $this->url : 'index';
        if (!file_exists($this->docRoot . "/pages/" . $content . ".php")) {
            $header = "HTTP/1.1 404 Not Found";
            $content = "404";
        }

        if ($this->requestMethod === 'GET') {
            ob_start();
            header($header);
            include($this->docRoot . "/layouts/master.php");
            ob_flush();
        } else {
            include($this->docRoot . "/pages/" . $content . ".php");
        }
    }

    public function getDownload() {
        
    }

    protected function render($p) {

        $path = sprintf('pages/%s.php', $p);
        $getFile = $this->docRoot . "/" . $path;

        /*  $d = new DOMDocument();
          $d->loadHTML(file_get_contents($getFile),  LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
          // return $d->saveHTML(); */
        //return file_get_contents($getFile);
        include($getFile);
    }

    /**
     * 
     * @param string $p
     * @return string
     */
    protected function sitepath($p = "") {

        $proto = (empty($_SERVER['HTTPS']) ? 'http' : 'https');
        $domain = $this->host;
        return $proto . "://" . $domain . "/" . $p;
    }

    /**
     * Return CDN for css, images etc.
     * @param string $p
     * @return string
     */
    protected function cdnpath($p = "") {

        $proto = (empty($_SERVER['HTTPS']) ? 'http' : 'https');
        $domain = preg_replace('/^www/', 'cdn', $this->host);

        return $proto . "://" . $domain . "/" . ltrim($p, '/');
    }

}

$j = new Site();

