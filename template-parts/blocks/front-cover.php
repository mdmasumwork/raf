<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'front-cover-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'custom-block block-front-cover';
$bgColor = '';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}

if (!empty($block['align'])) {
    $className .= ' align_' . $block['align'];
}

if (!empty($block['backgroundColor'])) {
    $bgColor = $block['backgroundColor'];
}

$title = get_field('title');
$description = get_field('description');

?>

<div class="<?= esc_attr($className) ?>" id="<?= esc_attr($id) ?>">
    <div class="cover-content">
        <h2><?= esc_html($title) ?></h2>
        <p><?= esc_html($description) ?></p>
        <div class="search-area-in-front-cover">
            <div class="state-select">
                <select>
                    <option value="IA">Iowa</option>
                    <option value="NY">New York</option>
                    <option value="CA">California</option>
                </select>
            </div>
            <div class="city-select">
                <select>
                    <option value="IA">Iowa</option>
                    <option value="NY">New York</option>
                    <option value="CA">California</option>
                </select>
            </div>
            <div class="search-button">
                <button class="raf-button raf-button-primary-1">Search</button>
            </div>
        </div>
    </div>
</div>
