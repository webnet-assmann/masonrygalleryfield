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

$doc = JFactory::getDocument();

JHtml::_('jQuery.Framework');

$doc->addStylesheet('plugins/fields/masonrygallery/media/css/masonrygallery.css');
$doc->addScript('plugins/fields/masonrygallery/media/js/masonry.pkgd.min.js');
$doc->addScript('plugins/fields/masonrygallery/media/js/masonrygallery.js');

// get the folder name in images directory
$path = $field->value;
$class = $fieldParams->get('container_class');

// read the .jpg from the selected directory
jimport('joomla.filesystem.folder');
$filter = '.\.jpg$';
$images = JFolder::files('images/' . $path);
?>

<div id="container">  
	<div class="grid-sizer"></div>  
        <?php foreach ($images as $image) : ?>
          <div class="item <?php echo $class; ?>">
				<?php echo JHtml::_('image', 'images/' . $path . '/' . $image, $image, array('title' => $image), false); ?>
          </div>
      	<?php endforeach; ?>
</div>
