<?php
// source: C:\xampp1\htdocs\TULBook\app/templates/Registration/default.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('3592094611', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lba0ad5d17ab_content')) { function _lba0ad5d17ab_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;Nette\Bridges\FormsLatte\FormMacros::renderFormBegin($form = $_form = $_control["registrationForm"], array()) ;if ($form->ownErrors) { ?>    <div class="msg msg-error" >
<?php $iterations = 0; foreach ($form->ownErrors as $error) { ?>        <p><?php echo Latte\Runtime\Filters::escapeHtml($error, ENT_NOQUOTES) ?></p>
<?php $iterations++; } ?>
    </div>
<?php } ?>
    <table>
        <tr>
            <td> <?php if ($_label = $_form["jmeno"]->getLabel()) echo $_label  ?></td>
            <td><?php echo $_form["jmeno"]->getControl() ?></td>
        </tr>
        <tr>
            <td><?php if ($_label = $_form["prijmeni"]->getLabel()) echo $_label  ?> </td>
            <td><?php echo $_form["prijmeni"]->getControl() ?></td>
        </tr>
        <tr>
            <td><?php if ($_label = $_form["email"]->getLabel()) echo $_label  ?> </td>
            <td><?php echo $_form["email"]->getControl() ?></td>
        </tr>
         <tr>
            <td><?php if ($_label = $_form["heslo"]->getLabel()) echo $_label  ?> </td>
            <td><?php echo $_form["heslo"]->getControl() ?></td>
        </tr>
        <tr>
            <td><?php if ($_label = $_form["prezdivka"]->getLabel()) echo $_label  ?> </td>
            <td><?php echo $_form["prezdivka"]->getControl() ?></td>
        </tr>
        <tr>
            <td><?php if ($_label = $_form["vek"]->getLabel()) echo $_label  ?> </td>
            <td><?php echo $_form["vek"]->getControl() ?></td>
        </tr>
        <tr><td colspan="2" align="center">Kontaktní údaje</td></tr>
        <tr>
            <td><?php if ($_label = $_form["telefon"]->getLabel()) echo $_label  ?> </td>
            <td><?php echo $_form["telefon"]->getControl() ?></td>
        </tr>
        <tr>
            <td><?php if ($_label = $_form["mesto"]->getLabel()) echo $_label  ?> </td>
            <td><?php echo $_form["mesto"]->getControl() ?></td>
        </tr>
        <tr>
            <td><?php if ($_label = $_form["ulice"]->getLabel()) echo $_label  ?> </td>
            <td><?php echo $_form["ulice"]->getControl() ?></td>
        </tr>
        <tr>
            <td><?php if ($_label = $_form["cp"]->getLabel()) echo $_label  ?> </td>
            <td><?php echo $_form["cp"]->getControl() ?></td>
        </tr>
        <tr><td colspan="2" align="center">Informace o ubytování na pokoji</td></tr>
        <tr>
            <td><?php if ($_label = $_form["budova"]->getLabel()) echo $_label  ?> </td>
            <td><?php echo $_form["budova"]->getControl() ?></td>
        </tr>
        <td><?php if ($_label = $_form["patro"]->getLabel()) echo $_label  ?> </td>
        <td><?php echo $_form["patro"]->getControl() ?></td>
    </tr>
    <tr>
        <td><?php if ($_label = $_form["pokoj"]->getLabel()) echo $_label  ?> </td>
        <td><?php echo $_form["pokoj"]->getControl() ?></td>
    </tr>
    <tr>
        <td><?php if ($_label = $_form["tel_cislo"]->getLabel()) echo $_label  ?> </td>
        <td><?php echo $_form["tel_cislo"]->getControl() ?></td>
    </tr>
    <tr>
        <td><?php if ($_label = $_form["send"]->getLabel()) echo $_label  ?> </td>
        <td><?php echo $_form["send"]->getControl() ?></td>
    </tr>
</table>
<?php Nette\Bridges\FormsLatte\FormMacros::renderFormEnd($_form) ;
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