<?php
// source: C:\xampp1\htdocs\TULBook\app/templates/Homepage/default.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('3422314305', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb9f92ba561f_content')) { function _lb9f92ba561f_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;call_user_func(reset($_b->blocks['title']), $_b, get_defined_vars())  ?>
<a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Registration:"), ENT_COMPAT) ?>
">Zaregistruj se</a>
<a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Sign:"), ENT_COMPAT) ?>
">Přihlásit se</a>
   <h1>Nette FacebookConnect</h1>

<?php
}}

//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lbca707020df_title')) { function _lbca707020df_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><h1>TULBook</h1>
<?php
}}

//
// end of blocks
//

// template extending

$_l->extends = empty($_g->extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $_g->extended = TRUE;

if ($_l->extends) { ob_start();}

// prolog Nette\Bridges\ApplicationLatte\UIMacros

// snippets support
if (empty($_l->extends) && !empty($_control->snippetMode)) {
	return Nette\Bridges\ApplicationLatte\UIMacros::renderSnippets($_control, $_b, get_defined_vars());
}

//
// main template
//
if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; 