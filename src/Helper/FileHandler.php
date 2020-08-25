<?php

namespace Thresh\Helper;

/**
 * This class represents a File Handle
 * @package Thresh\Helper
 */
class FileHandler
{

    private $path;

    private $mode;

    private $fp;

    /**
     * FileLoader constructor.
     * @param string $path
     * @param string $mode Mode can be 'w' for write or 'r' for read
     */
    public function __construct($path, $mode)
    {
        $this->path = str_replace('/',DIRECTORY_SEPARATOR, $path);
        $this->mode = $mode;
        $this->fp = fopen($this->path, $this->mode);
    }

    public function __destruct()
    {
        $this->close();
    }

    /**
     * Used to write text to a file
     * @param $text
     */
    public function write($text){
        if($this->mode === 'w' && $this->fp !== null){
            fwrite($this->fp, $text);
        }
    }

    /**
     * Used to get the Size of a File
     * @return int
     */
    public function getFileSize(){
        return filesize($this->path);
    }

    /**
     * Used to read the data from a File
     * @return string
     */
    public function read(){
        if($this->fp !== null){
            return fread($this->fp, $this->getFileSize());
        }
        return false;
    }

    /**
     * Used to close the File Handler
     */
    public function close(){
        if($this->fp !== null){
            fclose($this->fp);
            $this->fp = null;
        }
    }
}