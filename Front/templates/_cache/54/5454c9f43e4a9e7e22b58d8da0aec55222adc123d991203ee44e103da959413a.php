<?php

/* form/form.field.twig */
class __TwigTemplate_63c08fa99436d7a589255d11cc8b126447a1d463a0b78d5dfed3eda1c4467ceb extends Twig_Template
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
        echo "<div class='form-field code-element ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "type", array()));
        echo "'>

    ";
        // line 3
        if ( !(null === twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "title", array()))) {
            // line 4
            echo "        <div class='input-title'><span class='code-title'> ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "title", array()), "html", null, true);
            echo " <span></div>
    ";
        }
        // line 6
        echo "
    <div 
    class='code-value input";
        // line 8
        if ( !(null === twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "description", array()))) {
            echo " hover-info";
        }
        echo "'
    >
        ";
        // line 10
        if ((twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "type", array())) == "textarea")) {
            // line 11
            echo "
        <textarea 
            name='";
            // line 13
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "name", array()));
            echo "' 
            ";
            // line 14
            if ( !(null === twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "placeholder", array()))) {
                // line 15
                echo "                placeholder='";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "placeholder", array()));
                echo "' 
            ";
            }
            // line 16
            echo " 
            ";
            // line 17
            if (( !(null === twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "required", array())) && (twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "required", array()) == true))) {
                // line 18
                echo "                required
            ";
            }
            // line 19
            echo " 
        ></textarea>

        ";
        } else {
            // line 23
            echo "
        <input 
            name='";
            // line 25
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "name", array()));
            echo "' 
            type='";
            // line 26
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "type", array()));
            echo "' 
            ";
            // line 27
            if ( !(null === twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "value", array()))) {
                // line 28
                echo "                value='";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "value", array()));
                echo "' 
            ";
            }
            // line 29
            echo "    
            ";
            // line 30
            if ( !(null === twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "placeholder", array()))) {
                // line 31
                echo "                placeholder='";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "placeholder", array()));
                echo "' 
            ";
            }
            // line 32
            echo " 
            ";
            // line 33
            if (( !(null === twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "required", array())) && (twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "required", array()) == true))) {
                // line 34
                echo "                required
            ";
            }
            // line 35
            echo " 
        />

        ";
        }
        // line 39
        echo "
        ";
        // line 40
        if ((twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "type", array())) == "checkbox")) {
            // line 41
            echo "            <div class='checkbox-style'></div>
        ";
        }
        // line 43
        echo "

        ";
        // line 45
        if ( !(null === twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "description", array()))) {
            // line 46
            echo "            <div class='description hover-info-content'> 
            ";
            // line 47
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "description", array()), "html", null, true);
            echo " 
                ";
            // line 48
            if ( !(null === twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "limit", array()))) {
                // line 49
                echo "                <div>[MAX: ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "limit", array()), "html", null, true);
                echo "]</div>
            ";
            }
            // line 51
            echo "            </div>
        ";
        }
        // line 53
        echo "
    </div>

</div>
";
    }

    public function getTemplateName()
    {
        return "form/form.field.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  161 => 53,  157 => 51,  151 => 49,  149 => 48,  145 => 47,  142 => 46,  140 => 45,  136 => 43,  132 => 41,  130 => 40,  127 => 39,  121 => 35,  117 => 34,  115 => 33,  112 => 32,  106 => 31,  104 => 30,  101 => 29,  95 => 28,  93 => 27,  89 => 26,  85 => 25,  81 => 23,  75 => 19,  71 => 18,  69 => 17,  66 => 16,  60 => 15,  58 => 14,  54 => 13,  50 => 11,  48 => 10,  41 => 8,  37 => 6,  31 => 4,  29 => 3,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class='form-field code-element {{field.type|e}}'>

    {% if field.title is not null %}
        <div class='input-title'><span class='code-title'> {{field.title}} <span></div>
    {% endif %}

    <div 
    class='code-value input{% if field.description is not null %} hover-info{% endif %}'
    >
        {% if field.type|e == 'textarea' %}

        <textarea 
            name='{{ field.name|e }}' 
            {% if field.placeholder is not null %}
                placeholder='{{ field.placeholder|e }}' 
            {% endif %} 
            {% if (field.required is not null) and (field.required == true) %}
                required
            {% endif %} 
        ></textarea>

        {% else %}

        <input 
            name='{{ field.name|e }}' 
            type='{{ field.type|e }}' 
            {% if field.value is not null %}
                value='{{ field.value|e }}' 
            {% endif %}    
            {% if field.placeholder is not null %}
                placeholder='{{ field.placeholder|e }}' 
            {% endif %} 
            {% if (field.required is not null) and (field.required == true) %}
                required
            {% endif %} 
        />

        {% endif %}

        {% if field.type|e == 'checkbox' %}
            <div class='checkbox-style'></div>
        {% endif %}


        {% if field.description is not null %}
            <div class='description hover-info-content'> 
            {{field.description}} 
                {% if field.limit is not null %}
                <div>[MAX: {{field.limit}}]</div>
            {% endif %}
            </div>
        {% endif %}

    </div>

</div>
", "form/form.field.twig", "C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\NotusCore\\Front\\templates\\form\\form.field.twig");
    }
}
