<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * The most generic type of item.
 *
 * @ORM\Entity(repositoryClass="App\Repository\NoteREpository")
 * @ApiResource(
 *     denormalizationContext={"groups"={"score:write"}},
 *     normalizationContext={"groups"={"score:read"}},
 *          collectionOperations={"post"},
 *          itemOperations={"get"},
 *          shortName="note"
 * )
 */
class Note
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * @see _:note
     *
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     * @Assert\Range(min="0", max="20")
     * @Groups({"score:write", "score:read", "student:read"})
     */
    private ?int $score = null;

    /**
     * @see _:subject
     *
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Groups({"score:write", "score:read", "student:read"})
     */
    private ?string $subject = null;

    /**
     * @see _:student
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Student")
     * @ORM\JoinColumn(name="student_id", referencedColumnName="id", nullable=false)
     * @Groups({"score:write"})
     */
    private ?Student $student = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setScore(?int $score): void
    {
        $this->score = $score;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setSubject(?string $subject): void
    {
        $this->subject = $subject;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setStudent(?Student $student): void
    {
        $this->student = $student;
    }

    public function getStudent(): ?Student
    {
        return $this->student;
    }
}
