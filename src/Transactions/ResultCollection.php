<?php

namespace Aika\Transactions;

use Aika\Transactions\Base\AbstractResultCollection;
use Aika\Transactions\Contracts\ResultInterface;
use Illuminate\Support\Collection;

class ResultCollection extends AbstractResultCollection
{
    public function __construct(array|Collection|ResultInterface $results)
    {
        match (true) {
            $results instanceof ResultInterface => $this->addResult($results),
            $results instanceof Collection => parent::__construct($results),
            is_array($results) => parent::__construct($results),
            default => throw new \InvalidArgumentException('Invalid argument type for ResultCollection')
        };
    }

    public function __toString(): string
    {
        $messages = $this->getMessages();
        $status = $this->getStatus();

        $output = "Status: $status\nMessages:\n";

        foreach ($messages as $message) {
            $output .= "- $message\n";
        }

        return $output;
    }
}
