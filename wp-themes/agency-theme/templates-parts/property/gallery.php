<?php
if (!defined('ABSPATH')) {
    exit;
}

$gallery_ids = get_post_meta(get_the_ID(), '_property_gallery', true);
if (!$gallery_ids) return;

$images = explode(',', $gallery_ids);
if (empty($images)) return;
?>

<div class="property-gallery">
    <div class="gallery-main">
        <?php
        $main_image = wp_get_attachment_image_src($images[0], 'large');
        if ($main_image) :
        ?>
            <img src="<?php echo esc_url($main_image[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" class="gallery-main-image">
        <?php endif; ?>
    </div>
    
    <?php if (count($images) > 1) : ?>
        <div class="gallery-thumbs">
            <?php foreach ($images as $index => $image_id) : 
                $thumb = wp_get_attachment_image_src($image_id, 'thumbnail');
                if ($thumb) :
            ?>
                <img src="<?php echo esc_url($thumb[0]); ?>" 
                     alt="<?php echo esc_attr(get_the_title()); ?>" 
                     class="gallery-thumb <?php echo $index === 0 ? 'active' : ''; ?>"
                     data-full="<?php echo esc_url(wp_get_attachment_image_src($image_id, 'large')[0]); ?>">
            <?php 
                endif;
            endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<style>
.property-gallery {
    margin-bottom: 2rem;
}

.gallery-main {
    margin-bottom: 1rem;
    border-radius: var(--border-radius);
    overflow: hidden;
}

.gallery-main-image {
    width: 100%;
    height: 400px;
    object-fit: cover;
    cursor: pointer;
}

.gallery-thumbs {
    display: flex;
    gap: 0.5rem;
    overflow-x: auto;
    padding: 0.5rem 0;
}

.gallery-thumb {
    width: 80px;
    height: 60px;
    object-fit: cover;
    border-radius: 4px;
    cursor: pointer;
    opacity: 0.7;
    transition: var(--transition);
    flex-shrink: 0;
}

.gallery-thumb:hover,
.gallery-thumb.active {
    opacity: 1;
    border: 2px solid var(--accent);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const mainImage = document.querySelector('.gallery-main-image');
    const thumbs = document.querySelectorAll('.gallery-thumb');
    
    thumbs.forEach(thumb => {
        thumb.addEventListener('click', function() {
            thumbs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');
            mainImage.src = this.dataset.full;
        });
    });
});
</script>