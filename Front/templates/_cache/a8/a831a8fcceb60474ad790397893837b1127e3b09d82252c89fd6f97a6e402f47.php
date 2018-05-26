<?php

/* _custom/block/landing-wellcome-block.twig */
class __TwigTemplate_3dcb9f49afc7924507b0250127e64bede0eff093a776c5c20097a75d50822edb extends Twig_Template
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
        if ( !(null === twig_get_attribute($this->env, $this->source, ($context["download"] ?? null), "list", array()))) {
            // line 8
            echo "        ";
        } else {
            // line 9
            echo "            <div class='empty-box'>NOTHING FOUND!</div>
        ";
        }
        // line 11
        echo "    </div>
</div>
<div class='title-hld'>
    <h1 class='title'>T3S<span>/</span>T.</h1>
    ";
        // line 15
        if ( !(null === twig_get_attribute($this->env, $this->source, ($context["block"] ?? null), "description", array()))) {
            // line 16
            echo "        <p class='description'> ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["block"] ?? null), "description", array()), "html", null, true);
            echo " </p>
    ";
        }
        // line 18
        echo "    <button class='download'>Download</button>
    <div class='authentication'>
        <span data-frame-toggle=\"0\">Login</span>
        /
        <span data-frame-toggle=\"2\">Register</span>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "_custom/block/landing-wellcome-block.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 18,  48 => 16,  46 => 15,  40 => 11,  36 => 9,  33 => 8,  31 => 7,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class='download-list'>
    <div class='close'>
        <span></span>
        <span></span>
    </div>
    <div class='download-list-hld'>
        {% if download.list is not null %}
        {% else %}
            <div class='empty-box'>NOTHING FOUND!</div>
        {% endif %}
    </div>
</div>
<div class='title-hld'>
    <h1 class='title'>T3S<span>/</span>T.</h1>
    {% if block.description is not null %}
        <p class='description'> {{ block.description }} </p>
    {% endif %}
    <button class='download'>Download</button>
    <div class='authentication'>
        <span data-frame-toggle=\"0\">Login</span>
        /
        <span data-frame-toggle=\"2\">Register</span>
    </div>
</div>", "_custom/block/landing-wellcome-block.twig", "C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\hello-siler\\Front\\templates\\_custom\\block\\landing-wellcome-block.twig");
    }
}
