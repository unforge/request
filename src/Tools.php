<?php
/**
 * This file is part of the Request library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) Ronam Unstirred (unforge.coder@gmail.com)
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace Unforge\RequestToolkit;

use Unforge\ArrayToolkit\Tools as AT;

/**
 * Class Tools
 *
 * @package Unforge\RequestToolkit
 */
final class Tools
{
    /**
     * @return bool
     */
    public static function checkExistPost() : bool
    {
        return (bool) $_SERVER['REQUEST_METHOD'] == 'POST';
    }

    /**
     * Return ALL params from POST
     *
     * @return array
     */
    public static function getAllFromPost() : array
    {
        return $_POST ?? [];
    }

    /**
     * Return INT value from POST
     *
     * @param string $key
     * @param bool|int $default
     *
     * @return bool|int
     */
    public static function getIntFromPost(string $key, $default = false)
    {
        if (AT::checkExistKeyInArray($_POST, $key)) {
            return AT::getInt($_POST, $key);
        }

        return $default;
    }

    /**
     * Return FLOAT value from POST
     *
     * @param string $key
     * @param bool $default
     *
     * @return bool|float
     */
    public static function getFloatFromPost(string $key, $default = false)
    {
        if (AT::checkExistKeyInArray($_POST, $key)) {
            return AT::getFloat($_POST, $key);
        }

        return $default;
    }

    /**
     * Return STRING value from POST
     *
     * @param string $key
     * @param bool $default
     *
     * @return bool|string
     */
    public static function getStringFromPost(string $key, $default = false)
    {
        if (AT::checkExistKeyInArray($_POST, $key)) {
            return trim(AT::getString($_POST, $key));
        }

        return $default;
    }

    /**
     * Return ARRAY value from POST
     *
     * @param string $key
     * @param bool $default
     *
     * @return bool|array
     */
    public static function getArrayFromPost(string $key, $default = false)
    {
        if (AT::checkExistKeyInArray($_POST, $key)) {
            return AT::getArray($_POST, $key);
        }

        return $default;
    }

    /**
     * Return RAW value from POST
     *
     * @param string $key
     * @param bool $default
     *
     * @return bool|mixed
     */
    public static function getRawFromPost(string $key, $default = false)
    {
        if (AT::checkExistKeyInArray($_POST, $key)) {
            return AT::getRaw($_POST, $key);
        }

        return $default;
    }

    /**
     * @return bool
     */
    public static function checkExistGet() : bool
    {
        return (bool) $_SERVER['REQUEST_METHOD'] == 'GET';
    }

    /**
     * Return ALL params from GET
     *
     * @return array
     */
    public static function getAllFromGet() : array
    {
        return $_GET ?? [];
    }

    /**
     * Return INT value from GET
     *
     * @param string $key
     * @param bool $default
     *
     * @return bool|int
     */
    public static function getIntFromGet(string $key, $default = false)
    {
        if (AT::checkExistKeyInArray($_GET, $key)) {
            return AT::getInt($_GET, $key);
        }

        return $default;
    }

    /**
     * Return FLOAT value from GET
     *
     * @param string $key
     * @param bool $default
     *
     * @return bool|float
     */
    public static function getFloatFromGet(string $key, $default = false)
    {
        if (AT::checkExistKeyInArray($_GET, $key)) {
            return AT::getFloat($_GET, $key);
        }

        return $default;
    }

    /**
     * Return STRING value from GET
     *
     * @param string $key
     * @param bool $default
     *
     * @return bool|string
     */
    public static function getStringFromGet(string $key, $default = false)
    {
        if (AT::checkExistKeyInArray($_GET, $key)) {
            return trim(AT::getString($_GET, $key));
        }

        return $default;
    }

    /**
     * Return ARRAY value from GET
     *
     * @param string $key
     * @param bool $default
     *
     * @return bool|array
     */
    public static function getArrayFromGet(string $key, $default = false)
    {
        if (AT::checkExistKeyInArray($_GET, $key)) {
            return AT::getArray($_GET, $key);
        }

        return $default;
    }

    /**
     * Return RAW value from GET
     *
     * @param string $key
     * @param bool $default
     *
     * @return bool|mixed
     */
    public static function getRawFromGet(string $key, $default = false)
    {
        if (AT::checkExistKeyInArray($_GET, $key)) {
            return AT::getRaw($_GET, $key);
        }

        return $default;
    }

    /**
     * @return bool
     */
    public static function checkExistRequest() : bool
    {
        $post = self::checkExistPost();

        if ($post === false) {
            return self::checkExistGet();
        }

        return $post;
    }

    /**
     * Return ALL params from POST or GET
     *
     * @return array
     */
    public static function getAllFromRequest() : array
    {
        $post = self::getAllFromPost();

        if (empty($post)) {
            return self::getAllFromGet();
        }

        return $post;
    }

    /**
     * Return INT value from POST or GET
     *
     * @param string $key
     * @param bool $default
     *
     * @return bool|int
     */
    public static function getIntFromRequest(string $key, $default = false)
    {
        $post = self::getIntFromPost($key);

        if ($post === false) {
            return self::getIntFromGet($key, $default);
        }

        return $post;
    }

    /**
     * Return FLOAT value from POST or GET
     *
     * @param string $key
     * @param bool $default
     *
     * @return bool|float
     */
    public static function getFloatFromRequest(string $key, $default = false)
    {
        $post = self::getFloatFromPost($key);

        if ($post === false) {
            return self::getFloatFromGet($key, $default);
        }

        return $post;
    }

    /**
     * Return STRING value from POST or GET
     *
     * @param string $key
     * @param bool $default
     *
     * @return bool|string
     */
    public static function getStringFromRequest(string $key, $default = false)
    {
        $post = self::getStringFromPost($key);

        if ($post === false) {
            return self::getStringFromGet($key, $default);
        }

        return $post;
    }

    /**
     * Return ARRAY value from POST or GET
     *
     * @param string $key
     * @param bool $default
     *
     * @return bool|array
     */
    public static function getArrayFromRequest(string $key, $default = false)
    {
        $post = self::getArrayFromPost($key);

        if ($post === false) {
            return self::getArrayFromGet($key, $default);
        }

        return $post;
    }

    /**
     * Return RAW value from POST or GET
     *
     * @param string $key
     * @param bool $default
     *
     * @return bool|array
     */
    public static function getRawFromRequest(string $key, $default = false)
    {
        $post = self::getRawFromPost($key);

        if ($post === false) {
            return self::getRawFromGet($key, $default);
        }

        return $post;
    }

    // TODO Add support prepare request methods from PUT

    /**
     * @param string $key
     * @return bool
     */
    public static function checkExistsCookie(string $key = '') : bool
    {
        if (!$key) {
            return (bool) isset($_COOKIE);
        }

        return AT::checkExistKeyInArray($_GET, $key);
    }

    /**
     * Return ALL params from COOKIE
     *
     * @return array
     */
    public static function getAllFromCookie() : array
    {
        return $_COOKIE ?? [];
    }

    /**
     * Return INT value from COOKIE
     *
     * @param string $key
     * @param bool $default
     *
     * @return bool|int
     */
    public static function getIntFromCookie(string $key, $default = false)
    {
        if (AT::checkExistKeyInArray($_COOKIE, $key)) {
            return AT::getInt($_COOKIE, $key);
        }

        return $default;
    }

    /**
     * Return FLOAT value from COOKIE
     *
     * @param string $key
     * @param bool $default
     *
     * @return bool|float
     */
    public static function getFloatFromCookie(string $key, $default = false)
    {
        if (AT::checkExistKeyInArray($_COOKIE, $key)) {
            return AT::getFloat($_COOKIE, $key);
        }

        return $default;
    }

    /**
     * Return STRING value from COOKIE
     *
     * @param string $key
     * @param bool $default
     *
     * @return bool|string
     */
    public static function getStringFromCookie(string $key, $default = false)
    {
        if (AT::checkExistKeyInArray($_COOKIE, $key)) {
            return trim(AT::getString($_COOKIE, $key));
        }

        return $default;
    }

    /**
     * Return ARRAY value from COOKIE
     *
     * @param string $key
     * @param string $explode_delimiter
     * @param bool $default
     *
     * @return bool|array
     */
    public static function getArrayFromCookie(string $key, string $explode_delimiter = '', $default = false)
    {
        if (AT::checkExistKeyInArray($_COOKIE, $key)) {
            if (($json_data = @json_decode(AT::getRaw($_COOKIE, $key), true)) != null) {
                $cookie = $json_data;
            } elseif ($explode_delimiter != '') {
                $cookie = explode($explode_delimiter, AT::getRaw($_COOKIE, $key));
            } else {
                $cookie = AT::getRaw($_COOKIE, $key);
            }

            return $cookie;
        }

        return $default;
    }

    /**
     * Return RAW value from COOKIE
     *
     * @param string $key
     * @param bool $default
     *
     * @return bool|mixed
     */
    public static function getRawFromCookie(string $key, $default = false)
    {
        if (isset($_COOKIE[$key])) {
            return AT::getRaw($_COOKIE, $key);
        }

        return $default;
    }
}
