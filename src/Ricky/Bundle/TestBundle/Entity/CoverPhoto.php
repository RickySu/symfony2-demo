<?php

namespace Ricky\Bundle\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoverPhoto
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class CoverPhoto
{
    /**
     * @ORM\OneToOne(targetEntity="Post", mappedBy="cover_photo")
     *
     * @var Post
     */
    protected $post;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="info", type="string", length=255)
     */
    private $info;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set info
     *
     * @param string $info
     * @return CoverPhoto
     */
    public function setInfo($info)
    {
        $this->info = $info;

        return $this;
    }

    /**
     * Get info
     *
     * @return string
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * Set post
     *
     * @param \Ricky\Bundle\TestBundle\Entity\Post $post
     * @return CoverPhoto
     */
    public function setPost(\Ricky\Bundle\TestBundle\Entity\Post $post = null)
    {
        $this->post = $post;
    
        return $this;
    }

    /**
     * Get post
     *
     * @return \Ricky\Bundle\TestBundle\Entity\Post 
     */
    public function getPost()
    {
        return $this->post;
    }
}