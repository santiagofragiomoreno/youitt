    
<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use dmstr\web\AdminLteAsset;
/* @var $this \yii\web\View */
/* @var $content string */
AdminLteAsset::register($this);
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $cookies = Yii::$app->request->cookies; ?>
    	<?php if (($cookie = $cookies->get('language')) !== null): ?>
    		<?php $language = $cookie->value; ?>
    		<?php Yii::$app->language = $language ?>
    	<?php endif;?>
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="<?= \dmstr\helpers\AdminLteHelper::skinClass() ?>">
    <?php $this->beginBody() ?>
	    <header class="main-header">
		<!-- Logo -->
		<a href="<?= Url::toRoute(['/']) ?>" class="logo"> 
			<!-- mini logo for sidebar mini 50x50 pixels -->
			<span class="logo-mini"><b>Z</b></span>
			<!-- logo for regular state and mobile devices -->
			<span class="logo-lg"><img src="/images/logo.png" alt="Logo"></span>
		</a>
		<!-- Header Navbar: style can be found in header.less -->
		<nav class="navbar navbar-static-top">
			<!-- Sidebar toggle button-->
			

			
			

			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
					<!-- User Account: style can be found in dropdown.less -->
					<li class="dropdown user user-menu">
						<a href="#"	class="dropdown-toggle" data-toggle="dropdown">
							<img src="/images/logo.png" class="user-image" alt="User Image">
							<span class="hidden-xs"></span>
					</a>
						<ul class="dropdown-menu">
							<!-- User image -->
							<li class="user-header">
								<img src="/images/logo.png" class="img-circle" alt="User Image">
								<p><?= (!Yii::$app->user->isGuest)?Yii::$app->user->identity->username. ' santi' :'<em>Guest</em>' ?></p>
							</li>
							<!-- Menu Footer-->
							<li class="user-footer">
								<div class="pull-left">
									<?= Html::a('Perfil', ['site/login'], ['class' => 'btn btn-default btn-flat']) ?>
								</div>
								<div class="pull-right">
									<?= Html::a('Cerrar Sesión', ['site/logout'], ['class' => 'btn btn-default btn-flat', 'data' => ['method' => 'post']]) ?>
								</div>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
	</header>

	<!-- Left side column. contains the logo and sidebar -->
	<aside class="main-sidebar">
		<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar">
			<!-- Sidebar user panel -->
			<div class="user-panel">
				<div class="pull-left image">
					<img src="/images/logo.png" class="img-circle" alt="User Image">
				</div>
				<div class="pull-left info">
					<p><?= (!Yii::$app->user->isGuest)?Yii::$app->user->identity->username:'<em>Guest</em>' ?></p>
					<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
				</div>
				<div class="pull-left flag">
					<?= Html::a('<img src="/images/uk-flag.png" alt="en" class="icon-flag">', ['/site/language', 'language' => 'en']) ?>
					<?= Html::a('<img src="/images/es-flag.png" alt="es" class="icon-flag">', ['/site/language', 'language' => 'es']) ?>
				</div>
				<div class="pull-left flag">
					
					 
				</div>	
			</div>
			
			<!-- search form -->
			<form action="#" method="get" class="sidebar-form">
				<div class="input-group">
					<input type="text" name="q" class="form-control"  placeholder=<?= Yii::t('backend', 'Search...') ?>>
					<span class="input-group-btn">
						<button type="submit" name="search" id="search-btn"	class="btn btn-flat">
							<i class="fa fa-search"></i>
						</button>
					</span>
				</div>
			</form>
			<!-- /.search form -->
			<!-- sidebar menu: : style can be found in sidebar.less -->
			<ul class="sidebar-menu" data-widget="tree">
				<li class="header"><?= Yii::t('backend', 'CONTROL PANEL') ?></li>
				<li>
					<a href="<?= Url::toRoute(['/']) ?>"><i class="fa fa-dashboard"></i> <span><?= Yii::t('backend', 'Dashboard') ?></span></a>
				</li>
				<li class="treeview">
    				<a href='#'><i class="fa fa-building"></i> <span> <?= Yii::t('backend', 'Clients') ?></span><i class="fa fa-angle-left pull-right"></i></a>
    				<ul class="treeview-menu" style="display:none;">
						<li>
							<a href="<?= Url::toRoute(['/client/index']) ?>"><?= Yii::t('backend', 'Clients') ?></a>
						</li>
						<li>
							<a href="<?= Url::toRoute(['client-products/index']) ?>"><?= Yii::t('backend', 'Clients Products') ?></a>
						</li>
						<li>
							<a href="<?= Url::toRoute(['/uses']) ?>">uso</a>
						</li>
					</ul>
    			</li>
				<li>
					<a href="<?= Url::toRoute(['/guest']) ?>"><i class="fa fa-user"></i> <span><?= Yii::t('backend', 'Companys') ?></span></a>
				</li>
				
				<li class="treeview">
    				<a href='#'><i class="fa fa-bar-chart"></i> <span>Productos </span><i class="fa fa-angle-left pull-right"></i></a>
    				<ul class="treeview-menu" style="display:none;">
    					<li>
    						<a href="<?= Url::toRoute(['/productos/index'])?>">Ver productos</a>
    					</li>
    				</ul>
    			</li>
				<li class="treeview">
    				<a href='#'><i class="fa fa-map-marker"></i> <span>gps </span><i class="fa fa-angle-left pull-right"></i></a>
    				<ul class="treeview-menu" style="display:none;">
    					
    				</ul>
    			</li>
			</ul>
		</section>
		<!-- /.sidebar -->
	</aside>



	<div class="wrap">

		<div class="container">
        <?=Breadcrumbs::widget ( [ 'links' => isset ( $this->params ['breadcrumbs'] ) ? $this->params ['breadcrumbs'] : [ ] ] )?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
	</div>

    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>