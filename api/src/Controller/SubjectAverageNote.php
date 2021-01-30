<?php

namespace App\Controller;

use App\Model\Subject;
use App\Repository\NoteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SubjectAverageNote extends AbstractController
{
    private NoteRepository $repo;

    public function __construct(
        NoteRepository $repo
    ) {
        $this->repo = $repo;
    }

    public function __invoke(Subject $data)
    {
        if ('all' === $data->getName()) {
            $data->setAverageNote($this->repo->getAverageNote());
        } else {
            $data->setAverageNote($this->repo->getAverageNoteForSubject($data->getName()));
        }

        return $data;
    }
}
