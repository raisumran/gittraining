<?php
/**
* perform functions to maintain a session
*/
class Session
{
    /**
     * [initiates a session]
     * @method init
     */
    public static function init()
    {
        session_start();
    }
    /**
    * [sets the session value to true or false]
    * @method set
    * @param  [String] $key   [Session property]
    * @param  [String] $value [the value to set]
    */
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }
    /**
    * [returns value for a particular key]
    * @method get
    * @param  [String] $key [the property which value is to be found]
    * @return [bool]      [value of input property]
    */
    public static function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }
    /**
     * [ends a session]
     * @method destroy
     */
    public static function destroy()
    {
        unset($_SESSION);
        session_destroy();
    }
}
