<?php

/* @gantry-admin/pages/configurations/assignments/assignments.html.twig */
class __TwigTemplate_c415d6f35e03ab30aa0b6c0fb4f9f17dc3113629f169e98e924c800ab2642538 extends Twig_Template
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
        return $this->loadTemplate(((((isset($context["ajax"]) ? $context["ajax"] : null) - (isset($context["suffix"]) ? $context["suffix"] : null))) ? ("@gantry-admin/partials/ajax.html.twig") : ("@gantry-admin/partials/base.html.twig")), "@gantry-admin/pages/configurations/assignments/assignments.html.twig", 1);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_gantry($context, array $blocks = array())
    {
        // line 4
        echo "<div id=\"assignments\">
    ";
        // line 5
        if ((isset($context["assignments"]) ? $context["assignments"] : null)) {
            // line 6
            echo "    <form method=\"post\">
        <span class=\"float-right\">
            <button type=\"submit\" class=\"button button-primary button-save\" data-save=\"";
            // line 8
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_ASSIGNMENTS"), "html", null, true);
            echo "\"><i class=\"fa fa-fw fa-check\"></i> <span>";
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_SAVE_ASSIGNMENTS"), "html", null, true);
            echo "</span></button>
        </span>

        <h2 class=\"page-title\">";
            // line 11
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_ASSIGNMENTS"), "html", null, true);
            echo "</h2>

        <div class=\"g-filters-bar\">
            <div class=\"g-panel-filters\" data-g-global-filter>
                <div class=\"search settings-block\">
                    <input type=\"text\" placeholder=\"";
            // line 16
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_GLOBAL_FILTER_ELI"), "html", null, true);
            echo "\" aria-label=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_GLOBAL_FILTER_ELI"), "html", null, true);
            echo "\" role=\"search\">
                    <i class=\"fa fa-fw fa-search\"></i>
                </div>
                <span data-g-assignments-uncheck data-role=\"button\" class=\"g-tooltip g-tooltip-right\" tabindex=\"0\" data-title=\"";
            // line 19
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_UNSELECT_ALL_MENU"), "html", null, true);
            echo "\" aria-label=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_UNSELECT_ALL_MENU"), "html", null, true);
            echo "\"><i class=\"fa fa-fw fa-toggle-off\"></i></span>
                <span data-g-assignments-check data-role=\"button\" class=\"g-tooltip g-tooltip-right\" tabindex=\"0\" data-title=\"";
            // line 20
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_SELECT_ALL_MENU"), "html", null, true);
            echo "\"  aria-label=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_SELECT_ALL_MENU"), "html", null, true);
            echo "\"><i class=\"fa fa-fw fa-toggle-on\"></i></span>
            </div>
            <label>
                <input type=\"checkbox\" data-assignments-enabledonly /> ";
            // line 23
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_HIDE_ASSIGNMENTS"), "html", null, true);
            echo "
            </label>

            ";
            // line 26
            if ((isset($context["options"]) ? $context["options"] : null)) {
                // line 27
                echo "            <div class=\"pull-right\">
                ";
                // line 28
                $this->loadTemplate("@gantry-admin/forms/fields/select/selectize.html.twig", "@gantry-admin/pages/configurations/assignments/assignments.html.twig", 28)->display(array("layout" => "input", "name" => "assignment", "field" => array("type" => "select.selectize", "options" => (isset($context["options"]) ? $context["options"] : null)), "value" => (isset($context["assignment"]) ? $context["assignment"] : null)));
                // line 29
                echo "            </div>
            ";
            }
            // line 31
            echo "        </div>

        <div class=\"cards-wrapper clearfix\">
            ";
            // line 34
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["assignments"]) ? $context["assignments"] : null));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["type"]) {
                // line 35
                echo "                <div class=\"card settings-block\">
                    <h4>
                        ";
                // line 37
                echo twig_escape_filter($this->env, $this->getAttribute($context["type"], "label", array()));
                echo "
                        <div class=\"g-panel-filters float-right align-right\">
                            <div class=\"search settings-block\">
                                <input type=\"text\" placeholder=\"";
                // line 40
                echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_FILTER_ELI"), "html", null, true);
                echo "\" aria-label=\"";
                echo twig_escape_filter($this->env, (($this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_FILTER_ELI") . " ") . $this->getAttribute($context["type"], "label", array())), "html", null, true);
                echo "\" role=\"search\">
                                <i class=\"fa fa-fw fa-search\"></i>
                            </div>
                            <span data-g-assignments-uncheck data-role=\"button\" class=\"g-tooltip g-tooltip-right\" tabindex=\"0\" data-title=\"";
                // line 43
                echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_UNSELECT_ALL_MENU"), "html", null, true);
                echo "\" aria-label=\"";
                echo twig_escape_filter($this->env, (($this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_UNSELECT_ALL_MENU") . " in ") . $this->getAttribute($context["type"], "label", array())), "html", null, true);
                echo "\"><i class=\"fa fa-fw fa-toggle-off\"></i></span>
                            <span data-g-assignments-check data-role=\"button\" class=\"g-tooltip g-tooltip-right\" tabindex=\"0\" data-title=\"";
                // line 44
                echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_SELECT_ALL_MENU"), "html", null, true);
                echo "\"  aria-label=\"";
                echo twig_escape_filter($this->env, (($this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_SELECT_ALL_MENU") . " in ") . $this->getAttribute($context["type"], "label", array())), "html", null, true);
                echo "\"><i class=\"fa fa-fw fa-toggle-on\"></i></span>
                        </div>
                    </h4>

                    <div class=\"settings-param-wrapper\">
                        ";
                // line 49
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["type"], "items", array()));
                $context['loop'] = array(
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                );
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["link"]) {
                    // line 50
                    echo "                        <label class=\"settings-param\">
                            ";
                    // line 51
                    $this->loadTemplate("forms/fields/enable/enable.html.twig", "@gantry-admin/pages/configurations/assignments/assignments.html.twig", 51)->display(array_merge($context, array("default" => true, "name" => $this->getAttribute(                    // line 53
$context["link"], "name", array()), "field" => $this->getAttribute(                    // line 54
$context["link"], "field", array()), "value" => $this->getAttribute(                    // line 55
$context["link"], "value", array()), "disabled" => $this->getAttribute(                    // line 56
$context["link"], "disabled", array()), "title" => (("'" . $this->getAttribute(                    // line 57
$context["link"], "label", array())) . "' Menu Item"))));
                    // line 59
                    echo "                            <span class=\"settings-param-title\">";
                    // line 60
                    echo twig_escape_filter($this->env, $this->getAttribute($context["link"], "label", array()), "html", null, true);
                    // line 61
                    echo "</span>
                        </label>
                        ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['link'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 64
                echo "                    </div>
                </div>
            ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['type'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 67
            echo "         </div>
    </form>
    ";
        } else {
            // line 70
            echo "    <h2 class=\"page-title\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_ASSIGNMENTS"), "html", null, true);
            echo "</h2>
    ";
            // line 71
            if (((isset($context["configuration"]) ? $context["configuration"] : null) == "default")) {
                // line 72
                echo "    <p>";
                echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_ASSIGN_BASE_DESC"), "html", null, true);
                echo "</p>
    ";
            } else {
                // line 74
                echo "    <p>";
                echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_NO_ASSIGNMENTS_DESC"), "html", null, true);
                echo "</p>
    ";
            }
            // line 76
            echo "    ";
        }
        // line 77
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "@gantry-admin/pages/configurations/assignments/assignments.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  240 => 77,  237 => 76,  231 => 74,  225 => 72,  223 => 71,  218 => 70,  213 => 67,  197 => 64,  181 => 61,  179 => 60,  177 => 59,  175 => 57,  174 => 56,  173 => 55,  172 => 54,  171 => 53,  170 => 51,  167 => 50,  150 => 49,  140 => 44,  134 => 43,  126 => 40,  120 => 37,  116 => 35,  99 => 34,  94 => 31,  90 => 29,  88 => 28,  85 => 27,  83 => 26,  77 => 23,  69 => 20,  63 => 19,  55 => 16,  47 => 11,  39 => 8,  35 => 6,  33 => 5,  30 => 4,  27 => 3,  18 => 1,);
    }
}
/* {% extends ajax-suffix ? "@gantry-admin/partials/ajax.html.twig" : "@gantry-admin/partials/base.html.twig" %}*/
/* */
/* {% block gantry %}*/
/* <div id="assignments">*/
/*     {% if assignments %}*/
/*     <form method="post">*/
/*         <span class="float-right">*/
/*             <button type="submit" class="button button-primary button-save" data-save="{{ 'GANTRY5_PLATFORM_ASSIGNMENTS'|trans }}"><i class="fa fa-fw fa-check"></i> <span>{{ 'GANTRY5_PLATFORM_SAVE_ASSIGNMENTS'|trans }}</span></button>*/
/*         </span>*/
/* */
/*         <h2 class="page-title">{{ 'GANTRY5_PLATFORM_ASSIGNMENTS'|trans }}</h2>*/
/* */
/*         <div class="g-filters-bar">*/
/*             <div class="g-panel-filters" data-g-global-filter>*/
/*                 <div class="search settings-block">*/
/*                     <input type="text" placeholder="{{ 'GANTRY5_PLATFORM_GLOBAL_FILTER_ELI'|trans }}" aria-label="{{ 'GANTRY5_PLATFORM_GLOBAL_FILTER_ELI'|trans }}" role="search">*/
/*                     <i class="fa fa-fw fa-search"></i>*/
/*                 </div>*/
/*                 <span data-g-assignments-uncheck data-role="button" class="g-tooltip g-tooltip-right" tabindex="0" data-title="{{ 'GANTRY5_PLATFORM_UNSELECT_ALL_MENU'|trans }}" aria-label="{{ 'GANTRY5_PLATFORM_UNSELECT_ALL_MENU'|trans }}"><i class="fa fa-fw fa-toggle-off"></i></span>*/
/*                 <span data-g-assignments-check data-role="button" class="g-tooltip g-tooltip-right" tabindex="0" data-title="{{ 'GANTRY5_PLATFORM_SELECT_ALL_MENU'|trans }}"  aria-label="{{ 'GANTRY5_PLATFORM_SELECT_ALL_MENU'|trans }}"><i class="fa fa-fw fa-toggle-on"></i></span>*/
/*             </div>*/
/*             <label>*/
/*                 <input type="checkbox" data-assignments-enabledonly /> {{ 'GANTRY5_PLATFORM_HIDE_ASSIGNMENTS'|trans }}*/
/*             </label>*/
/* */
/*             {% if options %}*/
/*             <div class="pull-right">*/
/*                 {% include '@gantry-admin/forms/fields/select/selectize.html.twig' with {'layout': 'input', 'name': 'assignment', 'field': {'type': 'select.selectize', 'options': options}, 'value': assignment} only %}*/
/*             </div>*/
/*             {% endif %}*/
/*         </div>*/
/* */
/*         <div class="cards-wrapper clearfix">*/
/*             {% for type in assignments %}*/
/*                 <div class="card settings-block">*/
/*                     <h4>*/
/*                         {{ type.label|e }}*/
/*                         <div class="g-panel-filters float-right align-right">*/
/*                             <div class="search settings-block">*/
/*                                 <input type="text" placeholder="{{ 'GANTRY5_PLATFORM_FILTER_ELI'|trans }}" aria-label="{{ 'GANTRY5_PLATFORM_FILTER_ELI'|trans ~ ' ' ~ type.label }}" role="search">*/
/*                                 <i class="fa fa-fw fa-search"></i>*/
/*                             </div>*/
/*                             <span data-g-assignments-uncheck data-role="button" class="g-tooltip g-tooltip-right" tabindex="0" data-title="{{ 'GANTRY5_PLATFORM_UNSELECT_ALL_MENU'|trans }}" aria-label="{{ 'GANTRY5_PLATFORM_UNSELECT_ALL_MENU'|trans ~ ' in ' ~ type.label  }}"><i class="fa fa-fw fa-toggle-off"></i></span>*/
/*                             <span data-g-assignments-check data-role="button" class="g-tooltip g-tooltip-right" tabindex="0" data-title="{{ 'GANTRY5_PLATFORM_SELECT_ALL_MENU'|trans }}"  aria-label="{{ 'GANTRY5_PLATFORM_SELECT_ALL_MENU'|trans ~ ' in ' ~ type.label  }}"><i class="fa fa-fw fa-toggle-on"></i></span>*/
/*                         </div>*/
/*                     </h4>*/
/* */
/*                     <div class="settings-param-wrapper">*/
/*                         {% for link in type.items %}*/
/*                         <label class="settings-param">*/
/*                             {% include 'forms/fields/enable/enable.html.twig' with {*/
/*                             'default': true,*/
/*                             'name': link.name,*/
/*                             'field': link.field,*/
/*                             'value': link.value,*/
/*                             'disabled': link.disabled,*/
/*                             'title': "'" ~ link.label ~ "' Menu Item"*/
/*                             } %}*/
/*                             <span class="settings-param-title">*/
/*                                 {{- link.label -}}*/
/*                             </span>*/
/*                         </label>*/
/*                         {% endfor %}*/
/*                     </div>*/
/*                 </div>*/
/*             {% endfor %}*/
/*          </div>*/
/*     </form>*/
/*     {% else %}*/
/*     <h2 class="page-title">{{ 'GANTRY5_PLATFORM_ASSIGNMENTS'|trans }}</h2>*/
/*     {% if configuration == 'default' %}*/
/*     <p>{{ 'GANTRY5_PLATFORM_ASSIGN_BASE_DESC'|trans }}</p>*/
/*     {% else %}*/
/*     <p>{{ 'GANTRY5_PLATFORM_NO_ASSIGNMENTS_DESC'|trans }}</p>*/
/*     {% endif %}*/
/*     {% endif %}*/
/* </div>*/
/* {% endblock %}*/
/* */
