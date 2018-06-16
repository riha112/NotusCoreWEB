<?php

/* form/form.field-multi_file.twig */
class __TwigTemplate_084aa9057d84a3f1a9075d964e2d3d3b18b887a95682cf27a7ffcd800bed9c70 extends Twig_Template
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
        echo "<div class='form-field ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "type", array()));
        echo " code-element'>
    ";
        // line 2
        if ( !(null === twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "title", array()))) {
            // line 3
            echo "        <div class='input-title'><span class='code-title'> ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "title", array()), "html", null, true);
            echo " <span></div>
    ";
        }
        // line 5
        echo "

    <div class=\"multi-field-content\" data-nameing=\"";
        // line 7
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "type", array()));
        echo "\"  data-max=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "max", array()), "html", null, true);
        echo "\">
        <div class=\"field\">
            <input name=\"";
        // line 9
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["field"] ?? null), "type", array()));
        echo "-0\" type=\"file\">
            <div class=\"remove\">REMOVE</div>
        </div>
        <div class=\"add-field\">
        <span>++ ADD FIELD</span>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "form/form.field-multi_file.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 9,  40 => 7,  36 => 5,  30 => 3,  28 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class='form-field {{field.type|e}} code-element'>
    {% if field.title is not null %}
        <div class='input-title'><span class='code-title'> {{field.title}} <span></div>
    {% endif %}


    <div class=\"multi-field-content\" data-nameing=\"{{field.type|e}}\"  data-max=\"{{field.max}}\">
        <div class=\"field\">
            <input name=\"{{field.type|e}}-0\" type=\"file\">
            <div class=\"remove\">REMOVE</div>
        </div>
        <div class=\"add-field\">
        <span>++ ADD FIELD</span>
        </div>
    </div>
</div>
", "form/form.field-multi_file.twig", "C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\NotusCoreWEB\\Front\\templates\\form\\form.field-multi_file.twig");
    }
}
