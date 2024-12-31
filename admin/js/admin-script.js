( function($) {

	jQuery( document ).ready( function() {

		/**
		 * Function for image upload in admin
		 */
		function media_upload( button_class ) {

            var _custom_media = false,

            _orig_send_attachment = wp.media.editor.send.attachment;

            jQuery('body').on( 'click', button_class, function(e) {

            	var currentBtn = jQuery( this );

                var button_id ='#'+jQuery(this).attr('id');

                var self = jQuery(button_id);

                var send_attachment_bkp = wp.media.editor.send.attachment;

                var button = jQuery(button_id);

                var id = button.attr('id').replace('_button', '');

                _custom_media = true;

                wp.media.editor.send.attachment = function(props, attachment){

                    if ( _custom_media  ) {

                        currentBtn.parent( '.fb-image-uploader-container' ).find( '.fb-upload-image-url-holder' ).val(attachment.url).trigger('change');

                        currentBtn.parent( '.fb-image-uploader-container' ).find( '.fb-upload-image-holder' ).css( 'background-image', 'url('+attachment.url+')' );

                        currentBtn.parent( '.fb-image-uploader-container' ).find( '.fb-remove-btn' ).removeClass( 'fb-btn-hide' ).addClass( 'fb-btn-show' );

                        currentBtn.removeClass( 'fb-btn-show' ).addClass( 'fb-btn-hide' );

                    } else {

                        return _orig_send_attachment.apply( button_id, [props, attachment] );
                    }
                }

                wp.media.editor.open(button);

                return false;
            });
        }

        media_upload('.fb-upload-btn');

        jQuery( 'body' ).on( 'click', '.fb-remove-btn', function(e) {

            e.preventDefault();

            jQuery( this ).parent( '.fb-image-uploader-container' ).find( '.fb-upload-image-url-holder' ).val('').trigger('change');

            jQuery( this ).parent( '.fb-image-uploader-container' ).find( '.fb-upload-image-holder' ).css( 'background-image', 'url()' );

            jQuery( this ).parent( '.fb-image-uploader-container' ).find( '.fb-upload-btn' ).removeClass( 'fb-btn-hide' ).addClass( 'fb-btn-show' );

            jQuery( this ).removeClass( 'fb-btn-show' ).addClass( 'fb-btn-hide' );
        } );
	} );

} ) ( jQuery );