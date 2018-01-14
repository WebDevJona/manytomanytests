<?php
namespace WebDevJona\ManyToManyTests\Domain\Model;

/*
 * This file is part of the WebDevJona.ManyToManyTests package.
 */

use Neos\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Flow\Entity
 */
class Post
{

    /**
     * @var string
     */
    protected $title;


    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
}
