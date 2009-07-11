<?php if ($this->visible): ?>
<div class="videoreader block">

<div class="videoreader_playback">
  <?php include('mod_videoreader_' . $this->source . '.tpl'); ?>
</div>

<div class="videoreader_name">
  <?php echo $this->name; ?>
  (<a href="<?php echo $this->url; ?>"><?php echo $GLOBALS['TL_LANG']['MSC']['videoSource']; ?></a>)
</div>

</div>

<?php if ($this->showDescription && $this->description): ?>
<div class="videoreader_description ce_text block">
  <?php echo $this->description; ?>
</div>
<?php endif; ?>

<?php endif; ?>