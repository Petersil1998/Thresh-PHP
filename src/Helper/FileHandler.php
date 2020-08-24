<?php

namespace Thresh\Helper;

class FileHandler
{

    private $path;

    private $mode;

    private $fp;

    /**
     * FileLoader constructor.
     * @param string $path
     * @param $mode
     */
    public function __construct($path, $mode)
    {
        $this->path = str_replace('/',DIRECTORY_SEPARATOR, $path);
        $this->mode = $mode;
        $this->fp = fopen($this->path, $this->mode);
    }

    public function __destruct()
    {
        if($this->fp != null){
            fclose($this->fp);
            $this->fp = null;
        }
    }

    /**
     * @param $text
     */
    public function write($text){
        if($this->mode == 'w' && $this->fp != null){
            fwrite($this->fp, $text);
        }
    }

    public function getFileSize(){
        return filesize($this->path);
    }

    public function read(){
        if($this->fp != null){
            return fread($this->fp, $this->getFileSize());
        }
        return false;
    }

    public function close(){
        if($this->fp != null){
            fclose($this->fp);
            $this->fp = null;
        }
    }
}