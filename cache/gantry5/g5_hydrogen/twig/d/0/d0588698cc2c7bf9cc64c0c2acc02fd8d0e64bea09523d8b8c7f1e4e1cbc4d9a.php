<?php

/* @particles/module.html.twig */
class __TwigTemplate_e5dbf8f4fe87599536cdcd6a8fb458b257433b554ba6355edec93392bdd8fd61 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@nucleus/partials/particle.html.twig", "@particles/module.html.twig", 1);
        $this->blocks = array(
            'particle' => array($this, 'block_particle'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@nucleus/partials/particle.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_particle($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        echo $this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "platform", array()), "displayModule", array(0 => $this->getAttribute((isset($context["particle"]) ? $context["particle"] : null), "module_id", array()), 1 => array("style" => (($this->getAttribute((isset($context["particle"]) ? $context["particle"] : null), "chrome", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["particle"]) ? $context["particle"] : null), "chrome", array()), "gantry")) : ("gantry")), "position" => "particle")), "method");
        echo "
";
    }

    public function getTemplateName()
    {
        return "@particles/module.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends '@nucleus/partials/particle.html.twig' %}*/
/* */
/* {% block particle %}*/
/*     {{ gantry.platform.displayModule(particle.module_id, {'style': particle.chrome|default('gantry'), 'position': 'particle'})|raw }}*/
/* {% endblock %}*/
/* */
