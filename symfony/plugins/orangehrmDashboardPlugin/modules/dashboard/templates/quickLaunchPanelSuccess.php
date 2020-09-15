<?php
    $colors = array(
            "bg-primary",
            "bg-success",
            "bg-warning",
            "bg-danger",
            "bg-dark",
            "bg-info"
    );

$links = $links->getRawValue();

function get_icon($link) {
    $icons = array(
            'leave/assignLeave' => 'fa-address-card',
            'leave/viewLeaveList/reset/1' => 'fa-align-justify',
            'time/viewEmployeeTimesheet' => 'fa-archive',
            'leave/applyLeave' => 'fa-anchor',
            'leave/viewMyLeaveList/reset/1' => 'fa-angle-double-up',
            'time/viewMyTimesheet' => 'fa-book',
    );

    return $icons[$link];
}

?>



    <?php foreach ($links as $i => $link) : ?>
    <div class="col-md-3 mb-md-3">
        <a href="<?php echo url_for($link['url']); ?>" target="<?php echo $link['target'] ?>"  class="card <?php echo $colors[$i]; ?> text-white p-3">
            <h3><?php echo __($link['name']) ?></h3>
            <i class="fa fa-3x <?php echo get_icon($link['url']) ?>"></i>
        </a>
    </div>
    <?php endforeach; ?>





