<?php foreach ($resource->getActorEvents() as $item): ?>
  <?php if (isset($item->actor) && !isset($actorsShown[$item->actor->id])): ?>
  <div class="field">
    <?php if (isset($sidebar)): ?>
      <h3><?php echo $item->type->getRole() ?></h3>

      <div><?php echo link_to(render_title($item->actor), array($item->actor)) ?></div>
    <?php endif; ?>
  </div>
  <?php endif; ?>
<?php endforeach; ?>

<?php foreach ($resource->relationsRelatedBysubjectId as $item): ?>
  <?php if (isset($item->type) && QubitTerm::NAME_ACCESS_POINT_ID == $item->type->id): ?>
  <div class="field">
    <?php if (isset($sidebar)): ?>
      <h3><?php if (!isset($mods)): ?>(<?php echo __('Resource') ?>)<?php endif; ?></h3>

      <div><?php echo link_to(render_title($item->object), array($item->object, 'module' => 'actor')) ?></div>
    <?php endif; ?>
  </div>
  <?php endif; ?>
<?php endforeach; ?>