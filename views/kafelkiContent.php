<?php if (is_home()) : ?>
    <div id="kaf-content-<?= $id ?>" class="kaf-content" 
         style="max-width: 1100px;">
         <?php foreach ($posts_from_setting as $key => $post) : ?>
            <a id="kaf-item-<?= $key ?>" 
               class="<?= ($key < 4) ? 'kaf-one-col' : 'kaf-two-col' ?> kaf-item"
               href="<?= get_permalink($post['post']) ?>">
                <div class="kaf-inner">
                    <h2>
                        <?= get_post($post['post'])->post_title ?>
                    </h2>
                    <div class="kaf-img">
                        <img width="1024" height="494" alt="<?= get_post($post['post'])->post_title ?>" class="kaf-scale-img wp-post-image" src="<?= $post['img'] ?>">
                    </div>
                </div>
            </a>
        <?php endforeach; ?>

        <div class="clear"></div>
    </div>
<?php endif; ?>