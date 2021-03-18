<?php

namespace Smartisan\QueryFilter;

use Illuminate\Database\Eloquent\Builder;

trait HasFilters
{
    /**
     * Filter a result set.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param \Smartisan\QueryFilter\QueryFilter $filters
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilter(Builder $query, QueryFilter $filters): Builder
    {
        return $filters->apply($query);
    }
}
