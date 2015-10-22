<?php

/* @gantry-admin/ajax/unsaved.html.twig */
class __TwigTemplate_72b00dff477a4a1966ce0e0aa1c0bf49143a29fa04b230a81ea0ce2d014352fe extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"card settings-block\">
    <h4 id=\"g-modal-labelledby\">";
        // line 2
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_UNSAVED"), "html", null, true);
        echo "</h4>
    <div id=\"g-modal-describedby\" class=\"inner-params\">
        ";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_UNSAVED_DESC"), "html", null, true);
        echo "
    </div>
</div>

<div class=\"g-modal-actions\">
    <button tabindex=\"0\" class=\"button button-primary\" role=\"button\" data-g-unsaved-save>";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_UNSAVED_SAVE"), "html", null, true);
        echo "</button>
    <button tabindex=\"0\" class=\"button g5-dialog-close\" role=\"button\" data-g-unsaved-discard>";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_UNSAVED_DISCARD"), "html", null, true);
        echo "</button>
    <button tabindex=\"0\" class=\"button g5-dialog-close\" role=\"button\" data-g-unsaved-stay>";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_UNSAVED_STAY"), "html", null, true);
        echo "</button>
</div>
";
    }

    public function getTemplateName()
    {
        return "@gantry-admin/ajax/unsaved.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 11,  39 => 10,  35 => 9,  27 => 4,  22 => 2,  19 => 1,);
    }
}
/* <div class="card settings-block">*/
/*     <h4 id="g-modal-labelledby">{{ 'GANTRY5_PLATFORM_UNSAVED'|trans }}</h4>*/
/*     <div id="g-modal-describedby" class="inner-params">*/
/*         {{ 'GANTRY5_PLATFORM_UNSAVED_DESC'|trans }}*/
/*     </div>*/
/* </div>*/
/* */
/* <div class="g-modal-actions">*/
/*     <button tabindex="0" class="button button-primary" role="button" data-g-unsaved-save>{{ 'GANTRY5_PLATFORM_UNSAVED_SAVE'|trans }}</button>*/
/*     <button tabindex="0" class="button g5-dialog-close" role="button" data-g-unsaved-discard>{{ 'GANTRY5_PLATFORM_UNSAVED_DISCARD'|trans }}</button>*/
/*     <button tabindex="0" class="button g5-dialog-close" role="button" data-g-unsaved-stay>{{ 'GANTRY5_PLATFORM_UNSAVED_STAY'|trans }}</button>*/
/* </div>*/
/* */
