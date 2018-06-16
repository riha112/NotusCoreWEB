<?php

/* menu/menu.item.twig */
class __TwigTemplate_09464a9a16b67f668d4b85750129d2edc2e71cce7f6df82912396ec6a82efd2e extends Twig_Template
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
        echo "<li class='menu-item ";
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "is_active", array())) {
            echo " is-active ";
        }
        echo " ";
        if ( !(null === twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "description", array()))) {
            echo " hover-info ";
        }
        echo "'>
    ";
        // line 2
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "url", array())) {
            // line 3
            echo "   
        <a class='menu-link' href=\"";
            // line 4
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "url", array()), "html", null, true);
            echo "\">
            ";
            // line 5
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "title", array()), "html", null, true);
            echo "
        </a>
    ";
        } else {
            // line 8
            echo "        <div class='menu-link'>
            ";
            // line 9
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "title", array()), "html", null, true);
            echo "
        </div>
    ";
        }
        // line 12
        echo "    ";
        if ( !(null === twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "description", array()))) {
            // line 13
            echo "    <span class='hover-info-content'>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "description", array()), "html", null, true);
            echo "</span>
    ";
        }
        // line 15
        echo "</li>
";
    }

    public function getTemplateName()
    {
        return "menu/menu.item.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 15,  61 => 13,  58 => 12,  52 => 9,  49 => 8,  43 => 5,  39 => 4,  36 => 3,  34 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<li class='menu-item {% if item.is_active %} is-active {% endif %} {% if item.description is not null %} hover-info {% endif %}'>
    {% if item.url %}
   
        <a class='menu-link' href=\"{{ item.url }}\">
            {{item.title}}
        </a>
    {% else %}
        <div class='menu-link'>
            {{item.title}}
        </div>
    {% endif %}
    {% if item.description is not null %}
    <span class='hover-info-content'>{{item.description}}</span>
    {% endif %}
</li>
", "menu/menu.item.twig", "C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\NotusCoreWEB\\Front\\templates\\menu\\menu.item.twig");
    }
}
