<?php

/* @particles/branding.html.twig */
class __TwigTemplate_df651ddb2e819a013f8e3bc2193bfb7c401093d87ec634d02683720a04e3b6a6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@nucleus/partials/particle.html.twig", "@particles/branding.html.twig", 1);
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
        echo "<div class=\"g-branding ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["particle"]) ? $context["particle"] : null), "css", array()), "class", array()), "html", null, true);
        echo "\">
    ";
        // line 5
        echo $this->getAttribute((isset($context["particle"]) ? $context["particle"] : null), "content", array());
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "@particles/branding.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends '@nucleus/partials/particle.html.twig' %}*/
/* */
/* {% block particle %}*/
/* <div class="g-branding {{ particle.css.class }}">*/
/*     {{ particle.content|raw }}*/
/* </div>*/
/* {% endblock %}*/
/* */
