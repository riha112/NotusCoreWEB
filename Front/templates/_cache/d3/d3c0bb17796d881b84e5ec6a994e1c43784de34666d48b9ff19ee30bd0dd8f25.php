<?php

/* menu///menu.twig */
class __TwigTemplate_251e6f3dfb99a2f44a85d5247b7d8b8d372be3c83448ad4f207b66fbb0f67e86 extends Twig_Template
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
        echo "<ul class='menu ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "machine_name", array()), "html", null, true);
        echo "'>

    ";
        // line 3
        $context["depth_0"] = (($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 = twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "items", array())) && is_array($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5) || $__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 instanceof ArrayAccess ? ($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5["-1"] ?? null) : null);
        // line 4
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["depth_0"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
            // line 5
            echo "        ";
            echo twig_get_attribute($this->env, $this->source, $context["data"], "rendered", array());
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['data'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 7
        echo "
</ul>
";
    }

    public function getTemplateName()
    {
        return "menu///menu.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 7,  36 => 5,  31 => 4,  29 => 3,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<ul class='menu {{menu.machine_name}}'>

    {% set depth_0 = menu.items['-1'] %}
    {% for data in depth_0 %}
        {{ data.rendered|raw }}
    {% endfor %}

</ul>
", "menu///menu.twig", "C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\NotusCore\\Front\\templates\\menu\\menu.twig");
    }
}
