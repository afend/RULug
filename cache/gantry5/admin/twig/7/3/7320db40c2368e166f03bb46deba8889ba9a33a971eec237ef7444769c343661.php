<?php

/* @gantry-admin/pages/configurations/layouts/section.html.twig */
class __TwigTemplate_5735f5ce386d4b2f88de871da7ee02825cd5673ecacdf4646e53927925be6d7b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'gantry' => array($this, 'block_gantry'),
        );
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return $this->loadTemplate(((((isset($context["ajax"]) ? $context["ajax"] : null) - (isset($context["suffix"]) ? $context["suffix"] : null))) ? ("@gantry-admin/partials/ajax.html.twig") : ("@gantry-admin/partials/base.html.twig")), "@gantry-admin/pages/configurations/layouts/section.html.twig", 1);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_gantry($context, array $blocks = array())
    {
        // line 4
        echo "<form method=\"post\" action=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "route", array(0 => (isset($context["action"]) ? $context["action"] : null)), "method"), "html", null, true);
        echo "\">
    <div class=\"g-tabs\" role=\"tablist\">
        <ul>
            <li class=\"active\"><a href=\"#\" id=\"g-switcher-platforms-tab\" role=\"presentation\" aria-controls=\"g-switcher-platforms\" role=\"tab\" aria-expanded=\"true\">";
        // line 7
        echo twig_escape_filter($this->env, trim($this->getAttribute((isset($context["particle"]) ? $context["particle"] : null), "name", array())));
        echo "</a></li>
            ";
        // line 8
        if ((isset($context["extra"]) ? $context["extra"] : null)) {
            // line 9
            echo "            <li><a href=\"#\" id=\"g-settings-block-tab\" role=\"presentation\" aria-controls=\"g-settings-block\" role=\"tab\" aria-expanded=\"false\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_BLOCK"), "html", null, true);
            echo "</a></li>
            ";
        }
        // line 11
        echo "        </ul>
    </div>

    <div class=\"g-panes\">
        <div class=\"g-pane active\" role=\"tabpanel\" id=\"g-settings-particle\" aria-labelledby=\"g-settings-particle-tab\" aria-expanded=\"true\">
            <div class=\"card settings-block\">
                <h4>
                    ";
        // line 18
        echo twig_escape_filter($this->env, trim($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "title", array())));
        echo "
                </h4>

                <div class=\"inner-params\">
                    ";
        // line 22
        $this->loadTemplate("forms/fields.html.twig", "@gantry-admin/pages/configurations/layouts/section.html.twig", 22)->display(array_merge($context, array("overrideable" => false, "blueprints" => $this->getAttribute((isset($context["particle"]) ? $context["particle"] : null), "form", array()))));
        // line 23
        echo "                </div>
            </div>
        </div>

        ";
        // line 27
        if ((isset($context["extra"]) ? $context["extra"] : null)) {
            // line 28
            echo "        <div class=\"g-pane\" role=\"tabpanel\" id=\"g-settings-block\" aria-labelledby=\"g-settings-block-tab\" aria-expanded=\"false\">
            <div class=\"card settings-block\">
                <h4>
                    ";
            // line 31
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_BLOCK"), "html", null, true);
            echo "
                </h4>
                <div class=\"inner-params\">
                    ";
            // line 34
            $this->loadTemplate("forms/fields.html.twig", "@gantry-admin/pages/configurations/layouts/section.html.twig", 34)->display(array_merge($context, array("blueprints" => $this->getAttribute((isset($context["extra"]) ? $context["extra"] : null), "form", array()), "data" => array("block" => $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "block", array())), "prefix" => "block.")));
            // line 35
            echo "                </div>
            </div>
        </div>
        ";
        }
        // line 39
        echo "    </div>

    <div class=\"g-modal-actions\">
        <button class=\"button button-primary\" type=\"submit\">";
        // line 42
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_APPLY"), "html", null, true);
        echo "</button>
        <button class=\"button button-primary\" data-apply-and-save>";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_APPLY_SAVE"), "html", null, true);
        echo "</button>
        <button class=\"button g5-dialog-close\">";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_CANCEL"), "html", null, true);
        echo "</button>
    </div>
</form>
";
    }

    public function getTemplateName()
    {
        return "@gantry-admin/pages/configurations/layouts/section.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 44,  103 => 43,  99 => 42,  94 => 39,  88 => 35,  86 => 34,  80 => 31,  75 => 28,  73 => 27,  67 => 23,  65 => 22,  58 => 18,  49 => 11,  43 => 9,  41 => 8,  37 => 7,  30 => 4,  27 => 3,  18 => 1,);
    }
}
/* {% extends ajax-suffix ? "@gantry-admin/partials/ajax.html.twig" : "@gantry-admin/partials/base.html.twig" %}*/
/* */
/* {% block gantry %}*/
/* <form method="post" action="{{ gantry.route(action) }}">*/
/*     <div class="g-tabs" role="tablist">*/
/*         <ul>*/
/*             <li class="active"><a href="#" id="g-switcher-platforms-tab" role="presentation" aria-controls="g-switcher-platforms" role="tab" aria-expanded="true">{{ particle.name|trim|e }}</a></li>*/
/*             {% if extra %}*/
/*             <li><a href="#" id="g-settings-block-tab" role="presentation" aria-controls="g-settings-block" role="tab" aria-expanded="false">{{ 'GANTRY5_PLATFORM_BLOCK'|trans }}</a></li>*/
/*             {% endif %}*/
/*         </ul>*/
/*     </div>*/
/* */
/*     <div class="g-panes">*/
/*         <div class="g-pane active" role="tabpanel" id="g-settings-particle" aria-labelledby="g-settings-particle-tab" aria-expanded="true">*/
/*             <div class="card settings-block">*/
/*                 <h4>*/
/*                     {{ item.title|trim|e }}*/
/*                 </h4>*/
/* */
/*                 <div class="inner-params">*/
/*                     {% include 'forms/fields.html.twig' with {'overrideable': false, 'blueprints': particle.form} %}*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/* */
/*         {% if extra %}*/
/*         <div class="g-pane" role="tabpanel" id="g-settings-block" aria-labelledby="g-settings-block-tab" aria-expanded="false">*/
/*             <div class="card settings-block">*/
/*                 <h4>*/
/*                     {{ 'GANTRY5_PLATFORM_BLOCK'|trans }}*/
/*                 </h4>*/
/*                 <div class="inner-params">*/
/*                     {% include 'forms/fields.html.twig' with {'blueprints': extra.form, 'data': {'block': item.block}, 'prefix': 'block.'} %}*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/*         {% endif %}*/
/*     </div>*/
/* */
/*     <div class="g-modal-actions">*/
/*         <button class="button button-primary" type="submit">{{ 'GANTRY5_PLATFORM_APPLY'|trans }}</button>*/
/*         <button class="button button-primary" data-apply-and-save>{{ 'GANTRY5_PLATFORM_APPLY_SAVE'|trans }}</button>*/
/*         <button class="button g5-dialog-close">{{ 'GANTRY5_PLATFORM_CANCEL'|trans }}</button>*/
/*     </div>*/
/* </form>*/
/* {% endblock %}*/
/* */
