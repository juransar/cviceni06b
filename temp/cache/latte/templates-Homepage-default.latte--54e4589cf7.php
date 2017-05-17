<?php
// source: C:\xampp\htdocs\cviceni06b\app\presenters/templates/Homepage/default.latte

use Latte\Runtime as LR;

class Template54e4589cf7 extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
		'title' => 'blockTitle',
		'css' => 'blockCss',
	];

	public $blockTypes = [
		'content' => 'html',
		'title' => 'html',
		'css' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('content', get_defined_vars());
?>

<?php
		$this->renderBlock('css', get_defined_vars());
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
	<div id="banner">
<?php
		$this->renderBlock('title', get_defined_vars());
?>
	</div>

	<div id="content">
		<h2>Dokončit cvičení.</h2>
		<hr>
		<ul class="nav nav-pills">
			<li role="presentation"><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link("Employer:default")) ?>">Zaměstnanci</a></li>
			<li role="presentation"><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link("Pid:default")) ?>">Rodná čísla</a></li>
			<li role="presentation"><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link("Company:default")) ?>">Firmy</a></li>
			<li role="presentation"><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link("Statistic:default")) ?>">Statistiky</a></li>
			<li role="presentation" class="active"><a href="#">Menu</a></li>
		</ul>
	</div>
<?php
	}


	function blockTitle($_args)
	{
		extract($_args);
?>		<h1>Cvičení 4b</h1>
<?php
	}


	function blockCss($_args)
	{
		extract($_args);
?>
	<style>
		html {
			overflow-y: scroll;
		}

		body {
			font: 14px/1.65 Verdana, "Geneva CE", lucida, sans-serif;
			background: #3484d2;
			color: #333;
			margin: 38px auto;
		}

		h1, h2 {
			font: normal 150%/1.3 Georgia, "New York CE", utopia, serif;
			color: #1e5eb6;
			-webkit-text-stroke: 1px rgba(0, 0, 0, 0);
		}

		img {
			border: none;
		}

		a {
			color: #006aeb;
			padding: 3px 1px;
		}

		a:hover, a:active, a:focus {
			background-color: #006aeb;
			text-decoration: none;
			color: white;
		}

		#banner {
			border-radius: 12px 12px 0 0;
			background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAB5CAMAAADPursXAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAGBQTFRFD1CRDkqFDTlmDkF1D06NDT1tDTNZDk2KEFWaDTZgDkiCDTtpDT5wDkZ/DTBVEFacEFOWD1KUDTRcDTFWDkV9DkR7DkN4DkByDTVeDC9TDThjDTxrDkeADkuIDTRbDC9SbsUaggAAAEdJREFUeNqkwYURgAAQA7DH3d3335LSKyxAYpf9vWCpnYbf01qcOdFVXc14w4BznNTjkQfsscAdU3b4wIh9fDVYc4zV8xZgAAYaCMI6vPgLAAAAAElFTkSuQmCC);
		}

		#banner h1 {
			color: white;
			font-size: 50px;
			line-height: 121px;
			margin: 0;
			padding-left: 4%;
			background: url(data:image/png;base64,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) no-repeat 95%;
			text-shadow: 1px 1px 0 rgba(0, 0, 0, .9);
		}

		@media (max-width: 600px) {
			#banner h1 {
				background: none;
			}
		}

		#content {
			background: white;
			border: 1px solid #eff4f7;
			border-radius: 0 0 12px 12px;
			padding: 10px 4%;
			overflow: hidden;
		}

		#content > h2 {
			font-size: 130%;
			color: #666;
			clear: both;
			padding: 1.2em 0;
			margin: 0;
		}

		h2 span {
			color: #87A7D5;
		}

		h2 a {
			text-decoration: none;
			background: transparent;
		}
	</style>
<?php
	}

}
