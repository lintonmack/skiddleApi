<?php

namespace App\Src\Model;

use App\Src\Controller\ApiController;

/**
 * Class Artist
 * @package App\Src\Model
 */
class Artist extends ApiController
{

    protected $name = "";

    protected static $urlExtension = "/artists?";


    /**
     * Artist constructor.
     * @param string $name
     */
    public function __construct()
    {
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = htmlspecialchars($name);
    }

    /**
     * @return string
     */
    public static function getUrlExtension()
    {
        return self::$urlExtension;
    }

    /**
     * @param string $urlExtension
     */
    public static function setUrlExtension($urlExtension)
    {
        self::$urlExtension = $urlExtension;
    }

    /**
     * @return null
     */
    public function getResultSet()
    {
        return $this->resultSet;
    }


}