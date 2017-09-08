<?php
/**
 * Created by PhpStorm.
 * User: xiaohao-pc
 * Date: 17-8-30
 * Time: 上午9:35
 */


class Essay
{
public $essayId;
public $navigationType;
public $essayName;

    /**
     * Essay constructor.
     */
    public function __construct()
    {
    }




    /**
     * @return mixed
     */
    public function getEssayId()
    {
        return $this->essayId;
    }

    /**
     * @param mixed $essayId
     */
    public function setEssayId($essayId)
    {
        $this->essayId = $essayId;
    }

    /**
     * @return mixed
     */
    public function getNavigationType()
    {
        return $this->navigationType;
    }

    /**
     * @param mixed $navigationType
     */
    public function setNavigationType($navigationType)
    {
        $this->navigationType = $navigationType;
    }

    /**
     * @return mixed
     */
    public function getEssayName()
    {
        return $this->essayName;
    }

    /**
     * @param mixed $essayName
     */
    public function setEssayName($essayName)
    {
        $this->essayName = $essayName;
    }

}