<?php

/* forms/input.html.twig */
class __TwigTemplate_d2cb47acc6a4699f96180e8c945298d9c76fed67d4275319da77aa558761ee51 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascript' => array($this, 'block_javascript'),
            'javascript_footer' => array($this, 'block_javascript_footer'),
            'field' => array($this, 'block_field'),
            'contents' => array($this, 'block_contents'),
            'group' => array($this, 'block_group'),
            'input' => array($this, 'block_input'),
            'global_attributes' => array($this, 'block_global_attributes'),
            'reset_field' => array($this, 'block_reset_field'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $assetFunction = $this->env->getFunction('parse_assets')->getCallable();
        $assetVariables = array();
        if ($assetVariables && !is_array($assetVariables)) {
            throw new UnexpectedValueException('{% scripts with x %}: x is not an array');
        }
        $location = "head";
        if ($location && !is_string($location)) {
            throw new UnexpectedValueException('{% scripts in x %}: x is not a string');
        }
        $priority = isset($assetVariables['priority']) ? $assetVariables['priority'] : 0;
        ob_start();
        // line 2
        echo "    ";
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 4
        echo "
    ";
        // line 5
        $this->displayBlock('javascript', $context, $blocks);
        $content = ob_get_clean();
        echo $assetFunction($content, $location, $priority);
        // line 9
        $assetFunction = $this->env->getFunction('parse_assets')->getCallable();
        $assetVariables = array();
        if ($assetVariables && !is_array($assetVariables)) {
            throw new UnexpectedValueException('{% scripts with x %}: x is not an array');
        }
        $location = "footer";
        if ($location && !is_string($location)) {
            throw new UnexpectedValueException('{% scripts in x %}: x is not a string');
        }
        $priority = isset($assetVariables['priority']) ? $assetVariables['priority'] : 0;
        ob_start();
        // line 10
        echo "    ";
        $this->displayBlock('javascript_footer', $context, $blocks);
        $content = ob_get_clean();
        echo $assetFunction($content, $location, $priority);
        // line 14
        $context["name"] = (((null === (isset($context["name"]) ? $context["name"] : null))) ? ($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "name", array())) : ((isset($context["name"]) ? $context["name"] : null)));
        // line 15
        $context["value"] = (((null === (isset($context["value"]) ? $context["value"] : null))) ? ($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "default", array())) : ((isset($context["value"]) ? $context["value"] : null)));
        // line 16
        $context["default_value"] = (((null === (isset($context["default_value"]) ? $context["default_value"] : null))) ? ($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "default", array())) : ((isset($context["default_value"]) ? $context["default_value"] : null)));
        // line 18
        $this->displayBlock('field', $context, $blocks);
    }

    // line 2
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 3
        echo "    ";
    }

    // line 5
    public function block_javascript($context, array $blocks = array())
    {
        // line 6
        echo "    ";
    }

    // line 10
    public function block_javascript_footer($context, array $blocks = array())
    {
        // line 11
        echo "    ";
    }

    // line 18
    public function block_field($context, array $blocks = array())
    {
        // line 19
        echo "    ";
        if (( !$this->getAttribute((isset($context["field"]) ? $context["field"] : null), "isset", array()) ||  !(null === (isset($context["value"]) ? $context["value"] : null)))) {
            // line 20
            echo "    ";
            $this->displayBlock('contents', $context, $blocks);
            // line 45
            echo "    ";
        }
    }

    // line 20
    public function block_contents($context, array $blocks = array())
    {
        // line 21
        echo "        ";
        $this->displayBlock('group', $context, $blocks);
        // line 44
        echo "    ";
    }

    // line 21
    public function block_group($context, array $blocks = array())
    {
        // line 22
        echo "            ";
        $this->displayBlock('input', $context, $blocks);
        // line 43
        echo "        ";
    }

    // line 22
    public function block_input($context, array $blocks = array())
    {
        // line 23
        echo "                <input
                        ";
        // line 25
        echo "                        name=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->fieldNameFilter(((isset($context["scope"]) ? $context["scope"] : null) . (isset($context["name"]) ? $context["name"] : null))));
        echo "\"
                        value=\"";
        // line 26
        echo twig_escape_filter($this->env, twig_join_filter((isset($context["value"]) ? $context["value"] : null), ", "));
        echo "\"
                        ";
        // line 28
        echo "                        ";
        $this->displayBlock('global_attributes', $context, $blocks);
        // line 35
        echo "                        />

                ";
        // line 37
        $this->displayBlock('reset_field', $context, $blocks);
        // line 42
        echo "            ";
    }

    // line 28
    public function block_global_attributes($context, array $blocks = array())
    {
        // line 29
        echo "                            ";
        if ($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "class", array(), "any", true, true)) {
            echo " class=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "class", array()));
            echo "\" ";
        }
        // line 30
        echo "                            ";
        if ($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "id", array(), "any", true, true)) {
            echo " id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "id", array()));
            echo "\" ";
        }
        // line 31
        echo "                            ";
        if ($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "style", array(), "any", true, true)) {
            echo " style=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "style", array()));
            echo "\" ";
        }
        // line 32
        echo "                            ";
        if ($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "title", array(), "any", true, true)) {
            echo " title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "title", array()));
            echo "\" ";
        }
        // line 33
        echo "                            aria-label=\"";
        echo twig_escape_filter($this->env, trim(twig_title_string_filter($this->env, twig_replace_filter(((isset($context["scope"]) ? $context["scope"] : null) . (isset($context["name"]) ? $context["name"] : null)), array("." => " ")))), "html", null, true);
        echo "\"
                        ";
    }

    // line 37
    public function block_reset_field($context, array $blocks = array())
    {
        // line 38
        if (( !$this->getAttribute((isset($context["field"]) ? $context["field"] : null), "reset_field", array(), "any", true, true) || twig_in_filter($this->getAttribute((isset($context["field"]) ? $context["field"] : null), "reset_field", array()), array(0 => "on", 1 => "true", 2 => 1)))) {
            // line 39
            echo "                        <span class=\"g-reset-field\" data-g-reset-field=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->fieldNameFilter(((isset($context["scope"]) ? $context["scope"] : null) . (isset($context["name"]) ? $context["name"] : null))));
            echo "\"><i class=\"fa  fa-fw fa-times-circle\"></i></span>
                    ";
        }
    }

    public function getTemplateName()
    {
        return "forms/input.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  203 => 39,  201 => 38,  198 => 37,  191 => 33,  184 => 32,  177 => 31,  170 => 30,  163 => 29,  160 => 28,  156 => 42,  154 => 37,  150 => 35,  147 => 28,  143 => 26,  138 => 25,  135 => 23,  132 => 22,  128 => 43,  125 => 22,  122 => 21,  118 => 44,  115 => 21,  112 => 20,  107 => 45,  104 => 20,  101 => 19,  98 => 18,  94 => 11,  91 => 10,  87 => 6,  84 => 5,  80 => 3,  77 => 2,  73 => 18,  71 => 16,  69 => 15,  67 => 14,  62 => 10,  50 => 9,  46 => 5,  43 => 4,  40 => 2,  28 => 1,);
    }
}
/* {% assets %}*/
/*     {% block stylesheets %}*/
/*     {% endblock %}*/
/* */
/*     {% block javascript %}*/
/*     {% endblock %}*/
/* {% endassets -%}*/
/* */
/* {% assets in 'footer' %}*/
/*     {% block javascript_footer %}*/
/*     {% endblock %}*/
/* {% endassets -%}*/
/* */
/* {% set name = (name is null ? field.name : name) -%}*/
/* {% set value = (value is null ? field.default : value) -%}*/
/* {% set default_value = (default_value is null ? field.default : default_value) -%}*/
/* */
/* {% block field %}*/
/*     {% if not field.isset or value is not null %}*/
/*     {% block contents %}*/
/*         {% block group %}*/
/*             {% block input %}*/
/*                 <input*/
/*                         {# required attribute structures #}*/
/*                         name="{{ (scope ~ name)|fieldName|e }}"*/
/*                         value="{{ value|join(', ')|e }}"*/
/*                         {# global attribute structures #}*/
/*                         {% block global_attributes %}*/
/*                             {% if field.class is defined %} class="{{ field.class|e }}" {% endif %}*/
/*                             {% if field.id is defined %} id="{{ field.id|e }}" {% endif %}*/
/*                             {% if field.style is defined %} style="{{ field.style|e }}" {% endif %}*/
/*                             {% if field.title is defined %} title="{{ field.title|e }}" {% endif %}*/
/*                             aria-label="{{ (scope ~ name)|replace({'.': ' '})|title|trim }}"*/
/*                         {% endblock %}*/
/*                         />*/
/* */
/*                 {% block reset_field -%}*/
/*                     {% if field.reset_field is not defined or field.reset_field in ['on', 'true', 1] %}*/
/*                         <span class="g-reset-field" data-g-reset-field="{{ (scope ~ name)|fieldName|e }}"><i class="fa  fa-fw fa-times-circle"></i></span>*/
/*                     {% endif %}*/
/*                 {%- endblock %}*/
/*             {% endblock %}*/
/*         {% endblock %}*/
/*     {% endblock %}*/
/*     {% endif %}*/
/* {% endblock %}*/
/* */
