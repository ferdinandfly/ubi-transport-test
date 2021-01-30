<?php

namespace App\Controller;

use App\Entity\Student;
use App\Repository\NoteRepository;

class StudentAverageNote
{
    private NoteRepository $repo;

    public function __construct(
        NoteRepository $repo
    ) {
        $this->repo = $repo;
    }

    public function __invoke(Student $data)
    {
        $data->setAverageNote($this->repo->getAverageNoteForStudent($data));

        return $data;
    }
}
