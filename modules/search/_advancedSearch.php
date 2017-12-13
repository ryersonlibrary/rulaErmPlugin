<section class="advanced-search-section">

  <a href="#" class="advanced-search-toggle <?php echo $show ? 'open' : '' ?>" aria-expanded="<?php echo $show ? 'true' : 'false' ?>"><?php echo __('Advanced search options') ?></a>

  <div class="advanced-search animateNicely" <?php echo !$show ? 'style="display: none;"' : '' ?>>

    <?php echo $form->renderFormTag(url_for(array('module' => 'informationobject', 'action' => 'browse')), array('name' => 'advanced-search-form', 'method' => 'get')) ?>

      <input type="hidden" name="showAdvanced" value="1"/>

      <?php foreach ($hiddenFields as $name => $value): ?>
        <input type="hidden" name="<?php echo $name ?>" value="<?php echo $value ?>"/>
      <?php endforeach; ?>

      <p><?php echo __('Filter results by:') ?></p>

      <div class="criteria">

        <div class="filter-row triple">

          <div class="filter-left">
            <?php echo $form->levels
              ->label(__('Level of description'))
              ->renderRow() ?>
          </div>

          <div class="filter-center">
            <?php echo $form->onlyMedia
              ->label(__('%1% available', array('%1%' => sfConfig::get('app_ui_label_digitalobject'))))
              ->renderRow() ?>
          </div>

          <div class="filter-right">
            <?php echo $form->findingAidStatus
              ->label(__('Finding aid'))
              ->renderRow() ?>
          </div>

        </div>

        <?php $showCopyright = sfConfig::get('app_toggleCopyrightFilter') ?>
        <?php $showMaterial  = sfConfig::get('app_toggleMaterialFilter') ?>

        <?php if ($showCopyright || $showMaterial): ?>
          <div class="filter-row">

            <?php if ($showCopyright): ?>
              <div class="filter<?php echo $showMaterial ? '-left' : '' ?>">
                <?php echo $form->copyrightStatus
                  ->label(__('Copyright status'))
                  ->renderRow() ?>
              </div>
            <?php endif; ?>

            <?php if ($showMaterial): ?>
              <div class="filter<?php echo $showCopyright ? '-right' : '' ?>">
                <?php echo $form->materialType
                  ->label(__('General material designation'))
                  ->renderRow() ?>
              </div>
            <?php endif; ?>

          </div>
        <?php endif; ?>

        <div class="filter-row">

          <div class="lod-filter">
            <label>
              <input type="radio" name="topLod" value="1" <?php echo $topLod ? 'checked' : '' ?>>
              <?php echo __('Top-level descriptions') ?>
            </label>
            <label>
              <input type="radio" name="topLod" value="0" <?php echo !$topLod ? 'checked' : '' ?>>
              <?php echo __('All descriptions') ?>
            </label>
          </div>

        </div>

      </div>

      <p><?php echo __('Filter by date range:') ?></p>

      <div class="criteria">

        <div class="filter-row">

          <div class="start-date">
            <?php echo $form->startDate
              ->label(__('Start'))
              ->renderRow() ?>
          </div>

          <div class="end-date">
            <?php echo $form->endDate
              ->label(__('End'))
              ->renderRow() ?>
          </div>

          <div class="date-type">
            <label>
              <input type="radio" name="rangeType" value="inclusive" <?php echo $rangeType == 'inclusive' ? 'checked' : '' ?>>
              <?php echo __('Overlapping') ?>
            </label>
            <label>
              <input type="radio" name="rangeType" value="exact" <?php echo $rangeType == 'exact' ? 'checked' : '' ?>>
              <?php echo __('Exact') ?>
            </label>
          </div>

          <a href="#" class="date-range-help-icon" aria-expanded="false"><i class="fa fa-question-circle"></i></a>

        </div>

        <div class="alert alert-info date-range-help animateNicely">
          <?php echo __('Use these options to specify how the date range returns results. "Exact" means that the start and end dates of descriptions returned must fall entirely within the date range entered. "Overlapping" means that any description whose start or end dates touch or overlap the target date range will be returned.') ?>
        </div>

      </div>

      <section class="actions">
        <input type="submit" class="c-btn c-btn-submit" value="<?php echo __('Search') ?>"/>
        <input type="button" class="reset c-btn c-btn-delete" value="<?php echo __('Reset') ?>"/>
      </section>

    </form>

  </div>

</section>
