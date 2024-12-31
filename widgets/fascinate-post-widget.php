<?php
/**
 * Post Widget Class
 *
 * @package Fascinate
 */

if( ! class_exists( 'Fascinate_Post_Widget' ) ) :

    class Fascinate_Post_Widget extends WP_Widget {
 
        function __construct() { 

            parent::__construct(
                'fascinate-post-widget',  // Widget ID
                esc_html__( 'F: Posts Widget', 'fascinate' ),   // Widget Name
                array(
                    'description' => esc_html__( 'Displays Posts.', 'fascinate' ), 
                )
            );
     
        }
     
        public function widget( $args, $instance ) {

            $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

            $posts_no = !empty( $instance['post_no'] ) ? $instance['post_no'] : 5;

            $layout = !empty( $instance[ 'layout' ] ) ? $instance[ 'layout' ] : 'layout_one';

            $display_date = !empty( $instance['display_date'] ) ? $instance['display_date'] : false;

            $dispaly_comments_no = !empty( $instance['dispaly_comments_no'] ) ? $instance['dispaly_comments_no'] : false;

            $post_args = array(
                'post_type' => 'post',
                'ignore_sticky_posts' => true,
            );

            if( absint( $posts_no ) > 0 ) {
                $post_args['posts_per_page'] = absint( $posts_no );
            }

            $post_query = new WP_Query( $post_args );

            if( $post_query->have_posts() ) {

                if( $layout == 'layout_one' ) {
                    ?>
                    <div class="widget fb-post-widget fb-recent-posts">
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
                            <?php
                            while( $post_query->have_posts() ) :
                                $post_query->the_post();
                                ?>
                                <article class="post">
                                    <div class="fb-row">
                                        <?php
                                        if( has_post_thumbnail() ) :
                                            ?>
                                            <div class="fb-col">
                                                <div class="post-thumb imghover">
                                                    <?php fascinate_small_thumbnail(); ?>
                                                </div><!-- .post-thumb.imghover -->
                                            </div><!-- fb-col -->
                                            <?php
                                        endif;
                                        ?>
                                        
                                        <div class="fb-col">
                                            <div class="content-holder">
                                                <div class="the-title">
                                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                </div><!-- .the-title -->
                                                <div class="entry-metas">
                                                    <ul>
                                                        <?php fascinate_posted_on( $display_date ); ?>
                                                        <?php fascinate_comments_no_meta( $dispaly_comments_no ); ?>
                                                    </ul>
                                                </div><!-- .entry-metas -->
                                            </div><!-- .content-holder -->
                                        </div><!-- .fb-col -->
                                    </div><!-- .fb-row -->
                                </article><!-- .post -->
                                <?php
                            endwhile;
                            wp_reset_postdata();
                            ?>
                        </div><!-- .widget-container -->
                    </div><!-- .widget.fb-post-widget.fb-recent-posts -->
                    <?php
                } else {
                    ?>
                    <div class="widget fb-post-widget fb-popular-posts">
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
                            <?php
                            $i = 1;
                            while( $post_query->have_posts() ) :
                                $post_query->the_post();
                                ?>
                                <article class="post">
                                    <div class="fb-row">
                                        <?php
                                        if( has_post_thumbnail() ) :
                                            ?>
                                            <div class="fb-col">
                                                <div class="post-thumb imghover">
                                                    <span class="count"><?php echo esc_html( $i ); ?></span>
                                                    <?php fascinate_small_thumbnail(); ?>
                                                </div><!-- .post-thumb.imghover -->
                                            </div><!-- fb-col -->
                                            <?php
                                        endif;
                                        ?>
                                        <div class="fb-col">
                                            <div class="content-holder">
                                                <div class="the-title">
                                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                </div><!-- .the-title -->
                                                <div class="entry-metas">
                                                    <ul>
                                                        <?php fascinate_posted_on( $display_date ); ?>
                                                        <?php fascinate_comments_no_meta( $dispaly_comments_no ); ?>
                                                    </ul>
                                                </div><!-- .entry-metas -->
                                            </div><!-- .content-holder -->
                                        </div><!-- .fb-col -->
                                    </div><!-- .fb-row -->
                                </article><!-- .post -->
                                <?php
                                $i++;
                            endwhile;
                            wp_reset_postdata();
                            ?>
                        </div><!-- .widget-container -->
                    </div><!-- .widget.fb-post-widget.fb-popular-posts -->
                    <?php
                }           
            }
        }
     
        public function form( $instance ) {
            $defaults = array(
                'title'       => '',
                'post_no'     => 5,
                'display_date' => false,
                'dispaly_comments_no' => false,
                'layout' => 'layout_one',
            );

            $instance = wp_parse_args( (array) $instance, $defaults );

            ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('layout') ); ?>">
                    <strong><?php esc_html_e('Chooose Layout', 'fascinate'); ?></strong>
                </label>
                <select class="widefat" id="<?php echo esc_attr( $this->get_field_id('layout') ); ?>" name="<?php echo esc_attr( $this->get_field_name('layout') ); ?>">
                    <?php
                    $layout_choices = array(
                        'layout_one' => esc_html__( 'Layout One', 'fascinate' ),
                        'layout_two' => esc_html__( 'Layout Two', 'fascinate' ),
                    );

                    foreach( $layout_choices as $key => $layout ) {
                        ?>
                        <option value="<?php echo esc_attr( $key ); ?>" <?php if( $instance['layout'] == $key ) { ?>selected<?php } ?>><?php echo esc_html( $layout ); ?></option>
                        <?php
                    }
                    ?>
                </select>
            </p> 

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>">
                    <strong><?php esc_html_e('Title', 'fascinate'); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />   
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('post_no') ); ?>">
                    <strong><?php esc_html_e('No of Posts', 'fascinate'); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('post_no') ); ?>" name="<?php echo esc_attr( $this->get_field_name('post_no') ); ?>" type="number" value="<?php echo esc_attr( $instance['post_no'] ); ?>" />   
            </p>

            <p>
                <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id('display_date') ); ?>" name="<?php echo esc_attr( $this->get_field_name('display_date') ); ?>" <?php if( $instance['display_date'] == true ) { ?>checked<?php } ?> >
                <label for="<?php echo esc_attr( $this->get_field_name('display_date') ); ?>">
                    <strong><?php esc_html_e('Display Date', 'fascinate'); ?></strong>
                </label>
            </p>

            <p>
                <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id('dispaly_comments_no') ); ?>" name="<?php echo esc_attr( $this->get_field_name('dispaly_comments_no') ); ?>" <?php if( $instance['dispaly_comments_no'] == true ) {?>checked<?php } ?> >
                <label for="<?php echo esc_attr( $this->get_field_name('dispaly_comments_no') ); ?>">
                    <strong><?php esc_html_e('Display Comments No', 'fascinate'); ?></strong>
                </label>
            </p>            
            <?php
        }
     
        public function update( $new_instance, $old_instance ) {
     
            $instance = $old_instance;

            $instance['title']      = sanitize_text_field( $new_instance['title'] );

            $instance['post_no']    = absint( $new_instance['post_no'] );

            $instance['display_date']    = wp_validate_boolean( $new_instance['display_date'] );
            
            $instance['dispaly_comments_no']    = wp_validate_boolean( $new_instance['dispaly_comments_no'] );

            $instance['layout']    = sanitize_text_field( $new_instance['layout'] );

            return $instance;
        } 
    }
endif;