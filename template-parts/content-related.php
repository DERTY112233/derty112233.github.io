<?php
/**
 * Template part for displaying author detail
 *
 * @package Fascinate
 */

$display_related_section = fascinate_get_option( 'display_related_section' );

if( $display_related_section == true ) :

    $related_query = fascinate_related_posts_query();

    if( $related_query->have_posts() ) :

        $related_section_title = fascinate_get_option( 'related_section_title' );

        $display_author_meta = fascinate_get_option( 'display_related_author_meta' );

        ?>
        <div class="related-posts">
            <div class="related-inner">
                <?php
                if( !empty( $related_section_title ) ) :
                    ?>
                    <div class="title">
                        <h3><?php echo esc_html( $related_section_title ); ?></h3>
                    </div><!-- .title -->
                    <?php
                endif;
                ?>
                <div class="related-entry">
                    <div class="row">
                        <?php
                        while( $related_query->have_posts() ) :

                            $related_query->the_post();
                            ?>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="box">
                                    <?php
                                    if( has_post_thumbnail() ) :
                                        $thumbnail_url = get_the_post_thumbnail_url( get_the_ID(), 'fascinate-thumbnail-two' );
                                        ?>
                                        <div class="left-box">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php
                                                $enable_lazy_loading = fascinate_get_option( 'enable_lazy_loading' );
                    
                                                if( $enable_lazy_loading == true ) {
                                                    ?>  
                                                    <div class="post-thumb lazyload lazyloading" data-bg="<?php echo esc_url( $thumbnail_url ); ?>"></div>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <div class="post-thumb" style="background-image: url( <?php echo esc_url( $thumbnail_url ); ?> );"></div>
                                                    <?php
                                                }
                                                ?>
                                            </a>
                                        </div><!-- .left-box -->
                                        <?php
                                    endif;
                                    ?>
                                    <div class="right-box">
                                        <div class="post-title">
                                            <h4>
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h4>
                                        </div><!-- .post-title -->
                                        <div class="entry-metas">
                                            <ul>
                                                <?php fascinate_posted_by( $display_author_meta ); ?>
                                            </ul>
                                        </div><!-- .entry-metas -->
                                    </div><!-- .right-box -->
                                </div><!-- .box -->
                            </div><!-- .col -->
                            <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div><!-- .row -->
                </div><!-- .related-entry -->
            </div><!-- .related-inner -->
        </div><!-- .related-posts -->
        <?php
    endif;
endif;