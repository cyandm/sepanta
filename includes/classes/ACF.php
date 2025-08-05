<?php

/**
 * ACF Class
 * @package Cyan\Theme\Classes
 */

namespace Cyan\Theme\Classes;

use Cyan\Theme\Helpers\Validators;
use Cyan\Theme\Helpers\ACF\AcfGroup;


class ACF
{

	public static function init()
	{
		$isDev = ENVIRONMENT === 'development';
		$isDev ? null : add_filter('acf/settings/show_admin', '__return_false', 100);

		if (! function_exists('acf_add_local_field_group')) {
			return;
		}


		add_action('acf/include_fields', [__CLASS__, 'registerAllACF']);
	}

	/**
	 * Register all ACF fields for the individual post types, taxonomies, page templates, and menu items
	 * @return void
	 */
	public static function registerAllACF()
	{
		//PostTypes
		self::forPosts();
		self::forProjects();
		self::forEngineers();

		//Taxonomies

		//Page Templates
		self::forContactUs();
		self::forAbout();
		self::forHome();

		//Menu Items

	}


	//PostTypes
	private static function forPosts()
	{

		//define helper
		$acfGroup = new AcfGroup();

		//add fields
		$acfGroup->basicFields->addText('title', 'Title', [
			'default_value' => 'Default Title',
			'aria-label' => 'Title',
			'width' => '50%',
			'required' => true
		]);

		//location
		$acfGroup->setLocation('post_type', '==', Validators::PostType('post'));

		// register group
		$acfGroup->register('Post');
	}

	private static function forProjects()
	{
		//define helper
		$acfGroup = new AcfGroup();

		//add fields
		$acfGroup->layoutFields->addTab('project_gallery', 'گالری پروژه');

		$acfGroup->contentFields->addImage('project_thumbnail', 'عکس جلوه (هاور)', ['width' => '100%']);

		for ($i = 1; $i <= 10; $i++) {
			$acfGroup->contentFields->addImage('project_gallery_' . $i, 'عکس ' . $i, ['width' => '50%']);
		}

		$acfGroup->layoutFields->addTab('project_info', 'اطلاعات پروژه');

		$acfGroup->basicFields->addText('project_name', 'نام سازه', ['width' => '25%']);

		$acfGroup->basicFields->addText('project_location', 'موقعیت مکانی', ['width' => '25%']);

		$acfGroup->basicFields->addText('project_floor', 'تعداد طبقات', ['width' => '25%']);

		$acfGroup->basicFields->addText('project_under_area', 'زیر بنای کل پروژه', ['width' => '25%']);

		$acfGroup->basicFields->addText('project_type', 'نوع سازه', ['width' => '25%']);

		$acfGroup->basicFields->addText('project_faced', 'نوع نما', ['width' => '25%']);

		$acfGroup->basicFields->addText('project_area', 'متراژ واحد ها', ['width' => '25%']);

		$acfGroup->basicFields->addText('project_facilities', 'سیستم تأسیسات', ['width' => '25%']);

		$acfGroup->basicFields->addText('project_security', 'سیستم ایمنی', ['width' => '25%']);

		//location
		$acfGroup->setLocation('post_type', '==', 'project');

		// register group
		$acfGroup->register('اطلاعات');
	}

	private static function forEngineers()
	{

		//define helper
		$acfGroup = new AcfGroup();

		//add fields
		$acfGroup->basicFields->addText('engineer_position', 'جایگاه', ['width' => '100%']);
		$acfGroup->basicFields->addText('engineer_video', 'ویدیو', ['width' => '100%']);

		//location
		$acfGroup->setLocation('post_type', '==', 'engineer');

		// register group
		$acfGroup->register('Engineer');
	}



	//Page Templates
	private static function forContactUs()
	{
		//define helper
		$acfGroup = new AcfGroup();
		//add fields
		$acfGroup->basicFields->addTextarea('under_title', 'متن زیر عنوان', [
			'width' => '15%',
		]);
		$acfGroup->contentFields->addImage('contact_img', 'عکس', []);




		//location
		$acfGroup->setLocation('page_template', '==', 'templates/contact-us.php');

		// register group
		$acfGroup->register('Contact-Us');
	}

	private static function forAbout()
	{
		//define helper
		$acfGroup = new AcfGroup();
		//add fields
		$acfGroup->basicFields->addTextarea('text_under_video_one', 'متن زیر ویدیو', [
			'width' => '40%',
		]);
		$acfGroup->basicFields->addTextarea('text_under_video_two', 'متن زیر ویدیو دوم', [
			'width' => '60%',
		]);
		$acfGroup->contentFields->addImage('about_img_one', ' عکس 1 ', [
			'width' => '50%',
		]);
		$acfGroup->contentFields->addImage('about_img_two', ' عکس 2 	', [
			'width' => '50%',
		]);
		$acfGroup->basicFields->addTextarea('under_photo_12', 'متن زیر عکس', [
			'width' => '70%',
		]);


		//location
		$acfGroup->setLocation('page_template', '==', 'templates/about.php');

		// register group
		$acfGroup->register('About');
	}

	private static function forHome()
	{
		//define helper
		$acfGroup = new AcfGroup();

		//add fields
		$acfGroup->layoutFields->addTab('hero', 'هیرو');

		for ($i = 1; $i <= 2; $i++) {
			$acfGroup->contentFields->addImage('hero_img_' . $i, 'عکس ' . $i, ['width' => '100%']);
			$acfGroup->basicFields->addText('hero_title_' . $i, 'عنوان ' . $i, ['width' => '50%']);
			$acfGroup->relationshipFields->addLink('hero_link_' . $i, 'متن و لینک دکمه ' . $i, ['width' => '50%']);
		}

		for ($i = 3; $i <= 4; $i++) {
			$acfGroup->relationshipFields->addLink('hero_link_' . $i, 'متن و لینک دکمه ' . $i, ['width' => '50%']);
		}

		$acfGroup->layoutFields->addTab('projects', 'پروژه ها');
		$acfGroup->basicFields->addText('projects_title', 'عنوان پروژه ها', ['width' => '50%']);
		$acfGroup->relationshipFields->addLink('projects_link', 'متن و لینک دکمه', ['width' => '50%']);

		$acfGroup->layoutFields->addTab('services', 'خدمات ها');
		$acfGroup->basicFields->addText('services_title', 'عنوان خدمات', ['width' => '100%']);

		$acfGroup->layoutFields->addTab('video', 'ویدیو');
		$acfGroup->basicFields->addText('video_title', 'عنوان ویدیو', ['width' => '100%']);
		$acfGroup->contentFields->addFile('video_file', 'فایل ویدیو', ['width' => '100%']);
		$acfGroup->contentFields->addImage('video_cover', 'عکس پوشش ویدیو', ['width' => '100%']);

		$acfGroup->layoutFields->addTab('engineers', 'مهندسین');
		$acfGroup->basicFields->addText('engineers_title', 'عنوان مهندسین', ['width' => '100%']);
		$acfGroup->relationshipFields->addLink('engineers_link', 'متن و لینک دکمه', ['width' => '100%']);

		//location
		$acfGroup->setLocation('page_template', '==', 'templates/home.php');

		// register group
		$acfGroup->register('info');
	}
}
