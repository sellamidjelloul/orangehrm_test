<?php
echo use_stylesheet(plugin_web_path('orangehrmCorePlugin', 'css/mainMenuComponent.css'));
echo use_javascript(plugin_web_path('orangehrmCorePlugin', 'js/mainMenuComponent.js'));

function getSubMenuIndication($menuItem) {

    if (count($menuItem['subMenuItems']) > 0) {
        return ' class="arrow"';
    } else {
        return '';
    }

}

function getListItemClass($menuItem, $currentItemDetails, $additionalClasses = []) {
    $additionalClasses = implode(" ", $additionalClasses);

    if ($menuItem['level'] == 1 && $menuItem['id'] == $currentItemDetails['level1']) {
        return empty($additionalClasses) ? ' class="current"' : ' class="current ' . $additionalClasses . '"';
    } elseif ($menuItem['level'] == 2 && $menuItem['id'] == $currentItemDetails['level2']) {
        return empty($additionalClasses) ? ' class="selected"' : ' class="selected ' . $additionalClasses . '"';
    }

    return empty($additionalClasses) ? '' : ' class="' . $additionalClasses . '"';
}

function getMenuUrl($menuItem) {

    $url = '#';

    if (!empty($menuItem['module']) && !empty($menuItem['action'])) {
        $url = url_for($menuItem['module'] . '/'. $menuItem['action']);
        $url = empty($menuItem['urlExtras'])?$url:$url . $menuItem['urlExtras'];
    }

    return $url;

}

function getHtmlId($menuItem) {

    $id = '';

    if (!empty($menuItem['action'])) {
        $id = 'menu_' . $menuItem['module'] . '_' . $menuItem['action'];
    } else {

        $module             = '';
        $firstSubMenuItem   = $menuItem['subMenuItems'][0];
        $module             = $firstSubMenuItem['module'] . '_';

        $id = 'menu_' . $module . str_replace(' ', '', $menuItem['menuTitle']);

    }

    return $id;

}

?>

<div>

    <ul class="list-unstyled">
        <?php foreach ($menuItemArray as $i => $firstLevelItem) : ?>
        <?php if (count($firstLevelItem['subMenuItems']) > 0) : ?>
                <li><a href="<?php echo "#firstLavel_" . $i; ?>" data-toggle="collapse"><?php echo __($firstLevelItem['menuTitle']) ?></a></li>
            <?php else:?>
                <li><a href="<?php echo getMenuUrl($firstLevelItem); ?>" ><?php echo __($firstLevelItem['menuTitle']); ?></a></li>
        <?php endif; ?>

        <ul id="<?php echo "firstLavel_" . $i; ?>" class="list-unstyled collapse">
            <?php if (count($firstLevelItem['subMenuItems']) > 0) : ?>

            <?php foreach ($firstLevelItem['subMenuItems'] as $j => $secondLevelItem) : ?>

                        <?php if (count($secondLevelItem['subMenuItems']) > 0) : ?>
                        <li><a href="<?php echo "#secondLavel_" . $i . "_" . $j; ?>" data-toggle="collapse"><?php echo __($secondLevelItem['menuTitle']) ?></a>
                            <ul id="<?php echo "secondLavel_" . $i . "_" . $j; ?>" class="list-unstyled collapse">

                                <?php foreach ($secondLevelItem['subMenuItems'] as $thirdLevelItem) : ?>

                                    <li><a href="<?php echo getMenuUrl($thirdLevelItem); ?>"><?php echo __($thirdLevelItem['menuTitle']) ?></a></li>

                                <?php endforeach; ?>

                            </ul> <!-- third level -->
                    <?php else:?>
                        <li><a href="<?php echo getMenuUrl($secondLevelItem); ?>" ><?php echo __($secondLevelItem['menuTitle']) ?></a>
                        <?php endif; ?>

                    </li>

                <?php endforeach; ?>
            <?php else:
                // Empty li to add an orange bar and maintain uniform look.
                ?>
                <li></li>
            <?php endif; ?>

        </ul> <!-- second level -->
        <?php endforeach; ?>
    </ul>

</div> <!-- menu -->