/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	config.uiColor = '#FFF';
	
	config.height = 700;
	
	config.toolbarCanCollapse = true;
	
	config.filebrowserBrowseUrl = 'http://[tên miền của bạn]/ckfinder/ckfinder.html';
 
	config.filebrowserImageBrowseUrl = '/ckfinder/ckfinder.html?type=Images';
	 
	config.filebrowserFlashBrowseUrl = '/ckfinder/ckfinder.html?type=Flash';
	 
	config.filebrowserUploadUrl = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	 
	config.filebrowserImageUploadUrl = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	 
	config.filebrowserFlashUploadUrl = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';

};
