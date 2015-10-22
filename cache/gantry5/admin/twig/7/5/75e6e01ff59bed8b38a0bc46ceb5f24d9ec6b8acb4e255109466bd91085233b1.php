<?php

/* forms/fields/gantry/module.html.twig */
class __TwigTemplate_18e00fcf4c0d2b2205064ec8efefbc20f0f0e95a05dacfb0413fa1f2b8c8e3fd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'input' => array($this, 'block_input'),
        );
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return $this->loadTemplate((((isset($context["default"]) ? $context["default"] : null)) ? ("partials/field.html.twig") : ((("forms/" . ((array_key_exists("layout", $context)) ? (_twig_default_filter((isset($context["layout"]) ? $context["layout"] : null), "field")) : ("field"))) . ".html.twig"))), "forms/fields/gantry/module.html.twig", 1);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_input($context, array $blocks = array())
    {
        // line 4
        echo "    <input
            type=\"text\"
            name=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->fieldNameFilter(((isset($context["scope"]) ? $context["scope"] : null) . (isset($context["name"]) ? $context["name"] : null))));
        echo "\"
            value=\"";
        // line 7
        echo twig_escape_filter($this->env, twig_join_filter((isset($context["value"]) ? $context["value"] : null), ", "));
        echo "\"
            ";
        // line 9
        echo "            ";
        $this->displayBlock("global_attributes", $context, $blocks);
        echo "
            ";
        // line 11
        echo "            ";
        if ($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "pattern", array(), "any", true, true)) {
            echo "pattern=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "pattern", array()));
            echo "\"";
        }
        // line 12
        echo "            ";
        if (twig_in_filter($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "disabled", array()), array(0 => "on", 1 => "true", 2 => 1))) {
            echo "disabled=\"disabled\"";
        }
        // line 13
        echo "            ";
        if (twig_in_filter($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "required", array()), array(0 => "on", 1 => "true", 2 => 1))) {
            echo "required=\"required\"";
        }
        // line 14
        echo "            />
    <span class=\"button\" data-g-instancepicker=\"";
        // line 15
        echo twig_escape_filter($this->env, twig_jsonencode_filter(array("type" => "module", "return" => true, "field" => twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->fieldNameFilter(((isset($context["scope"]) ? $context["scope"] : null) . (isset($context["name"]) ? $context["name"] : null)))))), "html_attr");
        echo "\">";
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "picker_label", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "picker_label", array()), "Pick a Module")) : ("Pick a Module")), "html", null, true);
        echo "</span>
";
    }

    public function getTemplateName()
    {
        return "forms/fields/gantry/module.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 15,  64 => 14,  59 => 13,  54 => 12,  47 => 11,  42 => 9,  38 => 7,  34 => 6,  30 => 4,  27 => 3,  18 => 1,);
    }
}
/* {% extends default ? "partials/field.html.twig" : 'forms/' ~ layout|default('field') ~ '.html.twig' %}*/
/* */
/* {% block input %}*/
/*     <input*/
/*             type="text"*/
/*             name="{{ (scope ~ name)|fieldName|e }}"*/
/*             value="{{ value|join(', ')|e }}"*/
/*             {# global attribute structures #}*/
/*             {{ block('global_attributes') }}*/
/*             {# non-gloval attribute structures #}*/
/*             {% if field.pattern is defined %}pattern="{{ field.pattern|e }}"{% endif %}*/
/*             {% if field.disabled in ['on', 'true', 1] %}disabled="disabled"{% endif %}*/
/*             {% if field.required in ['on', 'true', 1] %}required="required"{% endif %}*/
/*             />*/
/*     <span class="button" data-g-instancepicker="{{ { type: 'module', return: true, field: (scope ~ name)|fieldName|e }|json_encode|e('html_attr') }}">{{ field.picker_label|default('Pick a Module') }}</span>*/
/* {% endblock %}*/
/* */
