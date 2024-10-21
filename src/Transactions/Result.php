<?php

namespace Aika\Toolbox\Transactions;

use Aika\Toolbox\Transactions\Base\AbstractResult;

class Result extends AbstractResult
{
    public function __construct(
        int $status = self::UNKNOW,
        ?string $message = null,
        $data = null
    ) {
        $this->status = $status;
        $this->message = $message;
        $this->data = $data;
    }
}
