<?php

/* _custom/block//notus-block-my-posts/my-post-block.twig */
class __TwigTemplate_a1d514ee45692dc4f1d7aea8755a1a94a52270ee74a0565a927e76d6c5053a5d extends Twig_Template
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
        echo "<div class='forums'>
<div class='header-title'>
        My Posts [";
        // line 3
        echo twig_escape_filter($this->env, twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["block"] ?? null), "posts", array())), "html", null, true);
        echo "]
    </div>
    ";
        // line 5
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["block"] ?? null), "posts", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 6
            echo "        <a class='forum-post' href=\"./post/edit?post=";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "id", array()), "html", null, true);
            echo "\">
            <div class='icon'>
                <div class='";
            // line 8
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "type", array()), "html", null, true);
            echo "-img'></div>
                <div class='type'>";
            // line 9
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "type", array()), "html", null, true);
            echo "</div>
            </div>
            <div class='content'>
                <div class='title'>
                    ";
            // line 13
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "title", array()), "html", null, true);
            echo "
                </div>
                <div class='body'>
                ";
            // line 16
            echo twig_escape_filter($this->env, (((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "content", array())) > 50)) ? ((twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "content", array()), 0, 50) . "...")) : (twig_get_attribute($this->env, $this->source, $context["post"], "content", array()))), "html", null, true);
            echo "
                </div>
                <div class='about'>
                Created on <span>";
            // line 19
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "created", array()), "html", null, true);
            echo "
                </div>
            </div>
        </a>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "_custom/block//notus-block-my-posts/my-post-block.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  76 => 24,  65 => 19,  59 => 16,  53 => 13,  46 => 9,  42 => 8,  36 => 6,  32 => 5,  27 => 3,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class='forums'>
<div class='header-title'>
        My Posts [{{block.posts|length}}]
    </div>
    {% for post in block.posts %}
        <a class='forum-post' href=\"./post/edit?post={{post.id}}\">
            <div class='icon'>
                <div class='{{post.type}}-img'></div>
                <div class='type'>{{post.type}}</div>
            </div>
            <div class='content'>
                <div class='title'>
                    {{post.title}}
                </div>
                <div class='body'>
                {{ post.content|length > 50 ? post.content|slice(0, 50) ~ '...' : post.content  }}
                </div>
                <div class='about'>
                Created on <span>{{post.created}}
                </div>
            </div>
        </a>
    {% endfor %}
</div>
", "_custom/block//notus-block-my-posts/my-post-block.twig", "C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\NotusCore\\Front\\templates\\_custom\\block\\notus-block-my-posts\\my-post-block.twig");
    }
}
