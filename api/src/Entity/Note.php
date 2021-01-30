<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * The most generic type of item.
 *
 * @ORM\Entity(repositoryClass="App\Repository\NoteREpository")
 * @ApiResource(
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
     * @Assert\LessThan(value=20)
     * @Assert\GreaterThanOrEqual(value=0)
     */
    private ?int $score = null;

    /**
     * @see _:subject
     *
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private ?string $subject = null;

    /**
     * @see _:student
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Student")
     * @ORM\JoinColumn(name="student_id", referencedColumnName="id", nullable=false)
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
