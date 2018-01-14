<?php
namespace WebDevJona\ManyToManyTests\Domain\Model;

/*
 * This file is part of the WebDevJona.ManyToManyTests package.
 */

use Doctrine\Common\Collections\ArrayCollection;
use Neos\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Flow\Entity
 */
class User
{
    /**
     * @var ArrayCollection<Post>
     * @ORM\ManyToMany(cascade={"persist"})
     */
    protected $favorites;

    /**
     * @var string
     */
    protected $name;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return ArrayCollection
     */
    public function getFavorites()
    {
        return $this->favorites;
    }

    /**
     * @param ArrayCollection $favorites
     */
    public function setFavorites($favorites)
    {
        $this->favorites = $favorites;
    }

    /**
     * @param Post $post
     */
    public function addFavorite(Post $post)
    {
        $this->favorites->add($post);
    }

    /**
     * @param Post $post
     */
    public function removeFavorite(Post $post)
    {
        $this->favorites->removeElement($post);
    }
}
