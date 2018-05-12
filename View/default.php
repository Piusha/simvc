
<!DOCTYPE html>
<html>
<head>

    <title></title>
    <link rel="stylesheet" href="<?php echo SITE_PATH ?>/Public/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo SITE_PATH ?>/Public/css/style.css" type="text/css" />

    <script src="<?php echo SITE_PATH ?>/Public/js/Lib/jquery-1.10.2.min.js"></script>
    <script type="text/javascript">
        var SITE_PATH  = '<?php echo SITE_PATH ?>';
    </script>
</head>
<body>

	<div class="wrap">


		<?php echo $this->element('header');?>

		<div id="content">

			<div id="main">

				<?php echo $this->content('content'); ?>
			</div>
		</div>

		<?php echo $this->element('footer');?>

	</div>
</body>
</html>
