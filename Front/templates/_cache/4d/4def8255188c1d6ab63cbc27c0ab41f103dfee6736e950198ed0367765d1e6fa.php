<?php

/* page/notus-page-landing/page.content.twig */
class __TwigTemplate_a8597c456fc0b0d8958ad403e51cc92557db14ab4d34887b866609b720ae965f extends Twig_Template
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
        echo "<div class='center-xy'>
<div class='content-main-page'>
<div class='title-hld'>
    <div class='title'>
        ";
        // line 5
        if ( !(null === twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "page_title", array()))) {
            // line 6
            echo "            ";
            echo twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "page_title", array());
            echo "
        ";
        }
        // line 8
        echo "    </div>
    <div class='sub-title'>
        ";
        // line 10
        if ( !(null === twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "page_sub_title", array()))) {
            // line 11
            echo "            ";
            echo twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "page_sub_title", array());
            echo "
        ";
        }
        // line 13
        echo "    </div>
</div>

<div class='sub-menu'>
    ";
        // line 17
        echo twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "sub_menu", array());
        echo "
</div>

<div class='download-table'>
    ";
        // line 21
        if ( !(null === twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "download_table", array()))) {
            // line 22
            echo "        ";
            echo twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "download_table", array());
            echo "
    ";
        }
        // line 24
        echo "</div>
</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "page/notus-page-landing/page.content.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 24,  64 => 22,  62 => 21,  55 => 17,  49 => 13,  43 => 11,  41 => 10,  37 => 8,  31 => 6,  29 => 5,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class='center-xy'>
<div class='content-main-page'>
<div class='title-hld'>
    <div class='title'>
        {% if content.page_title is not null %}
            {{ content.page_title|raw }}
        {% endif %}
    </div>
    <div class='sub-title'>
        {% if content.page_sub_title is not null %}
            {{ content.page_sub_title|raw }}
        {% endif %}
    </div>
</div>

<div class='sub-menu'>
    {{content.sub_menu|raw}}
</div>

<div class='download-table'>
    {% if content.download_table is not null %}
        {{ content.download_table|raw }}
    {% endif %}
</div>
</div>
</div>
", "page/notus-page-landing/page.content.twig", "C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\NotusCore\\Front\\templates\\page\\notus-page-landing\\page.content.twig");
    }
}
