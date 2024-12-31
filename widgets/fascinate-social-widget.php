<?php
/**
 * Social Links Widget Class
 *
 * @package Fascinate
 */

if( ! class_exists( 'Fascinate_Social_Widget' ) ) {

    class Fascinate_Social_Widget extends WP_Widget {
 
        function __construct() { 

            parent::__construct(
                'fascinate-social-widget',  // Widget ID
                esc_html__( 'F: Social Widget', 'fascinate' ),   // Widget Name
                array(
                    'description' => esc_html__( 'Displays social links.', 'fascinate' ), 
                )
            );
     
        }
     
        public function widget( $args, $instance ) {

            $title          = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

            $facebook       = ! empty( $instance['facebook'] ) ? $instance['facebook'] : '';
            $twitter        = ! empty( $instance['twitter'] ) ? $instance['twitter'] : '';
            $instagram      = ! empty( $instance['instagram'] ) ? $instance['instagram'] : '';
            $linkedin       = ! empty( $instance['linkedin'] ) ? $instance['linkedin'] : '';
            $youtube        = ! empty( $instance['youtube'] ) ? $instance['youtube'] : '';
            $pinterest      = ! empty( $instance['pinterest'] ) ? $instance['pinterest'] : '';
            $vk             = ! empty( $instance['vk'] ) ? $instance['vk'] : '';
            ?>
            <div class="widget fb-social-widget-1">
                <?php
                if( !empty( $title ) ) :
                    ?>
                    <div class="widget_title">
                        <h3><?php echo esc_html( $title ); ?></h3>
                    </div><!-- .widget_title -->
                    <?php
                endif;
                ?>
                <div class="widget-container">
                    <div class="social-icons">
                        <ul class="social-icons-list">
                            <?php
                            if( !empty( $facebook ) ) :
                                ?>
                                <li>
                                    <a class="tool-tip" data-tippy-content="<?php esc_attr_e( 'Follow on facebook', 'fascinate' ); ?>" href="<?php echo esc_url( $facebook ); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                </li>
                                <?php
                            endif;

                            if( !empty( $twitter ) ) :
                                ?>
                                <li>
                                    <a class="tool-tip" data-tippy-content="<?php esc_attr_e( 'Follow on twitter', 'fascinate' ); ?>"  href="<?php echo esc_url( $twitter ); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                </li>
                                <?php
                            endif;

                            if( !empty( $instagram ) ) :
                                ?>
                                <li>
                                    <a class="tool-tip" data-tippy-content="<?php esc_attr_e( 'Follow on instagram', 'fascinate' ); ?>" href="<?php echo esc_url( $instagram ); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                </li>
                                <?php
                            endif;

                            if( !empty( $pinterest ) ) :
                                ?>
                                <li>
                                    <a class="tool-tip" data-tippy-content="<?php esc_attr_e( 'Follow on pinterest', 'fascinate' ); ?>" href="<?php echo esc_url( $pinterest ); ?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                </li>
                                <?php
                            endif;

                            if( !empty( $youtube ) ) :
                                ?>
                                <li>
                                    <a class="tool-tip" data-tippy-content="<?php esc_attr_e( 'Subscribe at youtube', 'fascinate' ); ?>" href="<?php echo esc_url( $youtube ); ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                                </li>
                                <?php
                            endif;

                            if( !empty( $linkedin ) ) :
                                ?>
                                <li>
                                    <a class="tool-tip" data-tippy-content="<?php esc_attr_e( 'Connect on linkedin', 'fascinate' ); ?>" href="<?php echo esc_url( $linkedin ); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                </li>
                                <?php
                            endif;

                            if( !empty( $vk ) ) :
                                ?>
                                <li>
                                    <a class="tool-tip" data-tippy-content="<?php esc_attr_e( 'Follow on vk', 'fascinate' ); ?>" href="<?php echo esc_url( $vk ); ?>"><i class="fa fa-vk" aria-hidden="true"></i></a>
                                </li>
                                <?php
                            endif;
                            ?>
                        </ul><!-- .social-icons-list -->
                    </div><!-- .social-icons -->
                </div><!-- .widget-container -->
            </div><!-- . widget.fb-social-widget-1 -->
            <?php 
        }
     
        public function form( $instance ) {
            $instance = wp_parse_args( (array) $instance, 
                array(
                    'title'         => '',
                    'facebook'      => '',
                    'twitter'       => '',
                    'instagram'     => '',
                    'pinterest'     => '',
                    'youtube'       => '',
                    'linkedin'      => '',
                    'vk'            => '',
                ) 
            );
            ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
                    <strong><?php esc_html_e( 'Title ', 'fascinate' ); ?></strong>
                </label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>">
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>">
                    <strong><?php esc_html_e( 'Facebook Link', 'fascinate' ); ?></strong>
                </label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook' ) ); ?>" value="<?php echo esc_attr( $instance['facebook'] ); ?>">
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>">
                    <strong><?php esc_html_e( 'Twitter Link', 'fascinate' ); ?></strong>
                </label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter' ) ); ?>" value="<?php echo esc_attr( $instance['twitter'] ); ?>">
            </p> 

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>">
                    <strong><?php esc_html_e( 'Instagram Link', 'fascinate' ); ?></strong>
                </label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'instagram' ) ); ?>" value="<?php echo esc_attr( $instance['instagram'] ); ?>">
            </p> 

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>">
                    <strong><?php esc_html_e( 'Pinterest Link', 'fascinate' ); ?></strong>
                </label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'pinterest' ) ); ?>" value="<?php echo esc_attr( $instance['pinterest'] ); ?>">
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>">
                    <strong><?php esc_html_e( 'Youtube Link', 'fascinate' ); ?></strong>
                </label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'youtube' ) ); ?>" value="<?php echo esc_attr( $instance['youtube'] ); ?>">
            </p>           

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>">
                    <strong><?php esc_html_e( 'linkedin Link', 'fascinate' ); ?></strong>
                </label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'linkedin' ) ); ?>" value="<?php echo esc_attr( $instance['linkedin'] ); ?>">
            </p> 

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'vk' ) ); ?>">
                    <strong><?php esc_html_e( 'VK Link', 'fascinate' ); ?></strong>
                </label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'vk' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'vk' ) ); ?>" value="<?php echo esc_attr( $instance['vk'] ); ?>">
            </p>
            <?php
        }
     
        public function update( $new_instance, $old_instance ) {
     
            $instance = $old_instance;

            $instance[ 'title' ]        = sanitize_text_field( $new_instance[ 'title' ] );

            $instance[ 'facebook' ]     = esc_url_raw( $new_instance[ 'facebook' ] );

            $instance[ 'twitter' ]      = esc_url_raw( $new_instance[ 'twitter' ] );

            $instance[ 'instagram' ]    = esc_url_raw( $new_instance[ 'instagram' ] );

            $instance[ 'linkedin' ]     = esc_url_raw( $new_instance[ 'linkedin' ] );

            $instance[ 'youtube' ]      = esc_url_raw( $new_instance[ 'youtube' ] );

            $instance[ 'pinterest' ]    = esc_url_raw( $new_instance[ 'pinterest' ] );

            $instance[ 'vk' ]           = esc_url_raw( $new_instance[ 'vk' ] );

            return $instance;
        } 
    }
}