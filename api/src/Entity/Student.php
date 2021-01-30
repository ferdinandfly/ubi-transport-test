<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Controller\StudentAverageNote;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity
 * @ApiResource(
 *      normalizationContext={"groups"={"default"}},
 *     denormalizationContext={"groups"={"default"}},
 *     collectionOperations={"post"},
 *     itemOperations={
 *          "get",
 *          "put",
 *          "delete",
 *          "average_note"={
 *              "method"="GET",
 *              "path"="/student/{id}/average-note",
 *              "controller"=StudentAverageNote::class,
 *              "normalization_context"={"groups"={"note"}}
 *              }
 *     },
 *     shortName="Student"
 * )
 */
class Student
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @Groups("default")
     */
    private int $id;

    /**
     * @see _:firstName
     * @ORM\Column(type="string")
     * @Groups("default")
     */
    private ?string $firstName = null;

    /**
     * @see _:lastName
     * @ORM\Column(type="string")
     * @Groups("default")
     */
    private ?string $lastName = null;

    /**
     * @see _:birthDay
     * @ORM\Column(type="datetime")
     * @Groups("default")
     */
    private ?\DateTime $birthDay = null;

    /**
     * @Groups("note")
     */
    private ?float $averageNote = 0.0;

    public function getId(): int
    {
        return $this->id;
    }

    public function setFirstName(?string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setLastName(?string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setBirthDay(?\DateTime $birthDay): void
    {
        $this->birthDay = $birthDay;
    }

    public function getBirthDay(): ?\DateTime
    {
        return $this->birthDay;
    }

    public function getAverageNote(): ?float
    {
        return $this->averageNote;
    }

    public function setAverageNote(?float $averageNote): void
    {
        $this->averageNote = $averageNote;
    }
}
