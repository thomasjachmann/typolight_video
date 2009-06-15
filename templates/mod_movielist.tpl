
<!-- indexer::stop -->
<div class="<?php echo $this->class; ?> block"<?php echo $this->cssID; ?><?php if ($this->style): ?> style="<?php echo $this->style; ?>"<?php endif; ?>>
<?php if ($this->headline): ?>

<<?php echo $this->hl; ?>><?php echo $this->headline; ?></<?php echo $this->hl; ?>>
<?php endif; ?>
<?php foreach($this->categories as $category): ?>

<?php if (strlen($category['headline'])): ?><h2><?php echo $category['headline']; ?></h2><?php endif; ?>

<ul class="<?php echo $category['class']; ?>">
<?php foreach ($category['items'] as $movie): ?>
  <li class="<?php echo $movie['class']; ?>">
    <div class="movie_thumbnail"><a href="<?php echo $movie['href']; ?>" title="<?php echo $movie['title']; ?>"><img src="<?php echo $movie['thumbnail']; ?>" alt="<?php echo $movie['title']; ?>"/></a></div>
    <div class="movie_title"><a href="<?php echo $movie['href']; ?>" title="<?php echo $movie['title']; ?>"><?php echo $movie['name']; ?></a></div>
  </li>
<?php endforeach; ?>
</ul>
<?php endforeach; ?>

</div>
<!-- indexer::continue -->
