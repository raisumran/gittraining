<?php
    /**
     *  this class contains function to read and write in an existing file
     * has functions fWrite() and fRead
     * @todo need to do error handling
     * @author sumran
     */
class Filing
{
    /**
     * [this writes to an existing file]
     * @method fWrite
     * @param  [str] $fileName [file in which text is to be written]
     * @param  [str] $dataStr  [the data to writeon the file]
     */
    public function fWrite($fileName, $dataStr)
    {
        if (!is_writable($fileName)) {
            die("file".$fileName. "can't be written");
        }
        $handle = fopen($fileName, 'a+');
        fwrite($handle, $dataStr);
        fclose($handle);
    }
    /**
     * [This function reads a file's complete content]
     * @method fRead
     * @param  [str] $fileName [name of file from which to read]
     * @return [str]           [content of the file]
     */
    public function fRead($fileName)
    {
        $handle = fopen($fileName, 'r');
        return file_get_contents($fileName);
    }
}
