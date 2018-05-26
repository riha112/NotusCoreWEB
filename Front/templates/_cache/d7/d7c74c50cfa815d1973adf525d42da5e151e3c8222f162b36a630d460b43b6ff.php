<?php

/* _custom/block//landing-main-block.twig */
class __TwigTemplate_45c9d02e9bbe7bae22155166c6c82c29c3898e73287b82b8f61e5458a805cb4c extends Twig_Template
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
        echo "<div class='download-list'>
    <div class='close'>
        <span></span>
        <span></span>
    </div>
    <div class='download-list-hld'>
        ";
        // line 7
        if ( !(null === twig_get_attribute($this->env, $this->source, ($context["block"] ?? null), "table", array()))) {
            echo " ";
            echo twig_get_attribute($this->env, $this->source, ($context["block"] ?? null), "table", array());
            echo " ";
        } else {
            // line 8
            echo "        <div class='empty-box'>NOTHING FOUND!</div>
        ";
        }
        // line 10
        echo "    </div>
</div>
<div class='title-hld'>
    <h1 class='title'>
        NOTUS
        <span class='blink'>/</span>
        <span class='accent-color'>CORE.</span>
    </h1>
    ";
        // line 18
        if ( !(null === twig_get_attribute($this->env, $this->source, ($context["block"] ?? null), "description", array()))) {
            // line 19
            echo "    <p class='description'> ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["block"] ?? null), "description", array()), "html", null, true);
            echo " </p>
    ";
        }
        // line 21
        echo "    <button class='download'>Download DEV release</button>
</div>

";
    }

    public function getTemplateName()
    {
        return "_custom/block//landing-main-block.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 21,  53 => 19,  51 => 18,  41 => 10,  37 => 8,  31 => 7,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class='download-list'>
    <div class='close'>
        <span></span>
        <span></span>
    </div>
    <div class='download-list-hld'>
        {% if block.table is not null %} {{block.table|raw}} {% else %}
        <div class='empty-box'>NOTHING FOUND!</div>
        {% endif %}
    </div>
</div>
<div class='title-hld'>
    <h1 class='title'>
        NOTUS
        <span class='blink'>/</span>
        <span class='accent-color'>CORE.</span>
    </h1>
    {% if block.description is not null %}
    <p class='description'> {{ block.description }} </p>
    {% endif %}
    <button class='download'>Download DEV release</button>
</div>

", "_custom/block//landing-main-block.twig", "C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\NotusCore\\Front\\templates\\_custom\\block\\landing-main-block.twig");
    }
}
