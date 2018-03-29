<?php


class Site {
    

    public function __construct() {
        $coreUrl = substr(filter_input(INPUT_SERVER,'REQUEST_URI'),1);
        $url = parse_url($coreUrl);
        $this->url  = ($url['path']) ?? '';
        
        $this->requestMethod = filter_input(INPUT_SERVER,'REQUEST_METHOD');
        $this->getPage();
        
    }
    
    public function getPage($header="HTTP/1.1 200 OK") {
        $content = (strlen($this->url)) ? $this->url : 'index';
        if (!file_exists(filter_input(INPUT_SERVER,'DOCUMENT_ROOT')."/pages/".$content.".php")) {
            $header = "HTTP/1.1 404 Not Found";
            $content = "404";
        }
        
        if ($this->requestMethod === 'GET') {
        ob_start();
        header($header); 
        include(filter_input(INPUT_SERVER,'DOCUMENT_ROOT')."/layouts/master.php");
        ob_flush();
        } else {
        include(filter_input(INPUT_SERVER,'DOCUMENT_ROOT')."/pages/".$content.".php");    
            
        }
    }
    
    public function getDownload() {
        
        
        
    }
    
 
    
    protected function render($p) {
        
        $path = sprintf('pages/%s.php',$p);
        $getFile = filter_input(INPUT_SERVER,'DOCUMENT_ROOT')."/".$path;
     
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
    
    protected function sitepath($p="") {
        
        $proto = (empty($_SERVER['HTTPS']) ? 'http' : 'https');
        $domain = filter_input(INPUT_SERVER,'HTTP_HOST');
        return $proto."://".$domain."/".$p;
        
        
    }

    
    
    
    }


$j = new Site();

