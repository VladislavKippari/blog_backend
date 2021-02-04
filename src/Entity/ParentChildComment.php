<?php

namespace App\Entity;

use App\Repository\ParentChildCommentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ParentChildCommentRepository::class)
 */
class ParentChildComment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=comment::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $parent_comment;

    /**
     * @ORM\ManyToOne(targetEntity=comment::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $child_comment;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParentCommentId(): ?comment
    {
        return $this->parent_comment;
    }

    public function setParentCommentId(?comment $parent_comment): self
    {
        $this->parent_comment = $parent_comment;

        return $this;
    }

    public function getChildCommentId(): ?comment
    {
        return $this->child_comment;
    }

    public function setChildCommentId(?comment $child_comment): self
    {
        $this->child_comment = $child_comment;

        return $this;
    }
}
