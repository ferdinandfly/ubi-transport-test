<?php

namespace App\Repository;

use App\Entity\Note;
use App\Entity\Student;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Doctrine\Persistence\ManagerRegistry;

class NoteRepository extends ServiceEntityRepository
{
    /**
     * NoteRepository constructor.
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Note::class);
    }

    /**
     * @throws NoResultException
     * @throws NonUniqueResultException
     */
    public function getAverageNoteForStudent(Student $student): float
    {
        $result = $this->createQueryBuilder('n')
            ->select('avg(n.score) as score_avg')
            ->andWhere('n.student = :student')
            ->setParameter('student', $student)
            ->getQuery()
            ->getSingleResult();

        return $result['score_avg'];
    }

    /**
     * @throws NoResultException
     * @throws NonUniqueResultException
     */
    public function getAverageNoteForSubject(string $subject): float
    {
        $result = $this->createQueryBuilder('n')
            ->select('avg(n.score) as score_avg')
            ->andWhere('n.subject = :subject')
            ->setParameter('subject', $subject)
            ->getQuery()
            ->getSingleResult();

        return $result['score_avg'];
    }

    /**
     * @throws NoResultException
     * @throws NonUniqueResultException
     */
    public function getAverageNote(): float
    {
        $result = $this->createQueryBuilder('n')
            ->select('avg(n.score) as score_avg')
            ->getQuery()
            ->getSingleResult();

        return $result['score_avg'];
    }
}
