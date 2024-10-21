<?php

namespace Aika\Transactions\Base;

use Aika\Transactions\Contracts\ResultCollectionInterface;
use Aika\Transactions\Contracts\ResultInterface;
use Illuminate\Support\Collection;

abstract class AbstractResultCollection
extends Collection
implements ResultCollectionInterface
{
    public function addResult(ResultInterface $result): ResultCollectionInterface
    {
        $this->items[] = $result;
        return $this;
    }

    public function removeResult(ResultInterface $result): ResultCollectionInterface
    {
        $this->items = array_filter($this->items, function ($item) use ($result) {
            return $item !== $result;
        });

        return $this;
    }

    public function getStatus(): int
    {
        return $this->pluck('status')->max();
    }

    public function getMessage(bool $merge, string $separator = "\n"): ?string
    {
        if ($merge) {
            return implode($separator, $this->pluck('message')->toArray());
        }
        return null;
    }

    public function getMessages(): array
    {
        return $this->pluck('message')->toArray();
    }

    public function getData(): array
    {
        return $this->pluck('data')->toArray();
    }
}
