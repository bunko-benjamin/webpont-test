<?php

namespace Webpont\Test\Data\Domain\Service;

class GetNumbersService
{
    /**
     * @param int $from
     * @param int $limit
     *
     * @return array
     */
    public function get(int $from, int $limit): array
    {
        $from = $from < 1 ? 1 : $from;
        $from = $from > 100 ? 100 : $from;
        $to   = $from + $limit - 1;
        $to   = $to > 100 ? 100 : $to;

        return range($from, $to);
    }
}
