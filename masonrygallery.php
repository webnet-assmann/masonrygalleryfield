<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Fields.Imagelist
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JLoader::import('components.com_fields.libraries.fieldslistplugin', JPATH_ADMINISTRATOR);

/**
 * Fields Imagelist Plugin
 *
 * @since  3.7.0
 */


class PlgFieldsMasonrygallery extends FieldsListPlugin
{

	/**
	 * Transforms the field into a DOM XML element and appends it as a child on the given parent.
	 *
	 * @param   stdClass    $field   The field.
	 * @param   DOMElement  $parent  The field node parent.
	 * @param   JForm       $form    The form.
	 *
	 * @return  DOMElement
	 *
	 * @since   3.7.0
	 */

	public function onCustomFieldsPrepareDom($field, DOMElement $parent, JForm $form)
	{



		$fieldNode = parent::onCustomFieldsPrepareDom($field, $parent, $form);

		if (!$fieldNode)
		{
			return $fieldNode;
		}

		$imgdirectory = 'images';

		$fieldNode->setAttribute('type', 'folderlist');
        $fieldNode->setAttribute('directory', $imgdirectory);
        $fieldNode->setAttribute('required', false);
        $fieldNode->setAttribute('hide_none', false);
        $fieldNode->setAttribute('hide_default', true);
        $fieldNode->setAttribute('recursive', true);
        $fieldNode->setAttribute('default', '/');
        $fieldNode->setAttribute('label', 'PLG_FIELDS_MASONRYGALLERY_PARAMS_DIRECTORY_LABEL');
        $fieldNode->setAttribute('description', 'PLG_FIELDS_MASONRYGALLERY_PARAMS_DIRECTORY_DESC');

        return $fieldNode;
	}


}
