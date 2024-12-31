<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Fascinate
 */

if ( ! function_exists( 'fascinate_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function fascinate_posted_on( $display_meta ) {

		if( $display_meta == true && get_post_type() === 'post' ) {

			$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

			if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
				$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
			}

			$time_string = sprintf( $time_string,
				esc_attr( get_the_date( DATE_W3C ) ),
				esc_html( get_the_date() ),
				esc_attr( get_the_modified_date( DATE_W3C ) ),
				esc_html( get_the_modified_date() )
			);

			echo '<li class="posted-date"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a></li>'; // phpcs:ignore
		}
	}
endif;

if( ! function_exists( 'fascinate_posted_date' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function fascinate_posted_date( $display_meta ) {

		if( $display_meta == true && get_post_type() === 'post' ) {

			echo '<li class="posted-date"><span class="posted-date-month">' . esc_html( get_the_date( __( 'd M', 'fascinate' ) ) ) . '</span><span class="posted-year">' .esc_html( get_the_date( __( 'Y', 'fascinate' ) ) )  . '</span></li>';
		}
	}
endif;  

if ( ! function_exists( 'fascinate_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function fascinate_posted_by( $display_meta ) {

		if( $display_meta == true && get_post_type() === 'post' ) {

			$byline = sprintf(
				/* translators: %s: post author. */
				esc_html_x( 'by %s', 'post author', 'fascinate' ),
				'<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
			);

			echo '<li class="posted-by">' . $byline . '</li>'; // phpcs:ignore
		}
	}
endif;


if ( ! function_exists( 'fascinate_comments_no_meta' ) ) :
	/**
	 * Prints HTML with meta information for no of comments.
	 */
	function fascinate_comments_no_meta( $display_meta ) {

		if( $display_meta == true && get_post_type() === 'post' ) {

        	if( ( comments_open() || get_comments_number() ) ) {
        		?>
        		<li class="comment">
        			<a href="<?php the_permalink(); ?>">
        				<?php 
        				if( get_comments_number() <= 1 ) {
        					if( get_comments_number() == 0 ) {
        						echo esc_html__( 'Leave a comment', 'fascinate' );
        					} else {
		        				/* translators: %s: comments number. */
		        				printf( esc_html__( "%s comment", 'fascinate' ), absint( get_comments_number() ) ); 
		        			}
	        			} else {
	        				/* translators: %s: comments number. */
	        				printf( esc_html__( "%s comments", 'fascinate' ), absint( get_comments_number() ) ); 
	        			}
        				?>
        			</a>
        		</li>
	          	<?php
	        }
	    }
	}
endif;


if( ! function_exists( 'fascinate_categories_meta' ) ) :
	/*
	 * Prints HTML with meta information for post categories.
	 */
	function fascinate_categories_meta( $display_meta ) {

		if( $display_meta == true ) {

			// Hide category and tag text for pages.
			if ( 'post' === get_post_type() ) {

				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list();

				if ( $categories_list ) {
					echo '<div class="entry-cats">' . wp_kses_post( $categories_list ) . '</div>'; // phpcs:ignore
				}
			}
		}
	}
endif;


if( ! function_exists( 'fascinate_tags_meta' ) ) :
	/*
	 * Prints HTML with meta information for post categories.
	 */
	function fascinate_tags_meta( $display_meta ) {

		if( $display_meta == true  ) {

			// Hide category and tag text for pages.
			if ( 'post' === get_post_type() ) {

				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list();

				if ( $tags_list ) {
					echo '<div class="entry-tags"><div class="post-tags">' . wp_kses_post( $tags_list ) . '</div></div>'; // phpcs:ignore
				}
			}
		}
	}
endif;


if ( ! function_exists( 'fascinate_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function fascinate_post_thumbnail() {

		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) {

			$show_featured_image = fascinate_get_option( 'display_post_feat_img' );
			
			if( $show_featured_image == true ) {
				?>
				<div class="post-media-wrap">
				    <div class="post-media-entry standard">
				        <?php the_post_thumbnail( 'full', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); ?>
				    </div><!-- .post-media-entry -->
				</div><!-- .post-media-wrap -->
				<?php 
			}

		} else {

			$show_featured_image = true;

			if( is_home() ) {
				$show_featured_image = fascinate_get_option( 'blog_display_feat_img' );
			} 

			if( is_archive() ) {
				$show_featured_image = fascinate_get_option( 'archive_display_feat_img' );
			}


			if( is_search() ) {
				$show_featured_image = fascinate_get_option( 'search_display_feat_img' );
			}

			if( $show_featured_image == true ) {

				fascinate_large_thumbnail();
	        }
		}
	}
endif;


if( ! function_exists( 'fascinate_post_format_icon' ) ) {

	function fascinate_post_format_icon() {

		$post_format = get_post_format();

		$icon_class = '';
		$icon_container_class = '';

		switch ( $post_format ) {

			case 'gallery':
				
				$icon_class = 'ion-ios-images';
				$icon_container_class = 'is-gallery';
				break;

			case 'video':
				
				$icon_class = 'ion-ios-videocam';
				$icon_container_class = 'is-video';
				break;

			case 'audio':
				
				$icon_class = 'ion-ios-musical-note';
				$icon_container_class = 'is-audio';
				break;

			case 'quote':
				
				$icon_class = 'ion-ios-quote';
				$icon_container_class = 'is-quote';
				break;

			case 'link':
				
				$icon_class = 'ion-ios-link';
				$icon_container_class = 'is-link';
				break;
			
			default:
				
				$icon_class = '';
				$icon_container_class = '';
				break;
		}

		if( !empty( $icon_class ) && !empty( $icon_container_class ) ) {
			?>
			<div class="post-format-icon">
				<span class="<?php echo esc_attr( $icon_container_class ); ?>"><i class="<?php echo esc_attr( $icon_class ); ?>"></i></span>
			</div>
			<?php
		}
	}
}


if( ! function_exists( 'fascinate_large_thumbnail' ) ) {

	function fascinate_large_thumbnail() {

		$is_lazy_load_enabled = fascinate_get_option( 'enable_lazy_loading' );

		if( $is_lazy_load_enabled == true ) {

			$thumbnail_url = get_the_post_thumbnail_url( get_the_ID(), 'fascinate-thumbnail-one' );

			if( !empty( $thumbnail_url ) ) {
				?>
				<div class="post-thumb imghover <?php fascinate_thumbnail_class(); ?>">
					<a href="<?php the_permalink(); ?>" class="lazy-thumb lazyloading">
		                <img class="lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="<?php echo esc_url( $thumbnail_url ); ?>" data-srcset="<?php echo esc_url( $thumbnail_url ); ?>" alt="<?php fascinate_thumbnail_alt_text( get_the_ID() ); ?>">
		                <noscript>
		                    <img src="<?php echo esc_url( $thumbnail_url ); ?>" srcset="<?php echo esc_url( $thumbnail_url ); ?>" class="image-fallback" alt="<?php fascinate_thumbnail_alt_text( get_the_ID() ); ?>">
		                </noscript>
		            </a>
		            <?php fascinate_post_format_icon(); ?>
		        </div>
                <?php
            }	
		} else {
			?>
			<div class="post-thumb imghover <?php fascinate_thumbnail_class(); ?>">
		    	<a href="<?php the_permalink(); ?>">
		    		<?php the_post_thumbnail( 'fascinate-thumbnail-one', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); ?>
		    	</a>
		    	<?php fascinate_post_format_icon(); ?>
		    </div>
        	<?php			
		}
	}
}


if( ! function_exists( 'fascinate_small_thumbnail' ) ) {

	function fascinate_small_thumbnail() {

		if( ! has_post_thumbnail() ) {

			return;
		}

		$is_lazy_load_enabled = fascinate_get_option( 'enable_lazy_loading' );

		if( $is_lazy_load_enabled == true ) {

			$thumbnail_url = get_the_post_thumbnail_url( get_the_ID(), 'fascinate-thumbnail-two' );

			if( !empty( $thumbnail_url ) ) {
				?>
				<a href="<?php the_permalink(); ?>" class="lazy-thumb lazyloading">
	                <img class="lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="<?php echo esc_url( $thumbnail_url ); ?>" data-srcset="<?php echo esc_url( $thumbnail_url ); ?>" alt="<?php fascinate_thumbnail_alt_text( get_the_ID() ); ?>">
	                <noscript>
	                    <img src="<?php echo esc_url( $thumbnail_url ); ?>" srcset="<?php echo esc_url( $thumbnail_url ); ?>" class="image-fallback" alt="<?php fascinate_thumbnail_alt_text( get_the_ID() ); ?>">
	                </noscript>
	            </a>
                <?php
            }	
		} else {
			?>
        	<a href="<?php the_permalink(); ?>">
        		<?php the_post_thumbnail( 'fascinate-thumbnail-two', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); ?>
        	</a>
        	<?php			
		}
	}
}

if( ! function_exists( 'fascinate_post_format_content' ) ) {

	function fascinate_post_format_content() {

		$post_format = get_post_format();

		switch ( $post_format ) {

			case 'video' :

				fascinate_post_format_video_content();
				break;

			case 'audio' :

				fascinate_post_format_audio_content();
				break;

			case 'gallery' :

				fascinate_post_format_gallery_content();
				break;

			case 'quote' :

				fascinate_post_format_quote_content();
				break;

			default :

				fascinate_large_thumbnail();
				break;	
		}
	}
}


if( ! function_exists( 'fascinate_post_format_video_content' ) ) {

	function fascinate_post_format_video_content() {

		$post_content = apply_filters( 'the_content', get_the_content() );

        $video = '';

        // Only get video from the content if a playlist isn't present.
        if ( strpos( $post_content, 'wp-playlist-script' ) === false ) {

            $video = get_media_embedded_in_content( $post_content, array( 'video', 'object', 'embed', 'iframe' ) );
        }

        // If not a single post, highlight the audio file.
        if ( ! empty( $video ) ) {
	        ?>
	        <div class="mid-block is-post-format-block">
	            <div class="is-video-format">
	            	<?php echo $video[0]; // phpcs:ignore ?>
	            </div><!-- .is-audio-format -->
	        </div><!-- .mid-block.is-post-format-block -->
	        <?php
        } else {

        	fascinate_large_thumbnail();
        }
	}
}


if( ! function_exists( 'fascinate_post_format_audio_content' ) ) {

	function fascinate_post_format_audio_content() {

		$post_content = apply_filters( 'the_content', get_the_content() );

        $audio = false;

        // Only get audio from the content if a playlist isn't present.
        if ( false === strpos( $post_content, 'wp-playlist-script' ) ) {

            $audio = get_media_embedded_in_content( $post_content, array( 'audio', 'iframe' ) );
        }

        // If not a single post, highlight the audio file.
        if ( ! empty( $audio ) ) {
	        ?>
	        <div class="mid-block is-post-format-block">
	            <div class="is-audio-format">
	            	<?php echo $audio[0]; // phpcs:ignore ?>
	            </div><!-- .is-audio-format -->
	        </div><!-- .mid-block.is-post-format-block -->
	        <?php
        } else {

            fascinate_large_thumbnail();
        }
	}
}


if( ! function_exists( 'fascinate_post_format_gallery_content' ) ) {

	function fascinate_post_format_gallery_content() {

		global $post;
 
		if( function_exists( 'has_block' ) ) {

	        if ( has_block( 'gallery', $post->post_content ) ) {

	        	$gallery_images = array();

	            $post_blocks = parse_blocks( $post->post_content );

	            if( $post_blocks ) {

	                foreach( $post_blocks as $block ) {

	                    if( $block['blockName'] == 'core/gallery' ) {

	                        $gallery_images = $block['attrs']['ids'];

	                        break;
	                    }
	                }
	            }

	            if( is_array( $gallery_images ) && !empty( $gallery_images ) ) {
		            ?>
		            <div class="mid-block is-post-format-block">
		                <figure class="thumb owl-carousel is-gallery-format">
		                    <?php
		                    foreach( $gallery_images as $image ) {

		                        $image_src = wp_get_attachment_image_src( $image, 'fascinate-thumbnail-one' );

		                        if( $image_src ) {
		                            ?>
		                            <div class="item" style="background-image:url(<?php echo esc_url( $image_src[0] ); ?>);"></div>
		                            <?php
		                        }
		                    }
		                    ?>
		                </figure><!-- .thumb.owl-carousel.is-gallery-format -->
		            </div><!-- .mid-block.is-post-format-block -->
		            <?php
		        }
	        } else {

	            fascinate_large_thumbnail();
	        }
	    } else { 

	    	$gallery = get_post_gallery( $post_id, false );

			if( $gallery ) {

				$gallery_images = explode( ',', $gallery['ids'] );

				if( !empty( $gallery_images ) && is_array( $gallery_images ) ) {
					?>
					<div class="mid-block is-post-format-block">
		                <figure class="thumb owl-carousel is-gallery-format">
		                    <?php
		                    foreach( $gallery_images as $image ) {

		                        $image_src = wp_get_attachment_image_src( $image, 'fascinate-thumbnail-one' );

		                        if( $image_src ) {
		                            ?>
		                            <div class="item" style="background-image:url(<?php echo esc_url( $image_src[0] ); ?>);"></div>
		                            <?php
		                        }
		                    }
		                    ?>
		                </figure><!-- .thumb.owl-carousel.is-gallery-format -->
		            </div><!-- .mid-block.is-post-format-block -->
					<?php
				}				
			} else {

				fascinate_large_thumbnail();
			}
	    }
	}
}


if( ! function_exists( 'fascinate_post_format_quote_content' ) ) {

	function fascinate_post_format_quote_content() {

		global $post;

		if( function_exists( 'has_block' ) ) {

			if ( has_block( 'quote', $post->post_content ) ) {

	            $post_blocks = parse_blocks( $post->post_content );

	            if( $post_blocks ) {

	            	$quote_string = '';

	                foreach( $post_blocks as $block ) {

	                    if( $block['blockName'] == 'core/quote' ) {

	                        $quote_string = $block['innerHTML'];

	                        break;
	                    }
	                }

	                if( !empty( $quote_string ) ) {
			            ?>
			            <div class="mid-block is-post-format-block">
				            <div class="is-quote-format">
				                <?php echo wp_kses_post( $quote_string );  ?>
				            </div><!-- .is-quote-format -->
				        </div><!-- .mid-block.is-post-format-block -->
			            <?php
			        }
	            }
	        } else {

	            fascinate_large_thumbnail();
	        }
	    } else {

	    	/* Match any &lt;blockquote> elements. */
			preg_match( '/&lt;blockquote.*?>/', $post->post_content, $blockquotes );

			if( !empty( $blockquotes ) ) {

				echo wp_kses_post( $blockquotes[0] );
			} else {

				fascinate_large_thumbnail();
			}
	    }
	}
}