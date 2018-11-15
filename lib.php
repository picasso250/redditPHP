<?php
/**
 * Magic class!
 * phpmd.phar lib.php text codesize,design,unusedcode
 * phpcs lib.php -n
 *
 * @category Class_And_Function
 * @package  GLOBAL
 * @author   xiaochi <wxiaochi@qq.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://coding.net/u/picasso250/p/10x-programer/git
 */

/**
 * Request
 *
 * @category Class
 * @package  GLOBAL
 * @author   xiaochi <wxiaochi@qq.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://coding.net/u/picasso250/p/10x-programer/git
 */
class Req
{
    /**
     * Get from $_GET
     *
     * @param string $key     name
     * @param string $default value
     *
     * @return string
     */
    static function get($key, $default = '')
    {
        return isset($_GET[$key]) ? trim($_GET[$key]) : $default;
    }
    /**
     * Get from $_POST
     *
     * @param string $key     name
     * @param string $default value
     *
     * @return string
     */
    static function post($key, $default = '')
    {
        return isset($_POST[$key]) ? trim($_POST[$key]) : $default;
    }
}

// $routers: [method_and_regex => func_or_Controller@Action]
// when 404, return false
class RegexRouter
{
    static function run($routers)
    {
        // get url
        $uri = $_SERVER["REQUEST_URI"];
        $url = explode("?", $uri)[0];
        // run
        foreach ($routers as $regex => $func) {
            $a = explod(' ', $regex);
            if (count($a) == 2) {
                list($method, $regex) = $a;
                $method_match = $_SERVER["REQUEST_METHOD"] == $method;
            } else {
                $method_match = true;
            }
            $regex = "#^$regex$#";
            if ($method_match && preg_match($regex, $url, $m)) {
                return self::_do_callback($func, $m);
            }
        }
        return false;
    }

    static function _do_callback($func, $para)
    {
        // call back
        if (is_callable($func)) {
            $func($para);
            return true;
        } elseif (is_string($func)) {
            $arr = explode("@", $func);
            if (count($arr) != 2) {
                return false;
            }
            list($class_name, $func_name) = $arr;
            if (!class_exists($class_name))
                return false;
            $ctrl = new $class_name();
            if (!method_exists($ctrl, $func_name))
                return false;
            $ctrl->$func_name($para);
            return true;
        }
        return false;
    }
}
