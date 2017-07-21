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
JHtml::_('stylesheet', 'plg_fields_masonrygallery/lightbox.css', array(), true);
JHtml::_('script', 'plg_fields_masonrygallery/masonry.pkgd.min.js', array('version' => 'auto', 'relative' => true), array('async' => true));
JHtml::_('script', 'plg_fields_masonrygallery/lightbox.js', array('version' => 'auto', 'relative' => true), array('async' => true));


// get the folder name in images directory
$path = $field->value;

$class = $fieldParams->get('container_class');

// get the value for lightbox
$lightboxValue = $fieldParams->get('lightbox');

//$columnWidth = $fieldParams->get('column_width');
//$itemWidth = $columnWidth . '%';

// read the .jpg from the selected directory
jimport('joomla.filesystem.folder');
$filter = '.\.jpg$';
$images = JFolder::files('images/' . $path);
?>

<div class="masonrygrid" data-masonry='{ "columnWidth": ".grid-sizer", "itemSelector": ".masonrygrid-item" }'>
	<div class="grid-sizer"></div>
        <?php foreach ($images as $image) : ?>
          <div class="masonrygrid-item <?php echo $class; ?>">
          		<?php if ($lightboxValue !== 0): ?>
					<?php $img = JHtml::_('image', 'images/' . $path . '/' . $image, $image, array('title' => $image, 'class' => 'masonryimage'), false); ?>
                    <?php echo JHtml::_('link', 'images/' . $path . '/' . $image, $img, array('data-lightbox' => 'gallery')); ?>
               <?php else: ?>
               		<?php echo $img = JHtml::_('image', 'images/' . $path . '/' . $image, $image, array('title' => $image, 'class' => 'masonryimage'), false); ?>
               <?php endif; ?>		
          </div>
      	<?php endforeach; ?>
</div>