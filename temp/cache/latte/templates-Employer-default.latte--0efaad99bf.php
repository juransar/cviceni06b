<?php
// source: C:\xampp\htdocs\cviceni06b\app\presenters/templates/Employer/default.latte

use Latte\Runtime as LR;

class Template0efaad99bf extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
	];

	public $blockTypes = [
		'content' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('content', get_defined_vars());
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

<h1>Zaměstnanci</h1>
<hr>
<ul class="nav nav-pills">
    <li role="presentation" class="active"><a href="#">Zaměstnanci</a></li>
    <li role="presentation"><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link("Pid:default")) ?>">Rodná čísla</a></li>
    <li role="presentation"><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link("Company:default")) ?>">Firmy</a></li>
    <li role="presentation"><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link("Statistic:default")) ?>">Statistiky</a></li>
    <li role="presentation"><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link("Homepage:default")) ?>">Menu</a></li>
</ul>

<div style="text-align: right">
    <a class="btn btn-success" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link("add")) ?>">Vytvoř</a>
</div>

<?php
		/* line 17 */ $_tmp = $this->global->uiControl->getComponent("employerGrid");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(NULL, FALSE);
		$_tmp->render();
		
	}

}
