<?php
class ReadMoreData {

	private $id;

	public function __call($name, $args) {

		$methodPrefix = substr($name, 0, 3);
		$methodProperty = lcfirst(substr($name,3));

		if ($methodPrefix=='get') {
			return $this->$methodProperty;
		}
		else if ($methodPrefix=='set') {
			$this->$methodProperty = $args[0];
		}
	}

	public function getSavedOptions() {

		$data = array();
		$id = $this->getId();

		if(!isset($id)) {
			return $data;
		}
		global $wpdb;

		$getSavedSql = $wpdb->prepare("SELECT * FROM ".$wpdb->prefix."expm_maker WHERE id = %d", $id);
		$result = $wpdb->get_row($getSavedSql, ARRAY_A);

		if(empty($result)) {
			return $data;
		}

		$data['type'] = $result['type'];
		$data['expm-title'] = $result['expm-title'];
		$data['button-width'] = $result['button-width'];
		$data['button-height'] = $result['button-height'];
		$data['animation-duration'] = $result['animation-duration'];
		$options = json_decode($result['options'], true);

		return $data+$options;
	}

	public static function params() {

		$horizontalAlign = array(
			"left"=>"Left",
			"center"=>"Center",
			"right"=>"Right"
		);

		$hoverEffect = array(
			'' => 'No effect',
			'flash' => 'Flash',
			'pulse' => 'Pulse',
			'rubberBand' => 'RubberBand',
			'shake' => 'Shake',
			'tada' => 'Tada',
			'jello' => 'Jello'
		);

		$vertical = array(
			"top"=>"Top",
			"bottom"=>"Bottom"
		);

		$googleFonts = array(
			'Arial' => 'Arial',
			'Diplomata SC' => 'Diplomata SC',
			'flavors'=>'Flavors',
			'Open Sans'=> 'Open Sans',
			'Droid Sans'=>'Droid Sans',
			'Droid Serif'=>'Droid Serif',
			'chewy'=>'Chewy',
			'oswald' => 'Oswald',
			'Dancing Script'=> 'Dancing Script',
			'Merriweather'=>'Merriweather',
			'Roboto Condensed'=>'Roboto Condensed',
			'Oswald'=>'Oswald',
			'PT Sans'=>'PT Sans',
			'Montserrat'=>'Montserrat',
			'customFont' => 'Custom font'
		);

		$btnFontWeight = array(
			'normal' => 'Normal',
			'bold' => 'Bold',
			'bolder' => 'Bolder',
			'900' => '900',
			'800' => '800',
			'700' => '700',
			'600' => '600',
			'500' => '500',
			'400' => '400',
			'300' => '300',
			'200' => '200',
			'100' => '100',
			'initial' => 'Initial',
			'inherit' => 'Inherit',
		);

		$easings = array(
			'linear' => 'Linear',
			'swing' => 'Swing',
			'easeInQuad' => 'Ease In Quad',
			'easeOutQuad' => 'Ease Out Quad',
			'easeInOutQuad' => 'Ease In Out Quad',
			'easeInCubic' => 'Ease In Cubic',
			'easeOutCubic' => 'Ease Out Cubic',
			'easeInOutCubic' => 'Ease In Out Cubic',
			'easeInQuart' => 'Ease In Quart',
			'easeOutQuart' => 'Ease Out Quart',
			'easeInOutQuart' => 'Ease In Out Quart',
			'easeInQuint' => 'Ease In Quint',
			'easeOutQuint' => 'Ease Out Quint',
			'easeInOutQuint' => 'Ease In Out Quint',
			'easeInExpo' => 'Ease In Expo',
			'easeOutExpo' => 'Ease Out Expo',
			'easeInOutExpo' => 'Ease In Out Expo',
			'easeInSine' => 'Ease In Sine',
			'easeOutSine' => 'Ease Out Sine',
			'easeInOutSine' => 'Ease In Out Sine',
			'easeInCirc' => 'Ease In Circ',
			'easeOutCirc' => 'Ease Out Circ',
			'easeInOutCirc' => 'Ease In Out Circ',
			'easeInElastic' => 'Ease In Elastic',
			'easeOutElastic' => 'Ease Out Elastic',
			'easeInOutElastic' => 'Ease In Out Elastic',
			'easeInBack' => 'Ease In Back',
			'easeOutBack' => 'Ease Out Back',
			'easeInOutBack' => 'Ease In Out Back',
			'easeInBounce' => 'Ease In Bounce',
			'easeOutBounce' => 'Ease Out Bounce',
			'easeInOutBounce' => 'Ease In Out Bounce'
		);

		$selectedPost = self::getSelectedPost();

		$devices = array(
			'desktop' => 'Desktop',
			'tablet' => 'Tablet',
			'mobile' => 'Mobile'
		);

		$dimensionsMode = array(
			'template' => array(
				'fieldWrapperAttr' => array(
					'class' => 'col-xs-5 yrm-choice-option-wrapper'
				),
				'labelAttr' => array(
					'class' => 'col-xs-5 yrm-choice-option-wrapper yrm-sub-option-label'
				),
				'groupWrapperAttr' => array(
					'class' => 'row form-group yrm-choice-wrapper yrm-choice-inputs-wrapper'
				)
			),
			'buttonPosition' => 'right',
			'nextNewLine' => true,
			'fields' => array(
				array(
					'attr' => array(
						'type' => 'radio',
						'name' => 'yrm-dimension-mode',
						'class' => 'dimension-mode',
						'data-attr-href' => 'dimension-mode-classic',
						'value' => 'classicMode'
					),
					'label' => array(
						'name' => __('Custom Dimensions', YRM_LANG).':'
					)
				),
				array(
					'attr' => array(
						'type' => 'radio',
						'name' => 'yrm-dimension-mode',
						'class' => 'dimension-mode',
						'data-attr-href' => 'dimension-mode-auto',
						'value' => 'autoMode'
					),
					'label' => array(
						'name' => __('Auto', YRM_LANG).':'
					)
				)
			)
		);
		
		$hiddenDataLoadMode = array(
			'template' => array(
				'fieldWrapperAttr' => array(
					'class' => 'col-xs-5 yrm-choice-option-wrapper'
				),
				'labelAttr' => array(
					'class' => 'col-xs-5 yrm-choice-option-wrapper yrm-sub-option-label'
				),
				'groupWrapperAttr' => array(
					'class' => 'row form-group yrm-choice-wrapper yrm-choice-inputs-wrapper'
				)
			),
			'buttonPosition' => 'right',
			'nextNewLine' => true,
			'fields' => array(
				array(
					'attr' => array(
						'type' => 'radio',
						'name' => 'yrm-hidden-data-load-mode',
						'class' => 'hidden-load-mode',
						'data-attr-href' => 'after-page-load-section',
						'value' => 'onload'
					),
					'label' => array(
						'name' => __('After page load', YRM_LANG).':'
					)
				),
				array(
					'attr' => array(
						'type' => 'radio',
						'name' => 'yrm-hidden-data-load-mode',
						'class' => 'hidden-load-mode',
						'data-attr-href' => 'after-button-click-section',
						'value' => 'click'
					),
					'label' => array(
						'name' => __('After click', YRM_LANG).':'
					)
				)
			)
		);

		$buttonForPost = array(
			'template' => array(
				'fieldWrapperAttr' => array(
					'class' => 'col-xs-5 yrm-choice-option-wrapper'
				),
				'labelAttr' => array(
					'class' => 'col-xs-5 yrm-choice-option-wrapper yrm-sub-option-label'
				),
				'groupWrapperAttr' => array(
					'class' => 'row form-group yrm-choice-wrapper yrm-choice-inputs-wrapper'
				)
			),
			'buttonPosition' => 'right',
			'nextNewLine' => true,
			'fields' => array(
				array(
					'attr' => array(
						'type' => 'radio',
						'name' => 'yrm-button-for-post',
						'class' => 'button-for-post',
						'value' => 'forALlPosts'
					),
					'label' => array(
						'name' => __('Show on all posts', YRM_LANG).':'
					)
				),
				array(
					'attr' => array(
						'type' => 'radio',
						'name' => 'yrm-button-for-post',
						'class' => 'button-for-post',
						'data-attr-href' => 'botton-for-selected-posts',
						'value' => 'slectedPosts'
					),
					'label' => array(
						'name' => __('Show on selected post', YRM_LANG).':'
					)
				)
			)
		);

		$bgImageSize = array(
			'auto' => __('Auto', YRM_LANG),
			'cover' => __('Cover', YRM_LANG),
			'contain' => __('Contain', YRM_LANG)
		);

		$bgImageRepeat = array(
			'repeat' => __('Repeat', YRM_LANG),
			'repeat-x' => __('Repeat x', YRM_LANG),
			'repeat-y' => __('Repeat y', YRM_LANG),
			'no-repeat' => __('Not Repeat', YRM_LANG)
		);

        $themesPopup = array(
            'colorbox1',
            'colorbox2',
            'colorbox3',
            'colorbox4',
            'colorbox5'
        );

		$arrays = array(
			'horizontalAlign' => $horizontalAlign,
			'vertical' => $vertical,
			'googleFonts' => $googleFonts,
			'hoverEffect' => $hoverEffect,
			'selectedPost' => $selectedPost,
			'btnFontWeight' => $btnFontWeight,
			'easings' => apply_filters('yrm-easings', $easings),
			'userRoles' => self::getAllUserRoles(),
			'devices' => $devices,
			'dimensionsMode' => $dimensionsMode,
			'bgImageSize' => $bgImageSize,
			'bgImageRepeat' => $bgImageRepeat,
			'themesPopup' => $themesPopup,
			'buttonForPost' => $buttonForPost,
			'hiddenDataLoadMode' => $hiddenDataLoadMode
		);
		return $arrays;
	}

	public static function getAllUserRoles() {
		$rulesArray = array();
		if(!function_exists('get_editable_roles')){
			return $rulesArray;
		}

		$roles = get_editable_roles();
		foreach($roles as $roleName => $roleInfo) {

			if($roleName == 'administrator') {
				continue;
			}
			$rulesArray[$roleName] = $roleName;
		}

		return $rulesArray;
	}

	public static function getCurrentUserRole() {
		$role = 'administrator';

		if (is_multisite()) {

			$getUsersObj = get_users(
				array(
					'blog_id' => get_current_blog_id()
				)
			);
			if (is_array($getUsersObj)) {
				foreach ($getUsersObj as $key => $userData) {
					if ($userData->ID == get_current_user_id()) {
						$roles = $userData->roles;
						if (is_array($roles) && !empty($roles)) {
							$role = $roles[0];
						}
					}
				}
			}

			return $role;
		}

		global $current_user, $wpdb;
		$userRoleKey = $wpdb->prefix . 'capabilities';
		if(!empty($current_user->$userRoleKey)) {
			$usersRoles = array_keys(@$current_user->$userRoleKey);
		}

		if (!empty($usersRoles) && is_array($usersRoles)) {
			$role = $usersRoles[0];
		}

		return $role;
	}

	public function defaultData() {

		$dataDefault = array(
			'button-width' => '100px',
			'button-height' => '32px',
			'animation-duration' => '1000',
			'font-size' => '14px',
			'btn-background-color' => '#81d742',
			'btn-text-color' => '',
			'btn-border-radius' => '0px',
			'horizontal' => 'center',
			'vertical' => 'bottom',
			'hidden-content-bg-color' => '',
			'hidden-inner-width' => '100%',
			'hidden-content-text-color' => '',
			'show-only-devices' => '',
			'hide-content' => 'on',
			'type' => 'button',
			'expander-font-family' => 'Open Sans',
			'hidden-content-font-size' => '12',
			'hover-effect' => '',
			'btn-hover-text-color' => 'btn-hover-text-color',
			'btn-hover-bg-color' => 'btn-hover-bg-color',
			'yrm-selected-post' => '',
			'hidden-content-padding' => '0',
			'button-border-width' => '1px',
			'button-box-shadow-horizontal-length' => '10',
			'button-box-shadow-vertical-length' => '10',
			'button-box-spread-radius' => '0',
			'button-box-blur-radius' => '5',
			'more-button-title' => __('Read more', YRM_LANG),
			'less-button-title' => __('Less more', YRM_LANG),
			'yrm-dimension-mode' => 'classicMode',
			'yrm-button-padding-top' => '0',
			'yrm-button-padding-right' => '0',
			'yrm-button-padding-bottom' => '0',
			'yrm-button-padding-left' => '0',
			'show-content-gradient-height' => 80,
			'show-content-gradient-position' => -160,
			'show-content-gradient-color' => '#ffffff',
			'arrow-icon-width' => '20',
			'arrow-icon-height' => '20',
			'yrm-button-for-post' => 'forALlPosts',
			'hidden-content-bg-img-size' => 'cover',
			'auto-open-delay' => 0,
			'yrm-button-opacity' => 1,
			'hidden-content-bg-repeat' => 'no-repeat',
			'yrm-hidden-data-load-mode' => 'onload',
			'load-data-delay' => '0',
			'link-button-confirm-text' => __('Are you sure?', YRM_LANG)
		);

		/*popup default values*/
		$dataDefault['yrm-popup-theme'] = 'colorbox1';
		$dataDefault['yrm-popup-width'] = '';
		$dataDefault['yrm-popup-height'] = '';
		$dataDefault['yrm-popup-max-width'] = '';
		$dataDefault['yrm-popup-max-height'] = '';
		$dataDefault['yrm-popup-initial-width'] = '300';
		$dataDefault['yrm-popup-initial-height'] = '100';
		$dataDefault['yrm-popup-esc-key'] = true;
		$dataDefault['yrm-popup-close-button'] = true;
		$dataDefault['yrm-popup-overlay-click'] = true;
		$dataDefault['yrm-popup-overlay-color'] = '';
		$dataDefault['yrm-popup-content-color'] = '';
		$dataDefault['yrm-popup-content-padding'] = 0;
		$dataDefault['yrm-btn-font-weight'] = 'normal';
		$dataDefault['yrm-animate-easings'] = 'swing';

		$dataDefault['yrm-button-icon'] = YRM_BUTTON_ICON_URL;
        $dataDefault = apply_filters('yrmDefaultOptions', $dataDefault);
		return $dataDefault;
	}

	public static function getAllData() {

		global $wpdb;

		$results = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."expm_maker ORDER BY ID DESC", ARRAY_A);

		return $results;
	}

	public static function getDataArrayFormDb() {

		$dbData = self::getAllData();
		$data['id'] = $dbData['id'];
		$data['type'] = $dbData['type'];
		$data['title'] = $dbData['title'];
		$data['width'] = $dbData['width'];
		$data['height'] = $dbData['height'];
		$data['duration'] = $dbData['duration'];

		return array_merge($data, $dbData);
	}

	public function getOptionsData() {

		$id = $this->getId();

		if(isset($id)) {
			return $this->getSavedOptions();
		}
		else {
			return $this->defaultData();
		}
	}

	public function getOptionValue($optionKey, $isBool = false) {

		$savedOptions = $this->getSavedOptions();

		$defaultOptions = $this->defaultData();

		if (isset($savedOptions[$optionKey])) {
			$elementValue = $savedOptions[$optionKey];
		}
		else if(!empty($savedOptions) && $isBool) {
			/*for checkbox elements when they does not exist in the saved data*/
			$elementValue = @$defaultOptions[$optionKey];
		}
		else if(isset($defaultOptions[$optionKey])){
			$elementValue =  $defaultOptions[$optionKey];
		}
		else {
			$elementValue = '';
		}

		if($isBool) {
			$elementValue = $this->boolToChecked($elementValue);
		}

		return $elementValue;
	}

	public function boolToChecked($var) {
		return ($var?'checked':'');
	}

	public function delete() {

		global $wpdb;
		$id = $this->getId();
		$wpdb->delete($wpdb->prefix.'expm_maker', array('id'=>$id), array('%d'));
	}

	public static function getSelectedPost() {

		$args = array(
			'offset'           => 0,
			'orderby'          => 'date',
			'order'            => 'DESC',
			'post_status'      => 'publish',
			'suppress_filters' => true
		);

		$args["post_type"] = 'post';
		$args["posts_per_page"] = 1000;
		$pages = get_posts($args);
		$postData = array();

		if(!empty($pages)) {
			foreach ($pages as $page) {
				$postData[$page->ID] = $page->post_name;
			}
		}
	
		return $postData;
	}
}