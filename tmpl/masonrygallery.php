<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Fields.Uikitgallery
 *
 * @copyright   Copyright (C) 2017 JUGN.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
if (!$field->value || $field->value == '-1') {
    return;
}

JHtml::_('jQuery.Framework');

$doc = JFactory::getDocument();

JHtml::_('stylesheet', 'plg_fields_masonrygallery/masonrygallery.css', array(), true);
JHtml::_('script', 'plg_fields_masonrygallery/masonry.pkgd.min.js', array('version' => 'auto', 'relative' => true), array('defer' => true));


// get the folder name in images directory
$path = $field->value;
$class = $fieldParams->get('container_class');

// read the .jpg from the selected directory
jimport('joomla.filesystem.folder');
$filter = '.\.jpg$';
$images = JFolder::files('images/' . $path);
?>

<div class="masonrygrid" data-masonry='{ "columnWidth": ".grid-sizer", "itemSelector": ".masonrygrid-item" }'>
	<div class="grid-sizer"></div>
        <?php foreach ($images as $image) : ?>
          <div class="masonrygrid-item <?php echo $class; ?>">
				<?php echo JHtml::_('image', 'images/' . $path . '/' . $image, $image, array('title' => $image, 'class' => 'masonryimage'), false); ?>
          </div>
      	<?php endforeach; ?>
</div>
