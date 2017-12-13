<div class="field">

  <?php if (isset($sidebar)): ?>
    <h4><?php echo __('Related ' . sfConfig::get('app_ui_label_subject')) ?></h4>
  <?php elseif (isset($mods)): ?>
    <h3><?php echo __(sfConfig::get('app_ui_label_subject')) ?></h3>
  <?php else: ?>
    <h3><?php echo __(sfConfig::get('app_ui_label_subject') . ' access points') ?></h3>
  <?php endif; ?>

  <div>
    <ul>
      <?php foreach ($resource->getSubjectAccessPoints() as $item): ?>
        <li>
          <?php foreach ($item->term->ancestors->andSelf()->orderBy('lft') as $key => $subject): ?>
            <?php if (QubitTerm::ROOT_ID == $subject->id) continue; ?>
            <?php if (1 < $key): ?>
              &raquo;
            <?php endif; ?>
            <?php echo link_to($subject->__toString(), array($subject, 'module' => 'term')) ?>
          <?php endforeach; ?>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>

</div>
