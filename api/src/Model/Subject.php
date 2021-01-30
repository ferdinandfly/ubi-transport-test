<?php

namespace App\Model;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Controller\SubjectAverageNote;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Class Subject.
 *
 * @ApiResource(
 *      normalizationContext={"groups"={"output"}},
 *     collectionOperations={},
 *     itemOperations={
 *          "average_note"={
 *              "method"="GET",
 *              "path"="/subject/{name}/average-note",
 *              "controller"=SubjectAverageNote::class,
 *              "openapi_context"={
 *                      "description"="If the subject name is 'all', than it will return the average note of all students for all subjects "
 *              },
 *              "normalization_context"={"groups"={"output"}}
 *          }
 *     },
 *     shortName="subject"
 * )
 */
class Subject
{
    /**
     * @ApiProperty(identifier=true)
     */
    private string $name;

    /**
     * @Groups("output")
     */
    private ?float $averageNote;

    public function getAverageNote(): ?float
    {
        return $this->averageNote;
    }

    public function setAverageNote(?float $averageNote): void
    {
        $this->averageNote = $averageNote;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
