jQuery(document).ready(function() {

	jQuery( "#sortable" ).sortable();
	
	jQuery( "#sortable" ).disableSelection();
	

	
	jQuery('.wp-full-overlay-sidebar-content').prepend('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="http://forum.insertcart.com" class="button" target="_blank">{support}</a>'.replace('{support}',scatmanjhon.support));
	
	jQuery('.wp-full-overlay-sidebar-content').prepend('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="http://www.insertcart.com/ishop-theme-documentation-and-setup-guide/" class="button" target="_blank">{documentation}</a>'.replace('{documentation}',scatmanjhon.documentation));
	
	jQuery('.wp-full-overlay-sidebar-content').prepend('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="http://www.insertcart.com/product/ishop-wordpress-theme/" class="button" target="_blank">{pro}</a>'.replace('{pro}',scatmanjhon.pro));
	
	jQuery( '.ui-state-default' ).on( 'mousedown', function() {

		jQuery( '#customize-header-actions #save' ).trigger( 'click' );

	});
	
});
