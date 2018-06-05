<?php

/* _custom/block//notus-block-profile-info/profile-info-block.twig */
class __TwigTemplate_50fdd733736f639c1a37d748dcb37c42f791f5b9bd8491f1112b96437721a302 extends Twig_Template
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
        echo "<div class=\"profile-content\">

    <div class=\"profile-picture\">
        <img src=\"https://proxy.duckduckgo.com/iu/?u=https%3A%2F%2Fmedia.giphy.com%2Fmedia%2F1xawnFRPNf9g4%2Fgiphy.gif&f=1\">
        <div class=\"username\">@";
        // line 5
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["block"] ?? null), "user_data", array()), "base_info", array()), "username", array()), "html", null, true);
        echo "</div>
        <div class=\"points\">points:{4342}</div>
    </div>

    ";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["block"] ?? null), "user_data", array()), "body_info", array()));
        foreach ($context['_seq'] as $context["key"] => $context["value"]) {
            // line 10
            echo "    <div class=\"";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\">
        <div class=\"title\">";
            // line 11
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo ":</div>
        <div class=\"content";
            // line 12
            if (($context["value"] == null)) {
                echo " null ";
            }
            echo "\">
            ";
            // line 13
            if (($context["value"] == null)) {
                echo " 
            <span>null</span>
            ";
            } else {
                // line 16
                echo "                ";
                echo twig_escape_filter($this->env, $context["value"], "html", null, true);
                echo "
            ";
            }
            // line 18
            echo "        </div>
    </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "_custom/block//notus-block-profile-info/profile-info-block.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 21,  67 => 18,  61 => 16,  55 => 13,  49 => 12,  45 => 11,  40 => 10,  36 => 9,  29 => 5,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"profile-content\">

    <div class=\"profile-picture\">
        <img src=\"https://proxy.duckduckgo.com/iu/?u=https%3A%2F%2Fmedia.giphy.com%2Fmedia%2F1xawnFRPNf9g4%2Fgiphy.gif&f=1\">
        <div class=\"username\">@{{block.user_data.base_info.username}}</div>
        <div class=\"points\">points:{4342}</div>
    </div>

    {% for key, value in block.user_data.body_info %}
    <div class=\"{{key}}\">
        <div class=\"title\">{{key}}:</div>
        <div class=\"content{% if value == null %} null {% endif %}\">
            {% if value == null %} 
            <span>null</span>
            {% else %}
                {{value}}
            {% endif %}
        </div>
    </div>
    {% endfor %}
</div>
", "_custom/block//notus-block-profile-info/profile-info-block.twig", "C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\NotusCore\\Front\\templates\\_custom\\block\\notus-block-profile-info\\profile-info-block.twig");
    }
}
