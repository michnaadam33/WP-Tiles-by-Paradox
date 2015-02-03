<div class="wrap">
    <h2>Tiles Plugin</h2>

    <form id="tiles-settings-group" method="post" action="options.php">

        <?php
        do_settings_sections('tiles-settings-group');
        settings_fields('tiles-settings-group');
        ?>
        <table class="form-table">
            <?php
            $tileArr = (get_option('tileArr')) ? get_option('tileArr') : [
                ['img' => '', 'post' => '']
            ];
            ?>
            <?php foreach ($tileArr as $key => $tile) : ?>
                <tr valign="top">
                    <th scope="row">Tile <?= $key ?></th>
                    <td><input placeholder="Image url" type="text" name="tileArr[<?= $key ?>][img]" size="70" value="<?= $tile['img'] ?>" /></td>
                    <td>
                        <select name="tileArr[<?= $key ?>][post]" style="width: 250px">
                            <?php foreach ($posts_array as $post) : ?>
                                <option <?= ($post->ID == $tile['post'] ) ? "selected" : "" ?> value="<?= $post->ID ?>"><?= $post->post_title ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?php submit_button(); ?>
    </form>
</div>