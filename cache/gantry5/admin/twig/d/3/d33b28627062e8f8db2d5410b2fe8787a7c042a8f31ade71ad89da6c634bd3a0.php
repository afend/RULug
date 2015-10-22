<?php

/* @gantry-admin/modals/module-picker.html.twig */
class __TwigTemplate_6df8155ae5a509e59ae31caca1f405202d94f836ad0238e4b24bebda8484bb42 extends Twig_Template
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
        // line 5
        echo "<div data-mm-particle-stepone=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "route", array(0 => "menu/particle"), "method"), "html", null, true);
        echo "\" class=\"menu-editor-extras\">
    <div class=\"card settings-block\">
        <h4>
            ";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_PICK_MODULE"), "html", null, true);
        echo "
        </h4>
        <div class=\"inner-params\">
            <div class=\"g5-mm-modules-picker menu-editor-modules\">
                <div class=\"search\">
                    <input type=\"text\" placeholder=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_SEARCH_ELI"), "html", null, true);
        echo "\" />
                    <i class=\"fa fa-search\"></i>
                </div>
                <div class=\"modules-wrapper\">
                    <ul>
                        ";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "platform", array()), "listModules", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
            // line 19
            echo "                        <li data-mm-module=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["module"], "id", array()), "html", null, true);
            echo "\" data-mm-type=\"module\">
                            <span class=\"module-infos\">
                                <span class=\"g-tooltip g-tooltip-right g-tooltip-bottom\" data-title=\"";
            // line 21
            echo twig_escape_filter($this->env, (((($this->getAttribute($context["module"], "enabled", array())) ? ("Published") : ("Unpublished")) . " / ") . $this->getAttribute($context["module"], "access", array())), "html", null, true);
            echo "\"><i class=\"fa fa-fw fa-";
            echo (($this->getAttribute($context["module"], "enabled", array())) ? ("toggle-on") : ("toggle-off"));
            echo "\"></i></span>
                            </span>
                            <span class=\"module-wrapper\">
                                <span class=\"title\" data-mm-title=\"";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute($context["module"], "title", array()), "html", null, true);
            echo "\" data-mm-filter=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["module"], "title", array()));
            echo "\">
                                    ";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($context["module"], "title", array()), "html", null, true);
            echo "
                                </span>
                                <span class=\"sub-title font-small\" data-mm-filter=\"";
            // line 27
            echo twig_escape_filter($this->env, (($this->getAttribute($context["module"], "module", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["module"], "module", array()), "none")) : ("none")));
            echo "\"><strong>";
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_TYPE"), "html", null, true);
            echo "</strong>: ";
            echo twig_escape_filter($this->env, (($this->getAttribute($context["module"], "module", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["module"], "module", array()), "none")) : ("none")), "html", null, true);
            echo "</span>
                                <span class=\"sub-title font-small\"><strong>";
            // line 28
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_POSITION"), "html", null, true);
            echo "</strong>: ";
            echo twig_escape_filter($this->env, (($this->getAttribute($context["module"], "position", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["module"], "position", array()), "none")) : ("none")), "html", null, true);
            echo "</span>
                            </span>
                        </li>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        echo "                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class=\"g-modal-actions\">
        ";
        // line 39
        echo "        <button class=\"button button-primary\" type=\"submit\" data-mm-select disabled>";
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_SELECT"), "html", null, true);
        echo "</button>
        <button class=\"button g5-dialog-close\">";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_CANCEL"), "html", null, true);
        echo "</button>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@gantry-admin/modals/module-picker.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  104 => 40,  99 => 39,  91 => 32,  79 => 28,  71 => 27,  66 => 25,  60 => 24,  52 => 21,  46 => 19,  42 => 18,  34 => 13,  26 => 8,  19 => 5,);
    }
}
/* {# Available variables:*/
/* */
/* module.[id | title | position | enabled | access]*/
/* #}*/
/* <div data-mm-particle-stepone="{{ gantry.route('menu/particle') }}" class="menu-editor-extras">*/
/*     <div class="card settings-block">*/
/*         <h4>*/
/*             {{ 'GANTRY5_PLATFORM_PICK_MODULE'|trans }}*/
/*         </h4>*/
/*         <div class="inner-params">*/
/*             <div class="g5-mm-modules-picker menu-editor-modules">*/
/*                 <div class="search">*/
/*                     <input type="text" placeholder="{{ 'GANTRY5_PLATFORM_SEARCH_ELI'|trans }}" />*/
/*                     <i class="fa fa-search"></i>*/
/*                 </div>*/
/*                 <div class="modules-wrapper">*/
/*                     <ul>*/
/*                         {% for module in gantry.platform.listModules %}*/
/*                         <li data-mm-module="{{ module.id }}" data-mm-type="module">*/
/*                             <span class="module-infos">*/
/*                                 <span class="g-tooltip g-tooltip-right g-tooltip-bottom" data-title="{{ (module.enabled ? 'Published' : 'Unpublished') ~ ' / ' ~ module.access }}"><i class="fa fa-fw fa-{{ module.enabled ? 'toggle-on' : 'toggle-off' }}"></i></span>*/
/*                             </span>*/
/*                             <span class="module-wrapper">*/
/*                                 <span class="title" data-mm-title="{{ module.title }}" data-mm-filter="{{ module.title|e }}">*/
/*                                     {{ module.title }}*/
/*                                 </span>*/
/*                                 <span class="sub-title font-small" data-mm-filter="{{ module.module|default('none')|e }}"><strong>{{ 'GANTRY5_PLATFORM_TYPE'|trans }}</strong>: {{ module.module|default('none') }}</span>*/
/*                                 <span class="sub-title font-small"><strong>{{ 'GANTRY5_PLATFORM_POSITION'|trans }}</strong>: {{ module.position|default('none') }}</span>*/
/*                             </span>*/
/*                         </li>*/
/*                         {% endfor %}*/
/*                     </ul>*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/*     <div class="g-modal-actions">*/
/*         {#<a class="button float-left">{{ 'GANTRY5_PLATFORM_DEFAULTS'|trans }}</a>#}*/
/*         <button class="button button-primary" type="submit" data-mm-select disabled>{{ 'GANTRY5_PLATFORM_SELECT'|trans }}</button>*/
/*         <button class="button g5-dialog-close">{{ 'GANTRY5_PLATFORM_CANCEL'|trans }}</button>*/
/*     </div>*/
/* </div>*/
/* */
