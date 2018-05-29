<?php

/* page/page.full.twig */
class __TwigTemplate_883262edda81cb1bccc22ad286b5cc8dd82389896ba87ba89198ef40adef2c9a extends Twig_Template
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
        echo "<header id='";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "id", array()), "html", null, true);
        echo "-header'>
    ";
        // line 2
        echo twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header", array());
        echo "
</header>

<main id='";
        // line 5
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "id", array()), "html", null, true);
        echo "-content'>
        ";
        // line 6
        echo twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", array());
        echo "
</main>


";
    }

    public function getTemplateName()
    {
        return "page/page.full.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 6,  34 => 5,  28 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<header id='{{page.id}}-header'>
    {{page.header|raw}}
</header>

<main id='{{page.id}}-content'>
        {{page.content|raw}}
</main>


", "page/page.full.twig", "C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\NotusCore\\Front\\templates\\page\\page.full.twig");
    }
}
