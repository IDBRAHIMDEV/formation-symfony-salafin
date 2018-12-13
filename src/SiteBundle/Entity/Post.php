<?php

namespace SiteBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 *
 * @ORM\Table(name="post")
 * @ORM\Entity(repositoryClass="SiteBundle\Repository\PostRepository")
 */
class Post
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank(message="ce champ est obligatoire !!")
     * @Assert\Length(min=8, max=67, minMessage="ce champ doit avoir au moins {{ limit }} characters !!", maxMessage="ce champ doit dépasser {{ limit }} characters !!")
     * @ORM\Column(name="title", type="string", length=80)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", nullable=true)
     */
    private $content;

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     * @var string
     * 
     * @ORM\Column(name="slug", type="string", length=120)
     *  */
    private $slug;

    /**
     * @ORM\OneToOne(targetEntity="SiteBundle\Entity\Image", cascade={"persist"})
     * @Assert\Valid()
     */
    private $image;
    
    /**
     * @ORM\ManyToOne(targetEntity="SiteBundle\Entity\Author", inversedBy="posts")
     */
    private $author;
    

    /**
     * @ORM\ManyToMany(targetEntity="SiteBundle\Entity\Category", inversedBy="posts")
     */
    private $categories;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
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
     *
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
     * Set active
     *
     * @param boolean $active
     *
     * @return Post
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return bool
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Post
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set image
     *
     * @param \SiteBundle\Entity\Image $image
     *
     * @return Post
     */
    public function setImage(\SiteBundle\Entity\Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \SiteBundle\Entity\Image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set author
     *
     * @param \SiteBundle\Entity\Author $author
     *
     * @return Post
     */
    public function setAuthor(\SiteBundle\Entity\Author $author = null)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return \SiteBundle\Entity\Author
     */
    public function getAuthor()
    {
        return $this->author;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add category
     *
     * @param \SiteBundle\Entity\Category $category
     *
     * @return Post
     */
    public function addCategory(\SiteBundle\Entity\Category $category)
    {
        $this->categories[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \SiteBundle\Entity\Category $category
     */
    public function removeCategory(\SiteBundle\Entity\Category $category)
    {
        $this->categories->removeElement($category);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategories()
    {
        return $this->categories;
    }
}
