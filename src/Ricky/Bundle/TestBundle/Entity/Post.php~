<?php

namespace Ricky\Bundle\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Post
{

    /**
     * @ORM\OneToOne(targetEntity="CoverPhoto", inversedBy="post")
     * @ORM\JoinColumn(name="cover_photo_id", referencedColumnName="id")
     * @var CoverPhoto
     */
    protected $cover_photo;

    /**
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="posts", cascade={"all"} )
     * @ORM\JoinTable(
     *     name="TagPost",
     *     joinColumns={@ORM\JoinColumn(name="tag_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="post_id", referencedColumnName="id")}
     * )
     * @var Tag[]
     */
    protected $tags;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="posts")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * @var Category
     */
    protected $category;


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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;


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
     * Set title
     *
     * @param string $title
     * @return Post
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Post
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }


    /**
     * Set category
     *
     * @param \Ricky\Bundle\TestBundle\Entity\Category $category
     * @return Post
     */
    public function setCategory(\Ricky\Bundle\TestBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Ricky\Bundle\TestBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Add tags
     *
     * @param \Ricky\Bundle\TestBundle\Entity\Tag $tags
     * @return Post
     */
    public function addTag(\Ricky\Bundle\TestBundle\Entity\Tag $tags)
    {
        $this->tags[] = $tags;

        return $this;
    }

    /**
     * Remove tags
     *
     * @param \Ricky\Bundle\TestBundle\Entity\Tag $tags
     */
    public function removeTag(\Ricky\Bundle\TestBundle\Entity\Tag $tags)
    {
        $this->tags->removeElement($tags);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set cover_photo
     *
     * @param \Ricky\Bundle\TestBundle\Entity\CoverPhoto $coverPhoto
     * @return Post
     */
    public function setCoverPhoto(\Ricky\Bundle\TestBundle\Entity\CoverPhoto $coverPhoto = null)
    {
        $this->cover_photo = $coverPhoto;

        return $this;
    }

    /**
     * Get cover_photo
     *
     * @return \Ricky\Bundle\TestBundle\Entity\CoverPhoto
     */
    public function getCoverPhoto()
    {
        return $this->cover_photo;
    }
}