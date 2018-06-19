<?php

/* page/notus-page-404/page.content.twig */
class __TwigTemplate_b139ce4b8f3023b51be84a7d96331a3a3fc61dd9d8b9ec65e8cbe3105e0fa542 extends Twig_Template
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
        echo "<div id=\"page404\" class=\"center-xy\">
    <div class=\"title\"><span>";
        // line 2
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "heading", array()), "html", null, true);
        echo "</span></div>
    <div class=\"description\">";
        // line 3
        echo twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "description", array());
        echo "</div>
    <div class=\"more\">";
        // line 4
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "todo", array()), "html", null, true);
        echo "</div>    
</div>
";
    }

    public function getTemplateName()
    {
        return "page/notus-page-404/page.content.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 4,  30 => 3,  26 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div id=\"page404\" class=\"center-xy\">
    <div class=\"title\"><span>{{content.heading}}</span></div>
    <div class=\"description\">{{content.description|raw}}</div>
    <div class=\"more\">{{content.todo}}</div>    
</div>
", "page/notus-page-404/page.content.twig", "C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\NotusCore\\Front\\templates\\page\\notus-page-404\\page.content.twig");
    }
}
