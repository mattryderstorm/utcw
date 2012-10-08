<?php if ( ! defined( 'ABSPATH' ) ) die();
/**
 * Ultimate Tag Cloud Widget
 * @author     Rickard Andersson <rickard@0x539.se>
 * @version    2.0
 * @license    GPLv2
 * @package    utcw
 * @subpackage pages
 *
 * @var UTCW_Config $config
 * @var array $available_taxonomies
 * @var array $available_post_types
 * @var array $configurations
 * @var array $terms
 * @var array $users
 * @var UTCW $this
 */

?>
<button class="utcw-tab-button utcw-active" data-id="<?php echo $this->id ?>"
		data-tab="<?php echo $this->get_field_id( 'utcw-tab-data' ) ?>"><?php _e( 'Data', 'utcw' ) ?></button>
<button class="utcw-tab-button" data-id="<?php echo $this->id ?>"
		data-tab="<?php echo $this->get_field_id( 'utcw-tab-terms' ) ?>"><?php _e( 'Terms', 'utcw' ) ?></button>
<button class="utcw-tab-button" data-id="<?php echo $this->id ?>"
		data-tab="<?php echo $this->get_field_id( 'utcw-tab-basic-appearance' ) ?>"><?php _e( 'Basic appearance', 'utcw' ) ?></button>
<button class="utcw-tab-button" data-id="<?php echo $this->id ?>"
		data-tab="<?php echo $this->get_field_id( 'utcw-tab-advanced-appearance' ) ?>"><?php _e( 'Advanced appearance', 'utcw' ) ?></button>
<button class="utcw-tab-button" data-id="<?php echo $this->id ?>"
		data-tab="<?php echo $this->get_field_id( 'utcw-tab-links' ) ?>"><?php _e( 'Links', 'utcw' ) ?></button>
<button class="utcw-tab-button" data-id="<?php echo $this->id ?>"
		data-tab="<?php echo $this->get_field_id( 'utcw-tab-advanced' ) ?>"><?php _e( 'Adv.', 'utcw' ) ?></button>

<fieldset class='utcw' id="<?php echo $this->get_field_id( 'utcw-tab-data' ) ?>">
	<legend></legend>
	<a class="utcw-help"
	   title="<?php _e( 'Only posts from the selected authors will be used when calculating the tag cloud.', 'utcw' ) ?>">?</a>
	<strong><?php _e( 'Authors:', 'utcw' ) ?></strong><br>
	<?php foreach ( $users as $user ) : ?>
	<input type="checkbox" name="<?php echo $this->get_field_name( 'authors' ) ?>[]"
		   id="<?php echo $this->get_field_id( 'author_' . $user->ID ) ?>"
		   value="<?php echo $user->ID?>" <?php echo  in_array( $user->ID, $config->authors, true ) ? 'checked="checked"' : ''; ?>>
	<label for="<?php echo $this->get_field_id( 'author_' . $user->ID ) ?>"><?php echo $user->user_login?></label><br>
	<?php endforeach; ?>
	<br>

	<a class="utcw-help"
	   title="<?php _e( 'Which property of the tag should be used when determining the order of the tags in the cloud.', 'utcw' ) ?>">?</a>
	<strong><?php _e( 'Order:', 'utcw' ) ?></strong><br>
	<input type="radio" name="<?php echo $this->get_field_name( 'order' ) ?>"
		   id="<?php echo $this->get_field_id( 'order_random' ) ?>"
		   value="random" <?php echo  $config->order == 'random' ? ' checked="checked" ' : ''; ?>>
	<label for="<?php echo $this->get_field_id( 'order_random' ) ?>"><?php _e( 'Random', 'utcw' ) ?></label><br>
	<input type="radio" name="<?php echo $this->get_field_name( 'order' ) ?>"
		   id="<?php echo $this->get_field_id( 'order_name' ) ?>"
		   value="name" <?php echo  $config->order == 'name' ? ' checked="checked"' : ''; ?>>
	<label for="<?php echo $this->get_field_id( 'order_name' ) ?>"><?php _e( 'By name', 'utcw' ) ?></label><br>
	<input type="radio" name="<?php echo $this->get_field_name( 'order' ) ?>"
		   id="<?php echo $this->get_field_id( 'order_slug' ) ?>"
		   value="slug" <?php echo  $config->order == 'slug' ? ' checked="checked"' : ''; ?>>
	<label for="<?php echo $this->get_field_id( 'order_slug' ) ?>"><?php _e( 'By slug', 'utcw' ) ?></label><br>
	<input type="radio" name="<?php echo $this->get_field_name( 'order' ) ?>"
		   id="<?php echo $this->get_field_id( 'order_id' ) ?>"
		   value="id" <?php echo  $config->order == 'id' ? ' checked="checked"' : ''; ?>>
	<label for="<?php echo $this->get_field_id( 'order_id' ) ?>"><?php _e( 'By id', 'utcw' ) ?></label><br>
	<input type="radio" name="<?php echo $this->get_field_name( 'order' ) ?>"
		   id="<?php echo $this->get_field_id( 'order_color' ) ?>"
		   value="name" <?php echo  $config->order == 'color' ? ' checked="checked"' : ''; ?>>
	<label for="<?php echo $this->get_field_id( 'order_color' ) ?>"><?php _e( 'By color', 'utcw' ) ?></label><br>
	<input type="radio" name="<?php echo $this->get_field_name( 'order' ) ?>"
		   id="<?php echo $this->get_field_id( 'order_count' ) ?>"
		   value="count" <?php echo  $config->order == 'count' || strlen( $config->order ) == 0 ? ' checked="checked" ' : ''; ?>>
	<label for="<?php echo $this->get_field_id( 'order_count' ) ?>"><?php _e( 'Count', 'utcw' ) ?></label><br>
	<input type="checkbox" name="<?php echo $this->get_field_name( 'reverse' ) ?>"
		   id="<?php echo $this->get_field_id( 'reverse' ) ?>" <?php echo  $config->reverse === true ? ' checked="checked"' : ''; ?>>
	<label for="<?php echo $this->get_field_id( 'reverse' ) ?>"><?php _e( 'Reverse order', 'utcw' ) ?></label><br>
	<input type="checkbox" name="<?php echo $this->get_field_name( 'case_sensitive' ) ?>"
		   id="<?php echo $this->get_field_id( 'case_sensitive' ) ?>" <?php echo $config->case_sensitive === true ? ' checked="checked"' : ''; ?>>
	<label
		for="<?php echo $this->get_field_id( 'case_sensitive' ) ?>"><?php _e( 'Case sensitive', 'utcw' ) ?></label><br>
	<br>

	<a class="utcw-help"
	   title="<?php _e( 'Which taxonomy should be used in the cloud. You should be able to choose a custom taxonomy as well.', 'utcw' ) ?>">?</a>
	<strong><label
		for="<?php echo $this->get_field_id( 'taxonomy' ) ?>"><?php _e( 'Taxonomy:', 'utcw' ) ?></label></strong><br>
	<select id="<?php echo $this->get_field_id( 'taxonomy' ) ?>"
			name="<?php echo $this->get_field_name( 'taxonomy' ) ?>">
		<?php foreach ( $available_taxonomies as $taxonomy ) :  ?>
		<option
			value="<?php echo $taxonomy->name ?>" <?php echo $config->taxonomy == $taxonomy->name ? 'selected="selected"' : ''?>><?php echo $taxonomy->labels->name ?></option>
		<?php endforeach; ?>
	</select><br>
	<br>

	<a class="utcw-help"
	   title="<?php _e( 'Which post types should be used in the cloud. Only tags from posts from these post types will be used in the tag cloud.', 'utcw' ) ?>">?</a>
	<strong>Post types:</strong><br>

	<?php foreach ( $available_post_types as $pt ) : $data = get_post_type_object( $pt ) ?>
	<input type="checkbox" name="<?php echo $this->get_field_name( 'post_type' ) ?>[]"
		   id="<?php echo $this->get_field_id( 'post_type-' . $pt ) ?>"
		   value="<?php echo $pt ?>" <?php if ( in_array( $pt, $config->post_type ) ) echo 'checked="checked"' ?>>
	<label for="<?php echo $this->get_field_id( 'post_type-' . $pt ) ?>"><?php echo $data->labels->name ?></label><br>
	<?php endforeach ?>
	<br>

	<a class="utcw-help"
	   title="<?php _e( 'Only tags which have been used with this many posts will be visible in the cloud', 'utcw' ) ?>">?</a>
	<strong><label for="<?php echo $this->get_field_id( 'minimum' ) ?>"
				   title="<?php _e( 'Tags with fewer posts than this will be automatically excluded.', 'utcw' ) ?>"><?php _e( 'Minimum number of posts: ', 'utcw' ) ?></label></strong>
	<input type="number" name="<?php echo $this->get_field_name( 'minimum' ) ?>"
		   id="<?php echo $this->get_field_id( 'minimum' ) ?>" value="<?php echo $config->minimum; ?>"><br>
	<br>

	<a class="utcw-help"
	   title="<?php _e( 'Only posts which are posted within this number of days will be used when generating the cloud', 'utcw' ) ?>">?</a>
	<strong><label for="<?php echo $this->get_field_id( 'days_old' ) ?>"
				   title="<?php _e( 'The maximum number of days back to search for posts, zero means every post.', 'utcw' )?>"><?php _e( 'Posts max age:', 'utcw' )?></label></strong>
	<input type="number" name="<?php echo $this->get_field_name( 'days_old' ) ?>"
		   id="<?php echo $this->get_field_id( 'days_old' ) ?>" value="<?php echo $config->days_old; ?>"><br>
</fieldset>

<fieldset class="utcw hidden" id="<?php echo $this->get_field_id( 'utcw-tab-terms' ) ?>">
	<legend></legend>

	<?php // todo: help ?>

	<strong><?php _e( 'Selection type', 'utcw' ) ?></strong>
	<br>
	<input type="radio" name="<?php echo $this->get_field_name( 'tags_list_type' ) ?>"
		   id="<?php echo $this->get_field_id( 'tags_list_type_include' ) ?>"
		   value="include" <?php echo $config->tags_list_type == 'include' ? 'checked="checked" ' : ''; ?>>
	<label
		for="<?php echo $this->get_field_id( 'tags_list_type_include' ) ?>"><?php _e( 'Include only selected terms', 'utcw' ) ?></label>
	<br>
	<input type="radio" name="<?php echo $this->get_field_name( 'tags_list_type' ) ?>"
		   id="<?php echo $this->get_field_id( 'tags_list_type_exclude' ) ?>"
		   value="exclude" <?php echo $config->tags_list_type == 'exclude' ? 'checked="checked" ' : ''; ?>>
	<label
		for="<?php echo $this->get_field_id( 'tags_list_type_exclude' ) ?>"><?php _e( 'Exclude selected terms', 'utcw' ) ?></label>

	<br>
	<br>
	<?php foreach ( $available_taxonomies as $taxonomy ) : ?>

	<div id="<?php echo $taxonomy->name ?>-terms" <?php if ( $taxonomy->name != $config->taxonomy ) echo 'class="hidden"' ?>>

		<strong><?php printf( __( 'Terms for taxonomy %s', 'utcw' ), $taxonomy->labels->name ) ?></strong>

		<?php if ( isset( $terms[ $taxonomy->name ] ) ) : ?>
		<ul>
		<?php foreach ( $terms[ $taxonomy->name ] as $term ) : ?>
			<li>
				<label>
					<input
						type="checkbox"
						name="<?php echo $this->get_field_name( 'tags_list' ) ?>[]"
						value="<?php echo $term->term_id ?>"
						<?php if ( in_array( $term->term_id, $config->tags_list ) ) echo 'checked="checked"' ?>>
					<?php echo $term->name ?>
				</label>
			</li>
		<?php endforeach ?>
		</ul>
		<?php else : ?>
			<p><?php printf( __( 'No terms for taxonomy "%s"', 'utcw' ), $taxonomy->labels->name ) ?></p>
		<?php endif ?>

	</div>

	<?php endforeach ?>

</fieldset>

<fieldset class="utcw hidden" id="<?php echo $this->get_field_id( 'utcw-tab-basic-appearance' ) ?>">
	<legend></legend>
	<a class="utcw-help"
	   title="<?php _e( 'The title is the text which is shown above the tag cloud.', 'utcw' ) ?>">?</a>
	<strong><label
		for="<?php echo $this->get_field_id( 'title' );?>"><?php _e( 'Title:', 'utcw' ) ?></label></strong><br>
	<input type="checkbox" id="<?php echo $this->get_field_id( 'show_title_text' ) ?>"
		   name="<?php echo $this->get_field_name( 'show_title_text' ) ?>" <?php if ( ! isset( $config->show_title_text ) || $config->show_title_text ) echo 'checked="checked"' ?>>
	<label for="<?php echo $this->get_field_id( 'show_title_text' ) ?>"><?php _e( 'Show title', 'utcw' ) ?></label><br>
	<input type="text" id="<?php echo $this->get_field_id( 'title' );?>"
		   name="<?php echo $this->get_field_name( 'title' );?>"
		   value="<?php echo $config->title ?>"><br>
	<br>

	<a class="utcw-help"
	   title="<?php _e( 'The tag with the least number of posts will be the smallest, and the tag with the most number of posts will be the biggest.', 'utcw' ) ?>">?</a>
	<strong><?php _e( 'Tag size (in px):', 'utcw' ) ?></strong><br>
	<label for="<?php echo $this->get_field_id( 'size_from' ) ?>"><?php _e( 'From', 'utcw' ) ?></label>
	<input type="number" name="<?php echo $this->get_field_name( 'size_from' ) ?>"
		   id="<?php echo $this->get_field_id( 'size_from' ) ?>" size="3"
		   value="<?php echo $config->size_from ?>">
	<label for="<?php echo $this->get_field_id( 'size_to' ) ?>"><?php _e( 'to', 'utcw' ) ?></label>
	<input type="number" name="<?php echo $this->get_field_name( 'size_to' ) ?>"
		   id="<?php echo $this->get_field_id( 'size_to' ) ?>" size="3"
		   value="<?php echo $config->size_to ?>"><br>
	<br>

	<a class="utcw-help"
	   title="<?php _e( 'If the total number of tags exceeds this number, only this many tags will be shown in the cloud.', 'utcw' ) ?>">?</a>
	<strong><label
		for="<?php echo $this->get_field_id( 'max' ) ?>"><?php _e( 'Max tags:', 'utcw' ) ?></label></strong><br>
	<input type="number" name="<?php echo $this->get_field_name( 'max' ) ?>"
		   id="<?php echo $this->get_field_id( 'max' ) ?>"
		   value="<?php echo $config->max ?>"><br>
	<br>

	<a class="utcw-help"
	   title="<?php _e( 'This setting controls how the tags are colored.<ul><li>Totaly random will choose between all the 16 million colors available.</li><li>Random from preset values will choose colors from a predefined set of colors</li><li>Spanning between values will calculate the corresponding color based upon how many posts each tag has, similar to how the size is calculated. The tag with the least number of posts will have the first color and the tag with the most number of posts will have the second color. All tags in between will have a color calculated between the first and the second color.</li></ul>The colors for the choice \'Random from preset values\' has to be specified as a comma separated list.', 'utcw' )?>">?</a>
	<strong><?php _e( 'Coloring:', 'utcw' ) ?></strong><br>
	<input type="radio" name="<?php echo $this->get_field_name( 'color' ) ?>"
		   id="<?php echo $this->get_field_id( 'color_none' ) ?>"
		   value="none" <?php echo $config->color == 'none' ? 'checked="checked"' : ''; ?>>
	<label for="<?php echo $this->get_field_id( 'color_none' ) ?>"><?php _e( 'None', 'utcw' ) ?></label><br>
	<input type="radio" name="<?php echo $this->get_field_name( 'color' ) ?>"
		   id="<?php echo $this->get_field_id( 'color_random' ) ?>"
		   value="random" <?php echo $config->color == 'random' ? 'checked="checked"' : ''; ?>>
	<label for="<?php echo $this->get_field_id( 'color_random' ) ?>"><?php _e( 'Totally random', 'utcw' ) ?></label><br>
	<input type="radio" name="<?php echo $this->get_field_name( 'color' ) ?>"
		   id="<?php echo $this->get_field_id( 'color_set' ) ?>"
		   value="set" <?php echo $config->color == 'set' ? 'checked="checked"' : ''; ?>>
	<label
		for="<?php echo $this->get_field_id( 'color_set' ) ?>"><?php _e( 'Random from preset values', 'utcw' ) ?></label><br>

	<div
		id="<?php echo $this->get_field_id( 'set_chooser' ) ?>" <?php echo $config->color != 'set' ? 'class="utcw-hidden"' : ''; ?>>
		<label class="screen-reader-text"
			   for="<?php echo $this->get_field_id( 'color_set_chooser' ) ?>"><?php _e( 'Random from preset values', 'utcw' ) ?></label>
		<input type="text" name="<?php echo $this->get_field_name( 'color_set' ) ?>"
			   id="<?php echo $this->get_field_id( 'color_set_chooser' ) ?>">
	</div>
	<input type="radio" name="<?php echo $this->get_field_name( 'color' ) ?>"
		   id="<?php echo $this->get_field_id( 'color_span' ) ?>"
		   value="span" <?php echo  $config->color == 'span' ? 'checked="checked"' : ''; ?>>
	<label
		for="<?php echo $this->get_field_id( 'color_span' ) ?>"><?php _e( 'Spanning between values', 'utcw' ) ?></label><br>

	<div
		id="<?php echo $this->get_field_id( 'span_chooser' ) ?>" <?php echo  $config->color != 'span' ? 'class="utcw-hidden"' : ''; ?>>
		<label for="<?php echo $this->get_field_id( 'color_span_from' ) ?>"><?php _e( 'From', 'utcw' ) ?></label>
		<input type="text" size="7" name="<?php echo $this->get_field_name( 'color_span_from' ) ?>"
			   id="<?php echo $this->get_field_id( 'color_span_from' ) ?>" value="<?php echo $config->color_span_from ?>"><br>

		<label for="<?php echo $this->get_field_id( 'color_span_to' ) ?>"><?php _e( 'to', 'utcw' ) ?></label>
		<input type="text" size="7" name="<?php echo $this->get_field_name( 'color_span_to' ) ?>"
			   id="<?php echo $this->get_field_id( 'color_span_to' ) ?>" value="<?php echo $config->color_span_to ?>">
	</div>
	<br>
</fieldset>

<fieldset class="utcw hidden" id="<?php echo $this->get_field_id( 'utcw-tab-advanced-appearance' ) ?>">
	<legend></legend>
	<a class="utcw-help"
	   title="<?php _e( 'The title is the small (usually) yellow label which will appear when the user hovers the tag. Try to hover the text to the left to see an example of what a title text looks like.', 'utcw' ) ?>">?</a>
	<input type="checkbox" name="<?php echo $this->get_field_name( 'show_title' ) ?>"
		   id="<?php echo $this->get_field_id( 'show_title' ) ?>" <?php echo $config->show_title === true ? 'checked="checked"' : ''?>>
	<label for="<?php echo $this->get_field_id( 'show_title' ) ?>"
		   title="<?php _e( 'This is a title', 'utcw' ) ?>"><?php _e( 'Show title (hover text)', 'utcw' ) ?></label><br>
	<br>

	<a class="utcw-help"
	   title="<?php _e( 'The spacing is a numerical value which controls how much space there is between letters, words, tags or rows. To use the default value for these settings just use the corresponding default value from the CSS specification: <ul><li>Letter spacing: normal</li><li>Word spacing: normal</li><li>Tag spacing (CSS margin): auto</li><li>Row spacing (CSS line height): inherit</li></ul>To use anything but the default values, just specify a number (the unit is pixels).', 'utcw' ) ?>">?</a>
	<strong><?php _e( 'Spacing (in px):', 'utcw' ) ?></strong><br>
	<label class="two-col"
		   for="<?php echo $this->get_field_id( 'letter_spacing' ) ?>"><?php _e( 'Between letters:', 'utcw' ) ?></label>
	<input type="text" size="5" name="<?php echo $this->get_field_name( 'letter_spacing' ) ?>"
		   id="<?php echo $this->get_field_id( 'letter_spacing' ) ?>"
		   value="<?php echo $config->letter_spacing ?>"><br>
	<label class="two-col"
		   for="<?php echo $this->get_field_id( 'word_spacing' ) ?>"><?php _e( 'Between words:', 'utcw' ) ?></label>
	<input type="text" size="5" name="<?php echo $this->get_field_name( 'word_spacing' ) ?>"
		   id="<?php echo $this->get_field_id( 'word_spacing' ) ?>"
		   value="<?php echo $config->word_spacing ?>"><br>
	<label class="two-col"
		   for="<?php echo $this->get_field_id( 'tag_spacing' ) ?>"><?php _e( 'Between tags:', 'utcw' ) ?></label>
	<input type="text" size="5" name="<?php echo $this->get_field_name( 'tag_spacing' ) ?>"
		   id="<?php echo $this->get_field_id( 'tag_spacing' ) ?>"
		   value="<?php echo $config->tag_spacing ?>"><br>
	<label class="two-col"
		   for="<?php echo $this->get_field_id( 'line_height' ) ?>"><?php _e( 'Between rows:', 'utcw' ) ?></label>
	<input type="text" size="5" name="<?php echo $this->get_field_name( 'line_height' ) ?>"
		   id="<?php echo $this->get_field_id( 'line_height' ) ?>"
		   value="<?php echo $config->line_height ?>"><br>
	<br>

	<a class="utcw-help"
	   title="<?php _e( 'The tags can be transformed in a number of different ways. lowercase, UPPERCASE or Capitalized.', 'utcw' )?>">?</a>
	<strong><?php _e( 'Transform tags:', 'utcw' ) ?></strong><br>
	<input type="radio" name="<?php echo $this->get_field_name( 'text_transform' ) ?>"
		   id="<?php echo $this->get_field_id( 'text_transform_off' ) ?>"
		   value="off" <?php echo $config->text_transform == 'off' ? 'checked="checked"' : ''; ?>>
	<label for="<?php echo $this->get_field_id( 'text_transform_off' ) ?>"><?php _e( 'Off', 'utcw' ) ?></label><br>
	<input type="radio" name="<?php echo $this->get_field_name( 'text_transform' ) ?>"
		   id="<?php echo $this->get_field_id( 'text_transform_lowercase' ) ?>"
		   value="lowercase" <?php echo $config->text_transform == 'lowercase' ? ' checked="checked"' : ''; ?>>
	<label
		for="<?php echo $this->get_field_id( 'text_transform_lowercase' ) ?>"><?php _e( 'To lowercase', 'utcw' ) ?></label><br>
	<input type="radio" name="<?php echo $this->get_field_name( 'text_transform' ) ?>"
		   id="<?php echo $this->get_field_id( 'text_transform_uppercase' ) ?>"
		   value="uppercase" <?php echo $config->text_transform == 'uppercase' ? ' checked="checked"' : ''; ?>>
	<label
		for="<?php echo $this->get_field_id( 'text_transform_uppercase' ) ?>"><?php _e( 'To uppercase', 'utcw' ) ?></label><br>
	<input type="radio" name="<?php echo $this->get_field_name( 'text_transform' ) ?>"
		   id="<?php echo $this->get_field_id( 'text_transform_capitalize' ) ?>"
		   value="capitalize" <?php echo $config->text_transform == 'capitalize' ? ' checked="checked"' : ''; ?>>
	<label
		for="<?php echo $this->get_field_id( 'text_transform_capitalize' ) ?>"><?php _e( 'Capitalize', 'utcw' ) ?></label><br>
	<br>

	<a class="utcw-help"
	   title="<?php _e( 'The tags can be surrounded by a prefix and/or suffix and separated with a separator. The default separator is just a space but can be changed to anything you\'d like. Remember to add a space before and after the separator, this is not automatically added by the plugin.<br><br>A short example, these settings:<ul><li>Separator: &nbsp;-&nbsp; </li><li>Prefix: (</li><li>Suffix: )</li></ul>… would produce a tag cloud like this: <br><br>(first tag) - (second tag) - (third tag)<br><br>Prefix and suffix characters will have the same size and color as the tag, but the separator will not.', 'utcw' ) ?>">?</a>
	<strong><?php _e( 'Tag separators:', 'utcw' )?></strong>
	<label class="two-col"
		   for="<?php echo $this->get_field_id( 'separator' ) ?>"><?php _e( 'Separator', 'utcw' ) ?></label>
	<input type="text" size=5 name="<?php echo $this->get_field_name( 'separator' ) ?>"
		   id="<?php echo $this->get_field_id( 'separator' ) ?>"
		   value="<?php echo $config->separator ?>"><br>
	<label class="two-col" for="<?php echo $this->get_field_id( 'prefix' ) ?>"><?php _e( 'Prefix', 'utcw' ) ?></label>
	<input type="text" size=5 name="<?php echo $this->get_field_name( 'prefix' ) ?>"
		   id="<?php echo $this->get_field_id( 'prefix' ) ?>"
		   value="<?php echo $config->prefix ?>"><br>
	<label class="two-col" for="<?php echo $this->get_field_id( 'suffix' ) ?>"><?php _e( 'Suffix', 'utcw' ) ?></label>
	<input type="text" size=5 name="<?php echo $this->get_field_name( 'suffix' ) ?>"
		   id="<?php echo $this->get_field_id( 'suffix' ) ?>"
		   value="<?php echo $config->suffix ?>"><br>

</fieldset>

<fieldset class="utcw hidden" id="<?php echo $this->get_field_id( 'utcw-tab-links' ) ?>">
	<legend></legend>

	<a class="utcw-help"
	   title="<?php _e( 'The normal styles will apply to the tags when the user is <b>not</b> hovering the link.', 'utcw' )?>">?</a>

	<h3><?php _e( 'Normal styles', 'utcw' ) ?></h3>
	<a class="utcw-help"
	   title="<?php _e( 'Yes or no will force the tag setting for the <u>underline</u> style, theme default will let the blog theme decide.', 'utcw' ) ?>">?</a>
	<strong><?php _e( 'Underline', 'utcw' ) ?></strong><br>
	<input type="radio" name="<?php echo $this->get_field_name( 'link_underline' ) ?>"
		   id="<?php echo $this->get_field_id( 'link_underline_yes' ) ?>"
		   value="yes" <?php echo $config->link_underline == 'yes' ? ' checked="checked"' : '' ?>>
	<label for="<?php echo $this->get_field_id( 'link_underline_yes' ) ?>"><?php _e( 'Yes', 'utcw' ) ?></label><br>
	<input type="radio" name="<?php echo $this->get_field_name( 'link_underline' ) ?>"
		   id="<?php echo $this->get_field_id( 'link_underline_no' ) ?>"
		   value="no" <?php echo $config->link_underline == 'no' ? ' checked="checked"' : '' ?>>
	<label for="<?php echo $this->get_field_id( 'link_underline_no' ) ?>"><?php _e( 'No', 'utcw' ) ?></label><br>
	<input type="radio" name="<?php echo $this->get_field_name( 'link_underline' ) ?>"
		   id="<?php echo $this->get_field_id( 'link_underline_default' ) ?>"
		   value="default" <?php echo $config->link_underline == 'default' ? ' checked="checked"' : '' ?>>
	<label
		for="<?php echo $this->get_field_id( 'link_underline_default' ) ?>"><?php _e( 'Theme default', 'utcw' ) ?></label><br>
	<br>

	<a class="utcw-help"
	   title="<?php _e( 'Yes or no will force the tag setting for the <b>bold</b> style, theme default will let the blog theme decide.', 'utcw' ) ?>">?</a>
	<strong><?php _e( 'Bold', 'utcw' ) ?></strong><br>
	<input type="radio" name="<?php echo $this->get_field_name( 'link_bold' ) ?>"
		   id="<?php echo $this->get_field_id( 'link_bold_yes' ) ?>"
		   value="yes" <?php echo $config->link_bold == 'yes' ? ' checked="checked"' : '' ?>>
	<label for="<?php echo $this->get_field_id( 'link_bold_yes' ) ?>"><?php _e( 'Yes', 'utcw' ) ?></label><br>
	<input type="radio" name="<?php echo $this->get_field_name( 'link_bold' ) ?>"
		   id="<?php echo $this->get_field_id( 'link_bold_no' ) ?>"
		   value="no" <?php echo $config->link_bold == 'no' ? ' checked="checked"' : '' ?>>
	<label for="<?php echo $this->get_field_id( 'link_bold_no' ) ?>"><?php _e( 'No', 'utcw' ) ?></label><br>
	<input type="radio" name="<?php echo $this->get_field_name( 'link_bold' ) ?>"
		   id="<?php echo $this->get_field_id( 'link_bold_default' ) ?>"
		   value="default" <?php echo $config->link_bold == 'default' ? ' checked="checked"' : '' ?>>
	<label for="<?php echo $this->get_field_id( 'link_bold_default' ) ?>"><?php _e( 'Theme default', 'utcw' ) ?></label><br>
	<br>

	<a class="utcw-help"
	   title="<?php _e( 'Yes or no will force the tag setting for the <i>italic</i> style, theme default will let the blog theme decide.', 'utcw' ) ?>">?</a>
	<strong><?php _e( 'Italic', 'utcw' ) ?></strong><br>
	<input type="radio" name="<?php echo $this->get_field_name( 'link_italic' ) ?>"
		   id="<?php echo $this->get_field_id( 'link_italic_yes' ) ?>"
		   value="yes" <?php echo $config->link_italic == 'yes' ? ' checked="checked"' : '' ?>>
	<label for="<?php echo $this->get_field_id( 'link_italic_yes' ) ?>"><?php _e( 'Yes', 'utcw' ) ?></label><br>
	<input type="radio" name="<?php echo $this->get_field_name( 'link_italic' ) ?>"
		   id="<?php echo $this->get_field_id( 'link_italic_no' ) ?>"
		   value="no" <?php echo $config->link_italic == 'no' ? ' checked="checked"' : '' ?>>
	<label for="<?php echo $this->get_field_id( 'link_italic_no' ) ?>"><?php _e( 'No', 'utcw' ) ?></label><br>
	<input type="radio" name="<?php echo $this->get_field_name( 'link_italic' ) ?>"
		   id="<?php echo $this->get_field_id( 'link_italic_default' ) ?>"
		   value="default" <?php echo $config->link_italic == 'default' ? ' checked="checked"' : '' ?>>
	<label
		for="<?php echo $this->get_field_id( 'link_italic_default' ) ?>"><?php _e( 'Theme default', 'utcw' ) ?></label><br>
	<br>

	<a class="utcw-help"
	   title="<?php _e( 'This setting will change the background color of <b>the link only</b>, not the whole cloud. The color has to be specified in hexadeximal format, like ffffff for white, 0000ff for blue or 000000 for black.', 'utcw' ) ?>">?</a>
	<strong><label
		for="<?php echo $this->get_field_id( 'link_bg_color' ) ?>"><?php _e( 'Background color (hex value):', 'utcw' ) ?></label></strong><br>
	<input type="text" name="<?php echo $this->get_field_name( 'link_bg_color' ) ?>"
		   id="<?php echo $this->get_field_id( 'link_bg_color' ) ?>" value="<?php echo $config->link_bg_color ?>"><br>
	<br>

	<a class="utcw-help"
	   title="<?php _e( 'This setting will change the border of <b>the link only</b>, not the whole cloud. <ul><li>The width of the border is a numerical value (in the unit pixels).</li><li>The color has to be specified in hexadeximal format, like ffffff for white, 0000ff for blue or 000000 for black.</li></ul>', 'utcw' ) ?>">?</a>
	<strong><?php _e( 'Border', 'utcw' ) ?></strong><br>
	<label for="<?php echo $this->get_field_id( 'link_border_style' ) ?>"><?php _e( 'Style: ', 'utcw' ) ?></label><br>
	<select name="<?php echo $this->get_field_name( 'link_border_style' ) ?>"
			id="<?php echo $this->get_field_id( 'link_border_style' ) ?>">
		<option
			value="none" <?php echo $config->link_border_style == 'none' ? 'selected="selected"' : '' ?>><?php _e( 'None', 'utcw' ) ?></option>
		<option
			value="dotted" <?php echo $config->link_border_style == 'dotted' ? 'selected="selected"' : '' ?>><?php _e( 'Dotted', 'utcw' ) ?></option>
		<option
			value="dashed" <?php echo $config->link_border_style == 'dashed' ? 'selected="selected"' : '' ?>><?php _e( 'Dashed', 'utcw' ) ?></option>
		<option
			value="solid" <?php echo $config->link_border_style == 'solid' ? 'selected="selected"' : '' ?>><?php _e( 'Solid', 'utcw' ) ?></option>
		<option
			value="double" <?php echo $config->link_border_style == 'double' ? 'selected="selected"' : '' ?>><?php _e( 'Double', 'utcw' ) ?></option>
		<option
			value="groove" <?php echo $config->link_border_style == 'groove' ? 'selected="selected"' : '' ?>><?php _e( 'Groove', 'utcw' ) ?></option>
		<option
			value="ridge" <?php echo $config->link_border_style == 'rigde' ? 'selected="selected"' : '' ?>><?php _e( 'Ridge', 'utcw' ) ?></option>
		<option
			value="inset" <?php echo $config->link_border_style == 'inset' ? 'selected="selected"' : '' ?>><?php _e( 'Inset', 'utcw' ) ?></option>
		<option
			value="outset" <?php echo $config->link_border_style == 'outset' ? 'selected="selected"' : '' ?>><?php _e( 'Outset', 'utcw' ) ?></option>
	</select><br>
	<br>
	<label
		for="<?php echo $this->get_field_id( 'link_border_width' ) ?>"><?php _e( 'Width (in px):', 'utcw' ) ?></label><br>
	<input type="number" name="<?php echo $this->get_field_name( 'link_border_width' ) ?>"
		   id="<?php echo $this->get_field_id( 'link_border_width' ) ?>" value="<?php echo $config->link_border_width ?>"><br>
	<br>
	<label
		for="<?php echo $this->get_field_id( 'link_border_color' ) ?>"><?php _e( 'Color (hex value): ', 'utcw' ) ?></label><br>
	<input type="color" name="<?php echo $this->get_field_name( 'link_border_color' ) ?>"
		   id="<?php echo $this->get_field_id( 'link_border_color' ) ?>" value="<?php echo $config->link_border_color ?>"><br>

	<a class="utcw-help"
	   title="<?php _e( 'The hover effects will only affect the style of the tag when the user hovers the tag. For details about each settings see the section above.', 'utcw' )?>">?</a>

	<h3>Hover effects</h3>
	<strong><?php _e( 'Underline', 'utcw' ) ?></strong><br>
	<input type="radio" name="<?php echo $this->get_field_name( 'hover_underline' ) ?>"
		   id="<?php echo $this->get_field_id( 'hover_underline_yes' ) ?>"
		   value="yes" <?php echo $config->hover_underline == 'yes' ? ' checked="checked"' : '' ?>>
	<label for="<?php echo $this->get_field_id( 'hover_underline_yes' ) ?>"><?php _e( 'Yes', 'utcw' ) ?></label><br>
	<input type="radio" name="<?php echo $this->get_field_name( 'hover_underline' ) ?>"
		   id="<?php echo $this->get_field_id( 'hover_underline_no' ) ?>"
		   value="no" <?php echo $config->hover_underline == 'no' ? ' checked="checked"' : '' ?>>
	<label for="<?php echo $this->get_field_id( 'hover_underline_no' ) ?>"><?php _e( 'No', 'utcw' ) ?></label><br>
	<input type="radio" name="<?php echo $this->get_field_name( 'hover_underline' ) ?>"
		   id="<?php echo $this->get_field_id( 'hover_underline_default' ) ?>"
		   value="default" <?php echo $config->hover_underline == 'default' ? ' checked="checked"' : '' ?>>
	<label
		for="<?php echo $this->get_field_id( 'hover_underline_default' ) ?>"><?php _e( 'Theme default', 'utcw' ) ?></label><br>
	<br>
	<strong><?php _e( 'Bold', 'utcw' ) ?></strong><br>
	<input type="radio" name="<?php echo $this->get_field_name( 'hover_bold' ) ?>"
		   id="<?php echo $this->get_field_id( 'hover_bold_yes' ) ?>"
		   value="yes" <?php echo $config->hover_bold == 'yes' ? ' checked="checked"' : '' ?>>
	<label for="<?php echo $this->get_field_id( 'hover_bold_yes' ) ?>"><?php _e( 'Yes', 'utcw' ) ?></label><br>
	<input type="radio" name="<?php echo $this->get_field_name( 'hover_bold' ) ?>"
		   id="<?php echo $this->get_field_id( 'hover_bold_no' ) ?>"
		   value="no" <?php echo $config->hover_bold == 'no' ? ' checked="checked"' : '' ?>>
	<label for="<?php echo $this->get_field_id( 'hover_bold_no' ) ?>"><?php _e( 'No', 'utcw' ) ?></label><br>
	<input type="radio" name="<?php echo $this->get_field_name( 'hover_bold' ) ?>"
		   id="<?php echo $this->get_field_id( 'hover_bold_default' ) ?>"
		   value="default" <?php echo $config->hover_bold == 'default' ? ' checked="checked"' : '' ?>>
	<label
		for="<?php echo $this->get_field_id( 'hover_bold_default' ) ?>"><?php _e( 'Theme default', 'utcw' ) ?></label><br>
	<br>
	<strong><?php _e( 'Italic', 'utcw' ) ?></strong><br>
	<input type="radio" name="<?php echo $this->get_field_name( 'hover_italic' ) ?>"
		   id="<?php echo $this->get_field_id( 'hover_italic_yes' ) ?>"
		   value="yes" <?php echo $config->hover_italic == 'yes' ? ' checked="checked"' : '' ?>>
	<label for="<?php echo $this->get_field_id( 'hover_italic_yes' ) ?>"><?php _e( 'Yes', 'utcw' ) ?></label><br>
	<input type="radio" name="<?php echo $this->get_field_name( 'hover_italic' ) ?>"
		   id="<?php echo $this->get_field_id( 'hover_italic_no' ) ?>"
		   value="no" <?php echo $config->hover_italic == 'no' ? ' checked="checked"' : '' ?>>
	<label for="<?php echo $this->get_field_id( 'hover_italic_no' ) ?>"><?php _e( 'No', 'utcw' ) ?></label><br>
	<input type="radio" name="<?php echo $this->get_field_name( 'hover_italic' ) ?>"
		   id="<?php echo $this->get_field_id( 'hover_italic_default' ) ?>"
		   value="default" <?php echo $config->hover_italic == 'default' ? ' checked="checked"' : '' ?>>
	<label
		for="<?php echo $this->get_field_id( 'hover_italic_default' ) ?>"><?php _e( 'Theme default', 'utcw' ) ?></label><br>
	<br>
	<strong><label
		for="<?php echo $this->get_field_id( 'hover_bg_color' ) ?>"><?php _e( 'Background color (hex value):', 'utcw' ) ?></label></strong><br>
	<input type="text" name="<?php echo $this->get_field_name( 'hover_bg_color' ) ?>"
		   id="<?php echo $this->get_field_id( 'hover_bg_color' ) ?>" value="<?php echo $config->hover_bg_color ?>"><br>
	<br>
	<strong><label
		for="<?php echo $this->get_field_id( 'hover_color' ) ?>"><?php _e( 'Font color (hex value):', 'utcw' ) ?></label></strong>
	<input type="text" name="<?php echo $this->get_field_name( 'hover_color' ) ?>"
		   id="<?php echo $this->get_field_id( 'hover_color' ) ?>" value="<?php echo $config->hover_color ?>"><br>
	<strong><?php _e( 'Border', 'utcw' ) ?></strong><br>
	<br>
	<label for="<?php echo $this->get_field_id( 'hover_border_style' ) ?>"><?php _e( 'Style: ', 'utcw' ) ?></label><br>
	<select name="<?php echo $this->get_field_name( 'hover_border_style' ) ?>"
			id="<?php echo $this->get_field_id( 'hover_border_style' ) ?>">
		<option
			value="none" <?php echo $config->hover_border_style == 'none' ? 'selected="selected"' : '' ?>><?php _e( 'None', 'utcw' ) ?></option>
		<option
			value="dotted" <?php echo $config->hover_border_style == 'dotted' ? 'selected="selected"' : '' ?>><?php _e( 'Dotted', 'utcw' ) ?></option>
		<option
			value="dashed" <?php echo $config->hover_border_style == 'dashed' ? 'selected="selected"' : '' ?>><?php _e( 'Dashed', 'utcw' ) ?></option>
		<option
			value="solid" <?php echo $config->hover_border_style == 'solid' ? 'selected="selected"' : '' ?>><?php _e( 'Solid', 'utcw' ) ?></option>
		<option
			value="double" <?php echo $config->hover_border_style == 'double' ? 'selected="selected"' : '' ?>><?php _e( 'Double', 'utcw' ) ?></option>
		<option
			value="groove" <?php echo $config->hover_border_style == 'groove' ? 'selected="selected"' : '' ?>><?php _e( 'Groove', 'utcw' ) ?></option>
		<option
			value="ridge" <?php echo $config->hover_border_style == 'rigde' ? 'selected="selected"' : '' ?>><?php _e( 'Ridge', 'utcw' ) ?></option>
		<option
			value="inset" <?php echo $config->hover_border_style == 'inset' ? 'selected="selected"' : '' ?>><?php _e( 'Inset', 'utcw' ) ?></option>
		<option
			value="outset" <?php echo $config->hover_border_style == 'outset' ? 'selected="selected"' : '' ?>><?php _e( 'Outset', 'utcw' ) ?></option>
	</select><br>
	<br>
	<label
		for="<?php echo $this->get_field_id( 'hover_border_width' ) ?>"><?php _e( 'Width (in px):', 'utcw' ) ?></label><br>
	<input type="number" name="<?php echo $this->get_field_name( 'hover_border_width' ) ?>"
		   id="<?php echo $this->get_field_id( 'hover_border_width' ) ?>" value="<?php echo $config->hover_border_width ?>"><br>
	<br>
	<label
		for="<?php echo $this->get_field_id( 'hover_border_color' ) ?>"><?php _e( 'Color (hex value): ', 'utcw' ) ?></label><br>
	<input type="color" name="<?php echo $this->get_field_name( 'hover_border_color' ) ?>"
		   id="<?php echo $this->get_field_id( 'hover_border_color' ) ?>" value="<?php echo $config->hover_border_color ?>"><br>
</fieldset>
<fieldset class="utcw hidden" id="<?php echo $this->get_field_id( 'utcw-tab-advanced' ) ?>">
	<legend></legend>
	<a class="utcw-help"
	   title="<?php _e( 'This will add a &lt;-- HTML comment --&gt; to the output with some debugging information, please use this information when troubleshooting. You can find the debugging information by using \'view source\' in your browser when viewing the page and searching for \'Ultimate Tag Cloud Debug information\'', 'utcw' )?>">?</a>
	<input type="checkbox" name="<?php echo $this->get_field_name( 'debug' ) ?>"
		   id="<?php echo $this->get_field_id( 'debug' ) ?>" <?php echo ( $config->debug === true ) ? 'checked="checked"' : '' ?>>
	<label for="<?php echo $this->get_field_id( 'debug' ) ?>"><?php _e( 'Include debug output', 'utcw' )?></label><br>
	<br>
	<a class="utcw-help"
	   title="<?php _e( 'This will save the current configuration which enables you to load this configuration at a later time. Check this box, choose a name in the text field below and press \'Save\' to save the configuration.', 'utcw' ) ?>">?</a>
	<input type="checkbox" name="<?php echo $this->get_field_name( 'save_config' ) ?>"
		   id="<?php echo $this->get_field_id( 'save_config' ) ?>">
	<label
		for="<?php echo $this->get_field_id( 'save_config' ) ?>"><?php _e( 'Save configuration', 'utcw' ) ?></label><br>
	<br>
	<a class="utcw-help"
	   title="<?php _e( 'This is the name which will be used for the current configuration if you check the option \'Save configuration\' above. If the name is omitted the current date and time will be used.', 'utcw' ) ?>">?</a>
	<label
		for="<?php echo $this->get_field_id( 'save_config_name' ) ?>"><?php _e( 'Configuration name', 'utcw' ) ?></label><br>
	<input type="text" name="<?php echo $this->get_field_name( 'save_config_name' ) ?>"
		   id="<?php echo $this->get_field_id( 'save_config_name' ) ?>"
		   value="<?php echo date( get_option( 'date_format' ) . ' ' . get_option( 'time_format' ) ) ?>"><br>
	<br>

	<?php if ( $configurations !== false && is_array( $configurations ) && count( $configurations ) > 0 ) : ?>

	<a class="utcw-help"
	   title="<?php _e( 'This will load the selected configuration to the state which the widget was when the configuration was saved.', 'utcw' ) ?>">?</a>
	<input type="checkbox" name="<?php echo $this->get_field_name( 'load_config' ) ?>"
		   id="<?php echo $this->get_field_id( 'load_config' ) ?>">
	<label for="<?php echo $this->get_field_id( 'load_config' ) ?>"><?php _e( 'Load configuration', 'utcw' ) ?></label>
	<br>
	<br>
	<label
		for="<?php echo $this->get_field_id( 'load_config_name' ) ?>"><?php _e( 'Configuration name', 'utcw' ) ?></label>
	<br>
	<select name="<?php echo $this->get_field_name( 'load_config_name' ) ?>"
			id="<?php echo $this->get_field_id( 'load_config_name' ) ?>">

		<?php foreach ( $configurations as $name => $config ) : ?>
		<option value="<?php echo $name ?>"><?php echo $name ?></option>
		<?php endforeach ?>

	</select>

	<?php endif ?>

</fieldset>