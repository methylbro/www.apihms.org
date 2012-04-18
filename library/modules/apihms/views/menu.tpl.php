
        <ul class="<?php echo $class; ?>">

<?php foreach($elements as $element):?>
<?php @list($url, $ancor, $hide) = $element; ?>
<?php if(!$hide): ?>
<?php if ($URLWriter->findUrl($url)==$currentUrl): ?>
	  	  <li class="active"><?php echo $ancor; ?><span class="threed"></span></li>
<?php else: ?>
	  	  <li><a href="/<?php echo $URLWriter->findAlias($url); ?>"><?php echo $ancor; ?></a></li>
<?php endif; ?>
<?php endif; ?>
<?php endforeach; ?>

	    </ul>
