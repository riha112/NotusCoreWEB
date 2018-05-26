<?php

/* form/form.twig */
class __TwigTemplate_50d929d10ced68a58fd320212c0d803cc9c60e9650b2a295d8f6c4ce3910ced3 extends Twig_Template
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
        if ( !(null === ($context["form"] ?? null))) {
            // line 2
            echo "    <div id='";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "id", array()), "html", null, true);
            echo "-hld' class='form-hld'>
        ";
            // line 3
            if ( !(null === twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "title", array()))) {
                // line 4
                echo "            <div class='form-title'>
                <span class='blink'>&gt;</span> 
                ";
                // line 6
                echo twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "title", array());
                echo "
            </div>
        ";
            }
            // line 8
            echo "   

        ";
            // line 10
            if ( !(null === twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "todo", array()))) {
                // line 11
                echo "            <div class='form-todo'>
                ## <span class='todo'>TODO:</span> 
                ";
                // line 13
                echo twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "todo", array());
                echo "
            </div>
        ";
            }
            // line 15
            echo "   

        ";
            // line 17
            if ( !(null === twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "top_description", array()))) {
                // line 18
                echo "            <div class='form-top-description code-top'>";
                echo twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "top_description", array());
                echo "</div>
        ";
            }
            // line 20
            echo "
        <form id='";
            // line 21
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "id", array()), "html", null, true);
            echo "' method='";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "method", array()), "html", null, true);
            echo "' class='form code-body' action='#'>
            ";
            // line 22
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["fields"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                // line 23
                echo "                ";
                echo $context["field"];
                echo "
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 25
            echo "            <input type='hidden' value='";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "id", array()), "html", null, true);
            echo "' name='form'>
        </form>


        ";
            // line 29
            if ( !(null === twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "bottom_description", array()))) {
                // line 30
                echo "            <div class='form-bottom-description code-bottom'>";
                echo twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "bottom_description", array());
                echo "</div>
        ";
            }
            // line 32
            echo "    </div>
";
        }
        // line 34
        echo "



";
    }

    public function getTemplateName()
    {
        return "form/form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 34,  108 => 32,  102 => 30,  100 => 29,  92 => 25,  83 => 23,  79 => 22,  73 => 21,  70 => 20,  64 => 18,  62 => 17,  58 => 15,  52 => 13,  48 => 11,  46 => 10,  42 => 8,  36 => 6,  32 => 4,  30 => 3,  25 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% if form is not null %}
    <div id='{{form.id}}-hld' class='form-hld'>
        {% if form.title is not null %}
            <div class='form-title'>
                <span class='blink'>&gt;</span> 
                {{form.title|raw}}
            </div>
        {% endif %}   

        {% if form.todo is not null %}
            <div class='form-todo'>
                ## <span class='todo'>TODO:</span> 
                {{form.todo|raw}}
            </div>
        {% endif %}   

        {% if form.top_description is not null %}
            <div class='form-top-description code-top'>{{form.top_description|raw}}</div>
        {% endif %}

        <form id='{{form.id}}' method='{{form.method}}' class='form code-body' action='#'>
            {% for field in fields %}
                {{ field|raw }}
            {% endfor %}
            <input type='hidden' value='{{form.id}}' name='form'>
        </form>


        {% if form.bottom_description is not null %}
            <div class='form-bottom-description code-bottom'>{{form.bottom_description|raw}}</div>
        {% endif %}
    </div>
{% endif %}




", "form/form.twig", "C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\NotusCore\\Front\\templates\\form\\form.twig");
    }
}
