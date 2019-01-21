<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PostRepository")
 */
class Post
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="App\Entity\PostTag", mappedBy="post")
     */
    private $tags;

    public function __construct(string $title)
    {
        $this->title = $title;
        $this->tags = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function addTag(Tag $tag): void {
        $postTag = new PostTag($this, $tag);
        $this->tags->add($postTag);
        $tag->getPosts()->add($postTag);
    }

}
