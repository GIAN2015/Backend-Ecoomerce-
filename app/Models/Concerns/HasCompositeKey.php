<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Builder;

trait HasCompositeKey
{
    /**
     * @var array<string>
     */
    protected array $compositeKey = [];

    public function setCompositeKey(array $keys): void
    {
        $this->compositeKey = $keys;
    }

    public function getKeyName()
    {
        return $this->compositeKey ?: parent::getKeyName();
    }

    protected function setKeysForSaveQuery($query)
    {
        if (empty($this->compositeKey)) {
            return parent::setKeysForSaveQuery($query);
        }

        foreach ($this->compositeKey as $keyField) {
            $query->where($keyField, '=', $this->getAttribute($keyField));
        }

        return $query;
    }

    public function newQuery(): Builder
    {
        return parent::newQuery();
    }
}
