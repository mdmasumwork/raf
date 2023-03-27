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
$title = get_field('title');
$description = get_field('description');
$show_search_button = get_field('show_search_button');
$button_text = get_field('button_text');
?>

<div class="<?= esc_attr($className) ?>" id="<?= esc_attr($id) ?>">
    <?php if ($title) : ?>
        <h2 class="block-title"><?= esc_html($title) ?></h2>
    <?php endif; ?>
    <?php if ($description) : ?>
        <p class="block-description"><?= esc_html($description) ?></p>
    <?php endif; ?>
    <div class="card-container">
        <?php foreach ($categories as $category) : ?>
        <div class="card">
            <div class="card-head">
                <img src="<?= esc_attr(get_field("cat_image", "category_" . $category->term_id)) ?>">
            </div>
            <div class="card-body">
                <h3><?= esc_html($category->name); ?></h3>
                <p class="category-excerpt"><?= esc_html($category->description); ?></p>
                <?php if ($show_search_button) : ?>
                    <button class="category-search-button raf-button raf-button-primary-text"><?= $button_text ? esc_html($button_text) : "Search by " . $category->name ?></button>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
