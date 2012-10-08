<?php

/**
 * Configuration class for the widget.
 * @package utcw
 * @since   2.0
 */
class UTCW_Config {

	/**
	 * Title text of the widget.
	 * Default value: Tag cloud
	 *
	 * @var string
	 * @since 2.0
	 */
	public $title;

	/**
	 * How the result should be ordered
	 * Default value: name
	 * Valid values: random, name, slug, id, color, count
	 *
	 * @var string
	 * @since 2.0
	 */
	public $order;

	/**
	 * The smallest possible size
	 * @var int
	 * @since 2.0
	 */
	public $size_from;

	/**
	 * @var int
	 * @since 2.0
	 */
	public $size_to;

	/**
	 * @var int
	 * @since 2.0
	 */
	public $max;

	/**
	 * @var string
	 * @since 2.0
	 */
	public $taxonomy;

	/**
	 * @var bool
	 * @since 2.0
	 */
	public $reverse;

	/**
	 * @var string
	 * @since 2.0
	 */
	public $color;

	/**
	 * @var int
	 * @since 2.0
	 */
	public $letter_spacing;

	/**
	 * @var int
	 * @since 2.0
	 */
	public $word_spacing;

	/**
	 * @var string
	 * @since 2.0
	 */
	public $text_transform;

	/**
	 * @var bool
	 * @since 2.0
	 */
	public $case_sensitive;

	/**
	 * @var int
	 * @since 2.0
	 */
	public $minimum;

	/**
	 * @var string
	 * @since 2.0
	 */
	public $tags_list_type;

	/**
	 * @var bool
	 * @since 2.0
	 */
	public $show_title;

	/**
	 * @var string
	 * @since 2.0
	 */
	public $link_underline;

	/**
	 * @var string
	 * @since 2.0
	 */
	public $link_bold;

	/**
	 * @var string
	 * @since 2.0
	 */
	public $link_italic;

	/**
	 * @var string
	 * @since 2.0
	 */
	public $link_bg_color;

	/**
	 * @var string
	 * @since 2.0
	 */
	public $link_border_style;

	/**
	 * @var int
	 * @since 2.0
	 */
	public $link_border_width;

	/**
	 * @var string
	 * @since 2.0
	 */
	public $link_border_color;

	/**
	 * @var string
	 * @since 2.0
	 */
	public $hover_underline;

	/**
	 * @var string
	 * @since 2.0
	 */
	public $hover_bold;

	/**
	 * @var string
	 * @since 2.0
	 */
	public $hover_italic;

	/**
	 * @var string
	 * @since 2.0
	 */
	public $hover_bg_color;

	/**
	 * @var string
	 * @since 2.0
	 */
	public $hover_color;

	/**
	 * @var string
	 * @since 2.0
	 */
	public $hover_border_style;

	/**
	 * @var int
	 * @since 2.0
	 */
	public $hover_border_width;

	/**
	 * @var string
	 * @since 2.0
	 */
	public $hover_border_color;

	/**
	 * @var int
	 * @since 2.0
	 */
	public $tag_spacing;

	/**
	 * @var bool
	 * @since 2.0
	 */
	public $debug;

	/**
	 * @var int
	 * @since 2.0
	 */
	public $days_old;

	/**
	 * @var int
	 * @since 2.0
	 */
	public $line_height;

	/**
	 * @var string
	 * @since 2.0
	 */
	public $separator;

	/**
	 * @var string
	 * @since 2.0
	 */
	public $prefix;

	/**
	 * @var string
	 * @since 2.0
	 */
	public $suffix;

	/**
	 * @var bool
	 * @since 2.0
	 */
	public $show_title_text;

	/**
	 * @var array
	 * @since 2.0
	 */
	public $post_type;

	/**
	 * @var array
	 * @since 2.0
	 */
	public $tags_list;

	/**
	 * @var string
	 * @since 2.0
	 */
	public $color_span_to;

	/**
	 * @var string
	 * @since 2.0
	 */
	public $color_span_from;

	/**
	 * @var array
	 * @since 2.0
	 */
	public $authors;

	/**
	 * @var array
	 * @since 2.0
	 */
	public $color_set;

	/**
	 * @var bool
	 * @since 2.0
	 */
	public $authenticated;

	/**
	 * @var string
	 * @since 2.0
	 */
	public $before_widget;

	/**
	 * @var string
	 * @since 2.0
	 */
	public $after_widget;

	/**
	 * @var string
	 * @since 2.0
	 */
	public $before_title;

	/**
	 * @var string
	 * @since 2.0
	 */
	public $after_title;

	/**
	 * Config store with default values
	 * @var array
	 * @since 2.0
	 */
	static protected $options = array(
		'title'              => 'Tag Cloud',
		'order'              => 'name',
		'size_from'          => 10,
		'size_to'            => 30,
		'max'                => 45,
		'taxonomy'           => 'post_tag',
		'reverse'            => false,
		'color'              => 'none',
		'letter_spacing'     => 'normal',
		'word_spacing'       => 'normal',
		'text_transform'     => 'none',
		'case_sensitive'     => false,
		'minimum'            => 1,
		'tags_list_type'     => 'exclude',
		'show_title'         => true,
		'link_underline'     => 'default',
		'link_bold'          => 'default',
		'link_italic'        => 'default',
		'link_bg_color'      => 'transparent',
		'link_border_style'  => 'none',
		'link_border_width'  => 0,
		'link_border_color'  => 'none',
		'hover_underline'    => 'default',
		'hover_bold'         => 'default',
		'hover_italic'       => 'default',
		'hover_bg_color'     => 'transparent',
		'hover_color'        => 'default',
		'hover_border_style' => 'none',
		'hover_border_width' => 0,
		'hover_border_color' => 'none',
		'tag_spacing'        => 'auto',
		'debug'              => false,
		'days_old'           => 0,
		'line_height'        => 'inherit',
		'separator'          => ' ',
		'prefix'             => '',
		'suffix'             => '',
		'show_title_text'    => true,
		'post_type'          => array( 'post' ),
		'tags_list'          => array(),
		'color_span_to'      => '',
		'color_span_from'    => '',
		'authors'            => array(),
		'color_set'          => array(),
		'before_widget'      => '',
		'after_widget'       => '',
		'before_title'       => '',
		'after_title'        => '',
	);

	/**
	 * @var array
	 * @since 2.0
	 */
	protected $allowed_orders = array( 'random', 'name', 'slug', 'id', 'color', 'count' );

	/**
	 * @var array
	 * @since 2.0
	 */
	protected $allowed_taxonomies = array(); // Will be set dynamically at load

	/**
	 * @var array
	 * @since 2.0
	 */
	protected $allowed_post_types = array(); // Will be set dynamically at load

	/**
	 * @var array
	 * @since 2.0
	 */
	protected $allowed_colors = array( 'none', 'random', 'set', 'span' );

	/**
	 * @var array
	 * @since 2.0
	 */
	protected $allowed_text_transforms = array( 'lowercase', 'uppercase', 'capitalize' );

	/**
	 * @var array
	 * @since 2.0
	 */
	protected $allowed_tags_list_types = array( 'exclude', 'include' );

	/**
	 * @var array
	 * @since 2.0
	 */
	protected $allowed_optional_booleans = array( 'yes', 'no', 'default' );

	/**
	 * @var array
	 * @since 2.0
	 */
	protected $allowed_border_styles = array(
		'none', 'dotted', 'dashed', 'solid', 'double', 'groove', 'ridge', 'inset', 'outset',
	);

	/**
	 * Loads a configuration and parses the options
	 *
	 * @param array       $input
	 * @param UTCW_Plugin $utcw
	 *
	 * @since 2.0
	 */
	public function __construct( array $input, UTCW_Plugin $utcw ) {
		$this->allowed_post_types = $utcw->get_allowed_post_types();
		$this->allowed_taxonomies = $utcw->get_allowed_taxonomies();
		$this->authenticated      = $utcw->is_authenticated_user();

		foreach ( self::$options as $key => $default ) {
			$this->$key = $default;

			if ( isset( $input[ $key ] ) ) {
				$valid = true;

				switch ( $key ) {
					case 'order':
						$valid = in_array( $input[ $key ], $this->allowed_orders );
						break;

					case 'text_transform':
						$valid = in_array( $input[ $key ], $this->allowed_text_transforms );
						break;

					case 'tags_list_type':
						$valid = in_array( $input[ $key ], $this->allowed_tags_list_types );
						break;

					// Optional booleans, can be yes, no or default
					case 'link_underline':
					case 'link_bold':
					case 'link_italic':
					case 'hover_underline':
					case 'hover_bold':
					case 'hover_italic':
						$valid = in_array( $input[ $key ], $this->allowed_optional_booleans );
						break;

					case 'link_border_style':
					case 'hover_border_style':
						$valid = in_array( $input[ $key ], $this->allowed_border_styles );
						break;

					case 'color':
						$valid = in_array( $input[ $key ], $this->allowed_colors );
						break;

					// TODO: Allow more flexibility in color setting, like rgb/rgba/hsl/hsla and named colors
					case 'link_bg_color':
					case 'link_border_color':
					case 'hover_bg_color':
					case 'hover_color':
					case 'hover_border_color':
					case 'color_span_to':
					case 'color_span_from':
						$valid = preg_match( UTCW_HEX_COLOR_REGEX, $input[ $key ] ) > 0;
						break;

					case 'color_set':
						if ( ! is_array( $input[ $key ] ) ) {
							$input[ $key ] = explode( ',', $input[ $key ] );
						}

						$valid = $input[ $key ] && array_filter( $input[ $key ], create_function( '$item', 'return preg_match( UTCW_HEX_COLOR_REGEX, $item );' ) ) == $input[ $key ];
						break;

					case 'taxonomy':
						$valid = in_array( $input[ $key ], $this->allowed_taxonomies );
						break;

					case 'post_type':
						if ( ! is_array( $input[ $key ] ) ) {
							$input[ $key ] = explode( ',', $input[ $key ] );
						}

						$valid = $input[ $key ] && count( array_intersect( $this->allowed_post_types, $input[ $key ] ) ) == count( $input[ $key ] );
						break;

					case 'authors':
					case 'tags_list':
						if ( ! is_array( $input[ $key ] ) ) {
							$input[ $key ] = explode( ',', $input[ $key ] );
						}

						$valid = $this->is_array_numeric( $input[ $key ] );
						break;

					case 'size_from':
						$valid = isset( $input[ 'size_to' ] ) && $input[ 'size_from' ] <= $input[ 'size_to' ];
						break;

					case 'size_to':
						$valid = isset( $input[ 'size_from' ] ) && $input[ 'size_to' ] >= $input[ 'size_from' ];
						break;
				}

				if ( ! $valid ) {
					continue;
				}

				// Special handling of the color_set config attribute which needs to be expanded to full 6 digit hexadecimal values
				if ( $key == 'color_set' ) {
					foreach ( $input[ $key ] as $cs_key => $color ) {
						if ( strlen( $color ) == 4 ) {
							$red                      = substr( $color, 1, 1 );
							$green                    = substr( $color, 2, 1 );
							$blue                     = substr( $color, 3, 1 );
							$input[ $key ][ $cs_key ] = sprintf( '#%s%s%s%s%s%s', $red, $red, $green, $green, $blue, $blue );
						}
					}
					$this->$key = $input[ $key ];
				} // Special handling of some properties which have string defaults but integer values expected
				else if ( in_array( $key, array( 'letter_spacing', 'word_spacing', 'tag_spacing', 'line_height' ) ) ) {
					$this->$key = intval( $input[ $key ] );
				} else if ( is_string( self::$options[ $key ] ) && is_string( $input[ $key ] ) && strlen( $input[ $key ] ) > 0 ) {
					$this->$key = $input[ $key ];
				} else if ( is_integer( self::$options[ $key ] ) && $input[ $key ] > 0 ) {
					$this->$key = intval( $input[ $key ] );
				} else if ( is_bool( self::$options[ $key ] ) ) {
					$this->$key = ! ! $input[ $key ];
				} else if ( is_array( self::$options[ $key ] ) ) {
					$this->$key = is_array( $input[ $key ] ) ? $input[ $key ] : explode( ',', $input[ $key ] );
				}
			}
		}
	}

	/**
	 * Checks if every item in the array is numeric
	 *
	 * @param array $array
	 *
	 * @return bool
	 *
	 * @since 2.0
	 */
	private function is_array_numeric( array $array ) {
		foreach ( $array as $item ) {
			if ( ! is_numeric( $item ) ) {
				return false;
			}
		}

		return true;
	}

	/**
	 * Returns the WP_Widget instance
	 *
	 * @return array
	 *
	 * @since  2.0
	 */
	public function get_instance() {
		$instance = array();

		foreach ( array_keys( self::$options ) as $key ) {
			$instance[ $key ] = $this->$key;
		}

		return $instance;
	}

	/**
	 * Returns the default values for all the configuration options
	 * @return array
	 * @since 2.0
	 */
	public static function get_defaults() {
		return self::$options;
	}
}