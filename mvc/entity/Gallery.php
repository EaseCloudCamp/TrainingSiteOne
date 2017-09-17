<?php
/**
 * Created by PhpStorm.
 * User: xiaohao-pc
 * Date: 17-8-30
 * Time: 上午9:40
 */

class Gallery
{
  public $galleryId;
  public $galleryName;
  public $galleryUri;
  public $galleryDesc;
    public $sortNumber;

    /**
     * @return mixed
     */
    public function getGalleryId()
    {
        return $this->galleryId;
    }

    /**
     * @param mixed $galleryId
     */
    public function setGalleryId($galleryId)
    {
        $this->galleryId = $galleryId;
    }

    /**
     * @return mixed
     */
    public function getGalleryName()
    {
        return $this->galleryName;
    }

    /**
     * @param mixed $galleryName
     */
    public function setGalleryName($galleryName)
    {
        $this->galleryName = $galleryName;
    }

    /**
     * @return mixed
     */
    public function getGalleryUri()
    {
        return $this->galleryUri;
    }

    /**
     * @param mixed $galleryUri
     */
    public function setGalleryUri($galleryUri)
    {
        $this->galleryUri = $galleryUri;
    }

    /**
     * @return mixed
     */
    public function getGalleryDesc()
    {
        return $this->galleryDesc;
    }

    /**
     * @param mixed $galleryDesc
     */
    public function setGalleryDesc($galleryDesc)
    {
        $this->galleryDesc = $galleryDesc;
    }

    /**
     * @return mixed
     */
    public function getSortNumber()
    {
        return $this->sortNumber;
    }

    /**
     * @param mixed $sortNumber
     */
    public function setSortNumber($sortNumber)
    {
        $this->sortNumber = $sortNumber;
    }

}