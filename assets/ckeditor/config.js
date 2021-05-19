/**
 * @license Copyright (c) 2003-2021, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';

	config.filebrowserBrowseUrl = 'http://localhost/e-renggar/assets/kcfinder/browse.php?opener=ckeditor&type=files';
    config.filebrowserImageBrowseUrl = 'http://localhost/e-renggar/assets/kcfinder/browse.php?opener=ckeditor&type=images';
    config.filebrowserFlashBrowseUrl = 'http://localhost/e-renggar/assets/kcfinder/browse.php?opener=ckeditor&type=flash';
    config.filebrowserUploadUrl = 'http://localhost/e-renggar/assets/kcfinder/upload.php?opener=ckeditor&type=files';
    config.filebrowserImageUploadUrl = 'http://localhost/e-renggar/assets/kcfinder/upload.php?opener=ckeditor&type=images';
    config.filebrowserFlashUploadUrl = 'http://localhost/e-renggar/assets/kcfinder/upload.php?opener=ckeditor&type=flash';
};


