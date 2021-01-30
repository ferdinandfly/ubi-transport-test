<?php

namespace App\DataProvider;

use ApiPlatform\Core\DataProvider\ItemDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use App\Model\Subject;

class SubjectItemDataProvider implements ItemDataProviderInterface, RestrictedDataProviderInterface
{
    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return Subject::class === $resourceClass;
    }

    public function getItem(string $resourceClass, $subjectName, string $operationName = null, array $context = []): ?Subject
    {
        $subject = new Subject();

        return $subject->setName($subjectName);
    }
}
