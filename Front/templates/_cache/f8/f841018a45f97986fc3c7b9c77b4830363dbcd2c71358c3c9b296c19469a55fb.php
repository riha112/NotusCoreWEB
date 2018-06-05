<?php

/* form/form.field-select.twig */
class __TwigTemplate_8d4f5bb3b6984911ab091187b1c33ede8b40d0333881a4fb59c082fa5333b7cf extends Twig_Template
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
        echo " code-element'>
    ";
        // line 2
        if ( !(null === twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "title", array()))) {
            // line 3
            echo "        <div class='input-title'><span class='code-title'> ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "title", array()), "html", null, true);
            echo " <span></div>
    ";
        }
        // line 5
        echo "

    <select name='";
        // line 7
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "name", array()));
        echo "' >
        ";
        // line 8
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "options", array()));
        foreach ($context['_seq'] as $context["value"] => $context["option"]) {
            // line 9
            echo "            <option value='";
            echo twig_escape_filter($this->env, $context["value"]);
            echo "'
            ";
            // line 10
            if (( !(null === twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "selected", array())) && ($context["value"] == twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "selected", array())))) {
                // line 11
                echo "                selected=\"selected\"
            ";
            }
            // line 13
            echo "            >";
            echo $context["option"];
            echo "</option>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['value'], $context['option'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        echo "    </select>

    ";
        // line 17
        if ( !(null === twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "description", array()))) {
            // line 18
            echo "        <div class='description'> ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "description", array()), "html", null, true);
            echo " </div>
    ";
        }
        // line 20
        echo "</div>
";
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
        return array (  80 => 20,  74 => 18,  72 => 17,  68 => 15,  59 => 13,  55 => 11,  53 => 10,  48 => 9,  44 => 8,  40 => 7,  36 => 5,  30 => 3,  28 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class='form-field {{field.type|e}} code-element'>
    {% if field.title is not null %}
        <div class='input-title'><span class='code-title'> {{field.title}} <span></div>
    {% endif %}


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
</div>
", "form/form.field-select.twig", "C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\NotusCore\\Front\\templates\\form\\form.field-select.twig");
    }
}
