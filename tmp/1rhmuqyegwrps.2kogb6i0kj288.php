<?php echo $this->render('layout/header.htm',NULL,get_defined_vars(),0); ?>
<?php echo $this->render('layout/sidebar.htm',NULL,get_defined_vars(),0); ?>
<?php echo $this->render('layout/topbar.htm',NULL,get_defined_vars(),0); ?>
<?php echo $this->render($view,NULL,get_defined_vars(),0); ?>
<?php echo $this->render('layout/footer.htm',NULL,get_defined_vars(),0); ?>