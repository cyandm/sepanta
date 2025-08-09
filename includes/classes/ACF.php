<?php
/**
 * ACF Class
 * @package Cyan\Theme\Classes
 */

namespace Cyan\Theme\Classes;

use Cyan\Theme\Helpers\Validators;
use Cyan\Theme\Helpers\ACF\AcfGroup;


class ACF {

	public static function init() {
		$isDev = ENVIRONMENT === 'development';
		$isDev ? null : add_filter( 'acf/settings/show_admin', '__return_false', 100 );

		if ( ! function_exists( 'acf_add_local_field_group' ) ) {
			return;
		}


		add_action( 'acf/include_fields', [ __CLASS__, 'registerAllACF' ] );

	}

	/**
	 * Register all ACF fields for the individual post types, taxonomies, page templates, and menu items
	 * @return void
	 */
	public static function registerAllACF() {
		//PostTypes
		self::forPosts();
		self::forEngineers();

		//Taxonomies
		self::forCategory();


		//Page Templates
		self::forContactUs();
		self::forAbout();

		//Menu Items

	}

	private static function forPosts() {

		//define helper
		$acfGroup = new AcfGroup();

		//add fields
		$acfGroup->basicFields->addText( 'title', 'Title', [ 
			'default_value' => 'Default Title',
			'aria-label' => 'Title',
			'width' => '50%',
			'required' => true
		] );

		//location
		$acfGroup->setLocation( 'post_type', '==', Validators::PostType( 'post' ) );

		// register group
		$acfGroup->register( 'Post' );
	}

	private static function forEngineers()
	{

		//define helper
		$acfGroup = new AcfGroup();

		//add fields
		$acfGroup->basicFields->addText('engineer_position', 'سمت', ['width' => '100%']);
		$acfGroup->contentFields->addFile('engineer_video', 'ویدیو', ['width' => '100%']);

		//location
		$acfGroup->setLocation('post_type', '==', 'engineer');

		// register group
		$acfGroup->register('Engineer');
	}

	private static function forContactUs() {
		//define helper
		$acfGroup = new AcfGroup();
		//add fields
            $acfGroup->basicFields->addTextarea('under_title' , 'متن زیر عنوان' , [
           'width' => '15%',
		]);
		$acfGroup->contentFields->addImage('contact_img' , 'عکس' , [
		]);
		
	
	  
        
		//location
		$acfGroup->setLocation('page_template', '==', 'templates/contact-us.php');

		// register group
		$acfGroup->register('Contact-Us');
	}

	private static function forAbout() {
		//define helper
		$acfGroup = new AcfGroup();
		//add fields
		$acfGroup->basicFields->addTextarea('text_under_video_one' , 'متن زیر ویدیو' , [
			'width' => '40%',
		]);
		$acfGroup->basicFields->addTextarea('text_under_video_two', 'متن زیر ویدیو دوم', [
			'width' => '60%',
		]);
		$acfGroup->contentFields->addImage('about_img_one' , ' عکس 1 ' , [
			'width' => '50%',
		]);
		$acfGroup->contentFields->addImage('about_img_two' , ' عکس 2 	' , [
			'width' => '50%',
		]);
		$acfGroup->basicFields->addTextarea('under_photo_12' , 'متن زیر عکس' , [
			'width' => '70%',
		]);
		$acfGroup->layoutFields->addTab('video', 'ویدیو');
		$acfGroup->basicFields->addText('video_title', 'عنوان ویدیو', ['width' => '100%']);
		$acfGroup->contentFields->addFile('video_file', 'فایل ویدیو', ['width' => '100%']);
		$acfGroup->contentFields->addImage('video_cover', 'عکس پوشش ویدیو', ['width' => '100%']);
		

		//location
		$acfGroup->setLocation('page_template', '==', 'templates/about.php');

		// register group
		$acfGroup->register('About');
	}

	//Taxonomies
	private static function forCategory()
	{
		//define helper
		$acfGroup = new AcfGroup();

		//add fields
		$acfGroup->contentFields->addImage('category_image', 'عکس دسته بندی');

		//location
		$acfGroup->setLocation('taxonomy', '==', 'category');

		// register group
		$acfGroup->register('thumnail');

	}
}