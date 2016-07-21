<?php
$itemId = isset($_GET['view']) ? $_GET['view'] : 'about'; // выбранный пункт меню
$menuItems = array( // все пункты меню
    'about' => 'Отзывы о нас',
    'gallery' => 'Галерея',
	'history' => 'История',
	'contacts' => 'Контакты'
);
echo '<ul>';
foreach($menuItems as $menuItemId => $menuItem) {
    echo '<li><a href="?view=', $menuItemId, '" ',
         ($menuItemId == $itemId ? 'class="active"':''), // если активный совпадает с текущим, то выделить его с помощью класса CSS
         '>', $menuItem, '</a></li>';
}
echo '</ul>';
