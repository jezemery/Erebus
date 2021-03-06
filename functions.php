<?php

$fieldGroups = new \NanoSoup\Erebus\ACF\FieldGroups\Testimonials();
$fieldGroups->init();

// Todo: This is for test purposes - we would need a loader
$testimonials = new \NanoSoup\Erebus\ACF\Blocks\Testimonials();
$testimonials->init();

add_filter('allowed_block_types', 'allowedBlocks');

function allowedBlocks($allowed_block_types)
{
    $blocks = acf_get_block_types();

    $allowed = [
        'core/paragraph',
        'core/heading',
        'core/image'
    ];

    foreach ($blocks as $block) {
        if (in_array(get_post_type(), $block['allowedPostTypes'])) {
            $allowed[] = $block['name'];
        }
    }

    return $allowed;
}