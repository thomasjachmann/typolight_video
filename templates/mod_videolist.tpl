
<!-- indexer::stop -->
<div class="videolist <?php echo $this->class; ?> block"<?php echo $this->cssID; ?><?php if ($this->style): ?> style="<?php echo $this->style; ?>"<?php endif; ?>>
<?php if ($this->headline): ?>

<<?php echo $this->hl; ?>><?php echo $this->headline; ?></<?php echo $this->hl; ?>>
<?php endif; ?>
<?php foreach($this->categories as $category): ?>

<?php if (strlen($category['headline'])): ?><h2><?php echo $category['headline']; ?></h2><?php endif; ?>

<ul class="videolist_list <?php echo $category['class']; ?>">
<?php foreach ($category['items'] as $video): ?>
  <li class="videolist_video <?php echo $video['class']; ?>">
    <div class="videolist_thumbnail"><a href="<?php echo $video['href']; ?>" title="<?php echo $video['title']; ?>"><img src="<?php echo $video['thumbnail']; ?>" alt="<?php echo $video['title']; ?>"/></a></div>
    <div class="videolist_name"><a href="<?php echo $video['href']; ?>" title="<?php echo $video['title']; ?>"><?php echo $video['name']; ?></a></div>
  </li>
<?php endforeach; ?>
</ul>
<?php endforeach; ?>

</div>
<!-- indexer::continue -->
