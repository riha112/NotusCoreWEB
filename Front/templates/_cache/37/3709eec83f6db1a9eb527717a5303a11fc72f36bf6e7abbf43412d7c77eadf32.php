<?php

/* table/table.twig */
class __TwigTemplate_9b6d002b76969a465d37b28b5a55680fc02e8b9e1d3d39af9878cb2194ed9fe2 extends Twig_Template
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
        if ( !(null === ($context["table"] ?? null))) {
            // line 2
            echo "    <table id='";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["table"] ?? null), "id", array()));
            echo "' class='";
            if (twig_get_attribute($this->env, $this->source, ($context["table"] ?? null), "dark", array())) {
                echo " dark ";
            }
            echo "'>
        ";
            // line 3
            if ( !(null === twig_get_attribute($this->env, $this->source, ($context["table"] ?? null), "head", array()))) {
                // line 4
                echo "            <thead>            
            ";
                // line 5
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["table"] ?? null), "head", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["head"]) {
                    // line 6
                    echo "                <th>";
                    echo $context["head"];
                    echo "</th>
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['head'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 8
                echo "            </thead>
        ";
            }
            // line 9
            echo "  

        ";
            // line 11
            if ( !(null === twig_get_attribute($this->env, $this->source, ($context["table"] ?? null), "body", array()))) {
                // line 12
                echo "            <tbody>
            ";
                // line 13
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["table"] ?? null), "body", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
                    // line 14
                    echo "                <tr>   
                ";
                    // line 15
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["row"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
                        // line 16
                        echo "                    <td>";
                        echo $context["value"];
                        echo "</td>
                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['value'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 18
                    echo "                </tr>
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 20
                echo "        ";
            } else {
                // line 21
                echo "            ";
                if ( !(null === twig_get_attribute($this->env, $this->source, ($context["table"] ?? null), "empty_msg", array()))) {
                    // line 22
                    echo "                <div class='empty-box'>
                    <div class='message'>";
                    // line 23
                    echo twig_get_attribute($this->env, $this->source, ($context["table"] ?? null), "empty_msg", array());
                    echo "/div>
                </div>
            ";
                }
                // line 26
                echo "            <tbody>  
        ";
            }
            // line 27
            echo "  
    </table>
";
        }
    }

    public function getTemplateName()
    {
        return "table/table.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  111 => 27,  107 => 26,  101 => 23,  98 => 22,  95 => 21,  92 => 20,  85 => 18,  76 => 16,  72 => 15,  69 => 14,  65 => 13,  62 => 12,  60 => 11,  56 => 9,  52 => 8,  43 => 6,  39 => 5,  36 => 4,  34 => 3,  25 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% if table is not null %}
    <table id='{{table.id|e}}' class='{% if table.dark %} dark {% endif %}'>
        {% if table.head is not null %}
            <thead>            
            {% for head in table.head %}
                <th>{{head|raw}}</th>
            {% endfor %}
            </thead>
        {% endif %}  

        {% if table.body is not null %}
            <tbody>
            {% for row in table.body %}
                <tr>   
                {% for value in row %}
                    <td>{{value|raw}}</td>
                {% endfor %}
                </tr>
            {% endfor %}
        {% else %}
            {% if table.empty_msg is not null %}
                <div class='empty-box'>
                    <div class='message'>{{table.empty_msg|raw}}/div>
                </div>
            {% endif %}
            <tbody>  
        {% endif %}  
    </table>
{% endif %}
", "table/table.twig", "C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\NotusCore\\Front\\templates\\table\\table.twig");
    }
}
