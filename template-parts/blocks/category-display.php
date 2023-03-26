<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'category-display-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'custom-block block-category-display';
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

$categories = get_field('categories');

?>

<div class="<?= esc_attr($className) ?>" id="<?= esc_attr($id) ?>">
    <div class="card-container">
        <?php foreach ($categories as $category) : ?>
        <div class="card">
            <div class="card-head">
                <img src="<?= esc_attr(get_field("cat_image", "category_" . $category->term_id)) ?>">
            </div>
            <div class="card-body">
                <h3><?= esc_html($category->name); ?></h3>
                <p class="category-excerpt"><?= esc_html($category->description); ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
