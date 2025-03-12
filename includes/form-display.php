<?php
function display_product_form() {
    ob_start(); // Buffer output

    // Παίρνουμε τα προϊόντα (posts)
    $args = array(
        'post_type'      => 'project',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
    );

    $posts = get_posts($args);
    ?>

    <form method="post">
        <input type="text" id="searchInput" placeholder="Αναζήτηση προϊόντος...">

        <table id="productsTable">
            <thead>
                <tr>
                    <th>Επιλογή</th>
                    <th>Προϊόν</th>
                    <th>Εικόνα</th>
                    <th>Ποσότητα</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $post) : setup_postdata($post); ?>
                    <tr>
                        <td><input type="checkbox" name="products[]" value="<?php echo $post->ID; ?>"></td>
                        <td class="product-title">
                            <a href="<?php echo get_permalink($post->ID); ?>"><?php echo get_the_title($post->ID); ?></a>
                        </td>
                        <td>
                            <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'thumbnail') ?: 'default-image.jpg'; ?>" 
                                 alt="<?php echo get_the_title($post->ID); ?>" width="100">
                        </td>
                        <td>
                            <input type="number" name="quantity[<?php echo $post->ID; ?>]" value="1" min="1" max="10">
                        </td>
                    </tr>
                <?php endforeach; wp_reset_postdata(); ?>
            </tbody>
        </table>

        <button type="submit" name="product_form_submit">Αποστολή</button>
    </form>

    <?php
    return ob_get_clean();
}
