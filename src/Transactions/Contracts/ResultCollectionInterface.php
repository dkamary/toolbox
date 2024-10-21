<?php

namespace Aika\Toolbox\Transactions\Contracts;

interface ResultCollectionInterface
{
    public function addResult(ResultInterface $result): ResultCollectionInterface;
    public function removeResult(ResultInterface $result): ResultCollectionInterface;
    public function getStatus(): int;
    public function getMessage(bool $merge, string $separator = "\n"): ?string;
    public function getMessages(): array;
    public function getData(): array;
}