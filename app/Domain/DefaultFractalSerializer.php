<?php

namespace App\Domain;

use Spatie\Fractalistic\ArraySerializer;

class DefaultFractalSerializer extends ArraySerializer
{
    /**
     * @param $resourceKey
     * @param array $data
     * @return array
     */
    public function collection($resourceKey, array $data):array
    {
        if ($resourceKey) {
            return $resourceKey == 'include' ? $data : [$resourceKey => $data];
        }
        return ['data' => $data];
    }

    /**
     * @param $resourceKey
     * @param array $data
     * @return array
     */
    public function item($resourceKey, array $data):array
    {
        if ($resourceKey) {
            return $resourceKey == 'include' ? $data : [$resourceKey => $data];
        }
        return ['data' => $data];
    }

}
