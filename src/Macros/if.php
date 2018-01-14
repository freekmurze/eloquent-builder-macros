<?php

namespace Exyplis\EloquentBuilderMacros\Macros;

use Illuminate\Database\Eloquent\Builder;

/*
 * Check passed condition, and adds
 * custom `where` clause to query on true

 * Originally posted on https://themsaid.com/laravel-query-conditions-20160425
 * @author @themsaid
 *
 * @param string $column
 * @param        $param
 *
 * @return Builder
 */

Builder::macro('if', function ($condition, $column, $operator, $value) {
    if ($condition) {
        return $this->where($column, $operator, $value);
    }

    return $this;
});
