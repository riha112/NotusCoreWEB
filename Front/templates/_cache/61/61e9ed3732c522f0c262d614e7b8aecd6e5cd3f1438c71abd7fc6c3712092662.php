<?php

/* page/notus-page-landing/page.full.twig */
class __TwigTemplate_7126d819991c461f5ab5c1ff6022b13cc821b49b082422f9afa773439bf25526 extends Twig_Template
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
    <div class='container'>
        ";
        // line 3
        echo twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header", array());
        echo "
    </div>
</header>

<main id='";
        // line 7
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "id", array()), "html", null, true);
        echo "-content'>

    <div class='hamburger'>
        <div class='line'></div>
        <div class='line'></div>        
        <div class='line'></div>        
    </div>

    <div class='font-size'>
        <span class='large'>A</span>
        <span class='medium'>A</span>
        <span class='small'>A</span>
    </div>

    <div class='container'>
        ";
        // line 22
        echo twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", array());
        echo "

    </div>
</main>

";
    }

    public function getTemplateName()
    {
        return "page/notus-page-landing/page.full.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 22,  36 => 7,  29 => 3,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<header id='{{page.id}}-header'>
    <div class='container'>
        {{page.header|raw}}
    </div>
</header>

<main id='{{page.id}}-content'>

    <div class='hamburger'>
        <div class='line'></div>
        <div class='line'></div>        
        <div class='line'></div>        
    </div>

    <div class='font-size'>
        <span class='large'>A</span>
        <span class='medium'>A</span>
        <span class='small'>A</span>
    </div>

    <div class='container'>
        {{page.content|raw}}

    </div>
</main>

", "page/notus-page-landing/page.full.twig", "C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\NotusCore\\Front\\templates\\page\\notus-page-landing\\page.full.twig");
    }
}
