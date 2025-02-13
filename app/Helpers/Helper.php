<?php

if (!function_exists('sort_link')) {
    function sort_link($column, $label)
    {
        $sort = request('sort');
        $direction = request('direction');

        // Tentukan arah sorting
        $newDirection = ($sort === $column && $direction === 'asc') ? 'desc' : 'asc';

        // Buat URL dengan parameter sorting
        $url = request()->fullUrlWithQuery([
            'sort' => $column,
            'direction' => $newDirection,
        ]);

        // Tampilkan link dengan ikon sorting
        $icon = ($sort === $column)
            ? ($direction === 'asc' ? '↑' : '↓')
            : '↕';

        return "<a href='{$url}' class='text-decoration-none text-black'>{$label} {$icon}</a>";
    }
}
