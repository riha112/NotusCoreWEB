<?php

/* form/form.field-select.twig */
class __TwigTemplate_dbae68093a6434381c13279282c493ec5bf39d63831f75bc162a814669c8cd88 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class='form-field ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "type", array()));
        echo "'>
    <select name='";
        // line 2
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "name", array()));
        echo "' >
        ";
        // line 3
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "options", array()));
        foreach ($context['_seq'] as $context["value"] => $context["option"]) {
            // line 4
            echo "            <option value='";
            echo twig_escape_filter($this->env, $context["value"]);
            echo "'
            ";
            // line 5
            if (( !(null === twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "selected", array())) && ($context["value"] == twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "selected", array())))) {
                // line 6
                echo "                selected=\"selected\"
            ";
            }
            // line 8
            echo "            >";
            echo $context["option"];
            echo "</option>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['value'], $context['option'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 10
        echo "    </select>

    ";
        // line 12
        if ( !(null === twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "description", array()))) {
            // line 13
            echo "        <div class='description'> ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "description", array()), "html", null, true);
            echo " </div>
    ";
        }
        // line 15
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "form/form.field-select.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 15,  62 => 13,  60 => 12,  56 => 10,  47 => 8,  43 => 6,  41 => 5,  36 => 4,  32 => 3,  28 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class='form-field {{field.type|e}}'>
    <select name='{{ field.name|e }}' >
        {% for value, option in field.options %}
            <option value='{{value|e}}'
            {% if (field.selected is not null) and (value == field.selected) %}
                selected=\"selected\"
            {% endif %}
            >{{option|raw}}</option>
        {% endfor %}
    </select>

    {% if field.description is not null %}
        <div class='description'> {{field.description}} </div>
    {% endif %}
</div>", "form/form.field-select.twig", "C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\hello-siler\\Front\\templates\\form\\form.field-select.twig");
    }
}
