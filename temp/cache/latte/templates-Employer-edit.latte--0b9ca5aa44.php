<?php
// source: C:\xampp\htdocs\cviceni06b\app\presenters/templates/Employer/edit.latte

use Latte\Runtime as LR;

class Template0b9ca5aa44 extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
		?><h1>Editace zaměstnance <?php echo LR\Filters::escapeHtmlText($name) /* line 1 */ ?></h1>
<p>
<a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link("default")) ?>">Zpět</a>
</p>

<?php
		/* line 6 */ $_tmp = $this->global->uiControl->getComponent("editForm");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(NULL, FALSE);
		$_tmp->render();
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}

}
