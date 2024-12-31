<?php
/**
 * Class for creating custom meta fields for page and post.
 *
 * @package Fascinate
 */

if( ! class_exists( 'Fascinate_Custom_Fields' ) ) :

	class Fascinate_Custom_Fields {

		public function __construct() {

			// Register post meta fields and save meta fields values.
			add_action( 'admin_init', array( $this, 'register_post_meta' ) );
			add_action( 'save_post', array( $this, 'save_sidebar_position_meta' ) );
			add_action( 'save_post', array( $this, 'save_single_layout_meta' ) );
		}

		/**
		 * Register post custom meta fields.
		 *
		 * @since    1.0.0
		 */
		public function register_post_meta() {   

		    add_meta_box( 'sidebar_position_metabox', esc_html__( 'Sidebar Position', 'fascinate' ), array( $this, 'sidebar_position_meta' ), array( 'post', 'page' ), 'side', 'default' );

		    add_meta_box( 'single_layout_metabox', esc_html__( 'Layout', 'fascinate' ), array( $this, 'single_layout_meta' ), array( 'post', 'page' ), 'side', 'default' );
		}

		/**
		 * Custom Sidebar Post Meta.
		 *
		 * @since    1.0.0
		 */
		public function sidebar_position_meta() {

			global $post;

			$sidebar_position_key = 'fascinate_sidebar_position';

			$sidebar_position = get_post_meta( $post->ID, $sidebar_position_key, true );

			if( empty( $sidebar_position ) ) {
				$sidebar_position = 'right';
			}

		    wp_nonce_field( 'sidebar_position_meta_nonce', 'sidebar_position_meta_nonce_id' );

		    $choices = array(
		        'right' => esc_html__( 'Right', 'fascinate' ),
		        'left' => esc_html__( 'Left', 'fascinate' ),
		        'none' => esc_html__( 'Fullwidth', 'fascinate' ),
		    );

		    ?>

		    <table width="100%" border="0" class="options" cellspacing="5" cellpadding="5">
		        <tr>
		        	<td>
			        	<select class="widefat" name="sidebar_position" id="sidebar_position">
			        		<?php
			        		foreach( $choices as $key => $choice ) {
			        			?>
			        			<option value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $sidebar_position ) { ?>selected<?php } ?>><?php echo esc_html( $choice ); ?></option>
			        			<?php
			        		}
			        		?>
			        	</select>
		        	</td>
		        </tr> 
		    </table>   
		    <?php   
		}

		/**
		 * Save Custom Sidebar Position Post Meta.
		 *
		 * @since    1.0.0
		 */
		public function save_sidebar_position_meta() {

		    global $post;  

		    // Bail if we're doing an auto save
		    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		        return;
		    }
		    
		    // if our nonce isn't there, or we can't verify it, bail
		    if( !isset( $_POST['sidebar_position_meta_nonce_id'] ) || !wp_verify_nonce( sanitize_key( $_POST['sidebar_position_meta_nonce_id'] ), 'sidebar_position_meta_nonce' ) ) {
		        return;
		    }
		    
		    // if our current user can't edit this post, bail
		    if ( ! current_user_can( 'edit_post', $post->ID ) ) {
		        return;
		    } 

		    if( isset( $_POST['sidebar_position'] ) ) {

				update_post_meta( $post->ID, 'fascinate_sidebar_position', sanitize_text_field( wp_unslash( $_POST['sidebar_position'] ) ) ); 
			}
		}

		/**
		 * Custom Single Layout Post Meta.
		 *
		 * @since    1.0.0
		 */
		public function single_layout_meta() {

			global $post;

			$single_layout_key = 'fascinate_single_layout';

			$single_layout = get_post_meta( $post->ID, $single_layout_key, true );

			if( empty( $single_layout ) ) {
				$single_layout = 'layout_one';
			}

		    wp_nonce_field( 'single_layout_meta_nonce', 'single_layout_meta_nonce_id' );

		    $choices = array(
		        'layout_one' => esc_html__( 'Layout One', 'fascinate' ),
		        'layout_two' => esc_html__( 'Layout Two', 'fascinate' ),
		    );

		    ?>

		    <table width="100%" border="0" class="options" cellspacing="5" cellpadding="5">
		        <tr>
		        	<td>
			        	<select class="widefat" name="single_layout" id="single_layout">
			        		<?php
			        		foreach( $choices as $key => $choice ) {
			        			?>
			        			<option value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $single_layout ) { ?>selected<?php } ?>><?php echo esc_html( $choice ); ?></option>
			        			<?php
			        		}
			        		?>
			        	</select>
		        	</td>
		        </tr> 
		    </table>   
		    <?php   
		}

		/**
		 * Save Custom Single Layout Post Meta.
		 *
		 * @since    1.0.0
		 */
		public function save_single_layout_meta() {

		    global $post;  

		    // Bail if we're doing an auto save
		    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		        return;
		    }
		    
		    // if our nonce isn't there, or we can't verify it, bail
		    if( !isset( $_POST['single_layout_meta_nonce_id'] ) || !wp_verify_nonce( sanitize_key( $_POST['single_layout_meta_nonce_id'] ), 'single_layout_meta_nonce' ) ) {
		        return;
		    }
		    
		    // if our current user can't edit this post, bail
		    if ( ! current_user_can( 'edit_post', $post->ID ) ) {
		        return;
		    } 

		    if( isset( $_POST['single_layout'] ) ) {

				update_post_meta( $post->ID, 'fascinate_single_layout', sanitize_text_field( wp_unslash( $_POST['single_layout'] ) ) ); 
			}
		}
	}
endif;

$fascinate_custom_fields = new Fascinate_Custom_Fields();