<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PostTagRepository")
 */
class PostTag
{
    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="App\Entity\Post")
     */
    private $post;

    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="App\Entity\Tag")
     */
    private $tag;

    /**
     * @ORM\Column(type = "datetime")
     */
    private $creratedOn;

    public function __construct(Post $post, Tag $tag)
    {
        $this->post = $post;
        $this->tag = $tag;
        $this->id = new PostTagId($post->getId(), $tag->getId());
        $this->creratedOn = new \DateTime("now");
    }
}
