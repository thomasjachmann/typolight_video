<?php if ($this->visible): ?>
<div class="moviereader block">

<div class="moviereader_playback">
  <?php include('mod_moviereader_' . $this->source . '.tpl'); ?>
</div>

<div class="moviereader_name">
  <?php echo $this->name; ?>
</div>

<?php if ($this->showDescription && $this->description): ?>
<div class="moviereader_description ce_text block">
  <?php echo $this->description; ?>
</div>
<?php endif; ?>

</div>
<?php endif; ?>