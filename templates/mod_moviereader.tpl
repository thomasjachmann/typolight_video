
<div class="moviereader <?php echo $this->class; ?> block"<?php echo $this->cssID; ?><?php if ($this->style): ?> style="<?php echo $this->style; ?>"<?php endif; ?>>
<?php if ($this->headline): ?>

<<?php echo $this->hl; ?>><?php echo $this->headline; ?></<?php echo $this->hl; ?>>
<?php endif; ?>
<?php if ($this->error): ?>

<?php echo $this->error; ?> 
<?php else: ?>

<h1><?php echo $this->name; ?></h1>

<div class="moviereader_playback">
  <?php include('mod_moviereader_' . $this->source . '.tpl'); ?>
</div>

<?php if ($this->description): ?>
<div class="moviereader_description ce_text block">
  <?php echo $this->description; ?>
</div>
<?php endif; ?>

<?php endif; ?>

<p class="back"><a href="<?php echo $this->referer; ?>" title="<?php echo $this->back; ?>"><?php echo $this->back; ?></a></p>

</div>
