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
        >";
            // line 20
            if ( !(null === twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "value", array()))) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "value", array()));
            }
            echo "</textarea>

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
            if ((twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "type", array())) == "checkbox")) {
                // line 28
                echo "                ";
                if ((twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "value", array()) == "1")) {
                    // line 29
                    echo "                    checked=\"checked\"
                ";
                }
                // line 30
                echo "  
            ";
            } elseif ( !(null === twig_get_attribute($this->env, $this->source,             // line 31
($context["field"] ?? null), "value", array()))) {
                // line 32
                echo "                value='";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "value", array()));
                echo "' 
            ";
            }
            // line 33
            echo "  
            ";
            // line 34
            if ( !(null === twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "placeholder", array()))) {
                // line 35
                echo "                placeholder='";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "placeholder", array()));
                echo "' 
            ";
            }
            // line 36
            echo " 
            ";
            // line 37
            if (( !(null === twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "required", array())) && (twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "required", array()) == true))) {
                // line 38
                echo "                required
            ";
            }
            // line 39
            echo " 
        />

        ";
        }
        // line 43
        echo "
        ";
        // line 44
        if ((twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "type", array())) == "checkbox")) {
            // line 45
            echo "            <div class='checkbox-style'></div>
        ";
        }
        // line 47
        echo "

        ";
        // line 49
        if ( !(null === twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "description", array()))) {
            // line 50
            echo "            <div class='description hover-info-content'> 
                ";
            // line 51
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "description", array()), "html", null, true);
            echo " 
                ";
            // line 52
            if ( !(null === twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "validator", array()))) {
                // line 53
                echo "                    ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "validator", array()));
                foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                    // line 54
                    echo "                        ";
                    if (twig_in_filter($context["key"], array(0 => "one_of", 1 => "charset"))) {
                        // line 55
                        echo "                        ";
                    } else {
                        // line 56
                        echo "                            ";
                        if (($context["key"] == "required")) {
                            // line 57
                            echo "                                ";
                            if (($context["value"] == 1)) {
                                // line 58
                                echo "                                    ";
                                $context["value"] = "TRUE";
                                // line 59
                                echo "                                ";
                            } else {
                                // line 60
                                echo "                                    ";
                                $context["value"] = "false";
                                // line 61
                                echo "                                ";
                            }
                            echo "                                
                            ";
                        }
                        // line 63
                        echo "                        <div class='validates'><span>";
                        echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                        echo "</span>: ";
                        echo twig_escape_filter($this->env, $context["value"], "html", null, true);
                        echo "</div>                
                        ";
                    }
                    // line 64
                    echo "                    
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 66
                echo "                ";
            }
            // line 67
            echo "            </div>
        ";
        }
        // line 69
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
        return array (  222 => 69,  218 => 67,  215 => 66,  208 => 64,  200 => 63,  194 => 61,  191 => 60,  188 => 59,  185 => 58,  182 => 57,  179 => 56,  176 => 55,  173 => 54,  168 => 53,  166 => 52,  162 => 51,  159 => 50,  157 => 49,  153 => 47,  149 => 45,  147 => 44,  144 => 43,  138 => 39,  134 => 38,  132 => 37,  129 => 36,  123 => 35,  121 => 34,  118 => 33,  112 => 32,  110 => 31,  107 => 30,  103 => 29,  100 => 28,  98 => 27,  94 => 26,  90 => 25,  86 => 23,  78 => 20,  75 => 19,  71 => 18,  69 => 17,  66 => 16,  60 => 15,  58 => 14,  54 => 13,  50 => 11,  48 => 10,  41 => 8,  37 => 6,  31 => 4,  29 => 3,  23 => 1,);
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
        >{% if field.value is not null %}{{ field.value|e }}{% endif %}</textarea>

        {% else %}

        <input 
            name='{{ field.name|e }}' 
            type='{{ field.type|e }}' 
            {% if field.type|e == \"checkbox\" %}
                {% if field.value == \"1\" %}
                    checked=\"checked\"
                {% endif %}  
            {% elseif field.value is not null %}
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
                {% if field.validator is not null %}
                    {% for key, value in field.validator %}
                        {% if key in [\"one_of\", \"charset\"]  %}
                        {% else  %}
                            {% if key == \"required\" %}
                                {% if value == 1 %}
                                    {% set value = \"TRUE\" %}
                                {% else %}
                                    {% set value = \"false\" %}
                                {% endif %}                                
                            {% endif %}
                        <div class='validates'><span>{{key}}</span>: {{value}}</div>                
                        {% endif %}                    
                    {% endfor %}
                {% endif %}
            </div>
        {% endif %}

    </div>

</div>
", "form/form.field.twig", "C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\NotusCore\\Front\\templates\\form\\form.field.twig");
    }
}
