
      <div id="infos" style="<?php if(!$visible): ?>display:none;<?php endif; ?>">
      <div class="bottom">
      <div class="content">
        <h2><?php echo $title; ?></h2>
		<span class="close">
			<a href="/<?php echo $URLWriter->findAlias($infoURL->remove); ?>" onclick="return iopen(this);" title="Cacher" rel="nofollow">x</a>
		</span>
        <p>
		<?php for($i=0; $i<$nombre; $i++):?>
		<?php list($url, $ancor) = $actions[$i]; ?>
		<a href="/<?php echo $URLWriter->findAlias($url); ?>"><?php echo $ancor; ?></a>
		<?php if($i<$nombre-1): ?>
		,
		<?php endif; ?>
		<?php endfor; ?>
		...
		</p>
	  </div>
	  </div>
	  </div>

      <div class="content open" id="open" style="position:relative;<?php if($visible): ?>display:none;<?php endif; ?>">
		<a href="/<?php echo $URLWriter->findAlias($infoURL->show); ?>" onclick="return iclose(this);" rel="nofollow">Les actions de l'APIHMS &darr;</a>
	  </div>

<script type="text/javascript">
	function iopen(link) {
		new Ajax.Request(link.href);
		Effect.SlideUp('infos', { duration: 0.4 });
		Effect.SlideDown('open', { duration: 0.4 });
		return false;
	}
	function iclose(link) {
		new Ajax.Request(link.href);
		Effect.SlideUp('open', { duration: 0.4 });
		Effect.SlideDown('infos', { duration: 0.4 });
		return false;
	}
</script>
