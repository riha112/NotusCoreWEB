<?php

/* _custom/block//notus-block-profile-info/profile-info-block.twig */
class __TwigTemplate_7b703fdf91b3930d9d1ae855ce22c42f6e3e94288a2971e01c2c3e1cdce1c501 extends Twig_Template
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
        <img src=\"";
        // line 4
        if ( !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["block"] ?? null), "user_data", array()), "base_info", array()), "profile_picture", array()))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["block"] ?? null), "user_data", array()), "base_info", array()), "profile_picture", array()), "html", null, true);
        } else {
            echo "https://proxy.duckduckgo.com/iu/?u=https%3A%2F%2Fmedia.giphy.com%2Fmedia%2F1xawnFRPNf9g4%2Fgiphy.gif&f=1";
        }
        echo "\">
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
        return array (  82 => 21,  74 => 18,  68 => 16,  62 => 13,  56 => 12,  52 => 11,  47 => 10,  43 => 9,  36 => 5,  28 => 4,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"profile-content\">

    <div class=\"profile-picture\">
        <img src=\"{% if block.user_data.base_info.profile_picture is not null %}{{block.user_data.base_info.profile_picture}}{% else %}https://proxy.duckduckgo.com/iu/?u=https%3A%2F%2Fmedia.giphy.com%2Fmedia%2F1xawnFRPNf9g4%2Fgiphy.gif&f=1{% endif %}\">
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
", "_custom/block//notus-block-profile-info/profile-info-block.twig", "C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\NotusCoreWEB\\Front\\templates\\_custom\\block\\notus-block-profile-info\\profile-info-block.twig");
    }
}
