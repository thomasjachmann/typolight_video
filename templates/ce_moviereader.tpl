<?php if ($this->visible): ?>
<div class="ce_moviereader block">

<div class="movie_playback">
  <?php include('mod_moviereader_' . $this->source . '.tpl'); ?>
</div>

<div class="movie_name">
  <?php echo $this->name; ?>
</div>

<?php if ($this->showDescription && $this->description): ?>
<div class="ce_text block">
  <?php echo $this->description; ?>
</div>
<?php endif; ?>

</div>
<?php endif; ?>