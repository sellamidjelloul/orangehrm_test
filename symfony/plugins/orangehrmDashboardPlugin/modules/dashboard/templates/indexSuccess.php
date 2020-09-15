<?php echo stylesheet_tag(plugin_web_path('orangehrmDashboardPlugin', 'css/orangehrmDashboardPlugin.css')); ?>

<div class="row">
    <?php if (count($settings) == 0): ?>
        <div id="messagebar" style="margin-left: 16px;width: 700px;">
            <span style="font-weight: bold;">No Groups are Assigned</span>
        </div>
    <?php endif; ?>
    <?php foreach ($settings->getRawValue() as $groupKey => $config): ?>
    <div class="col-12">
        <div class="row">
            <?php foreach ($config['panels'] as $panelKey => $panel): ?>
                <?php $panel['attributes']['name'] = $panel['name']; ?>
                <?php if ($panel['attributes']['action_name'] != "baseLegend") :?>
                    <?php include_component('dashboard', 'ohrmDashboardSection', $panel['attributes']) ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endforeach; ?>
</div>
