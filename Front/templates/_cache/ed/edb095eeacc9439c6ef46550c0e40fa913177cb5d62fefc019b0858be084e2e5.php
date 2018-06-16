<?php

/* _custom/block//notus-block-forum/forum-block.twig */
class __TwigTemplate_ced3270c4628897e12d3dd469ace57cad24f9b7fae4a74d2ceaeef8dfd1d36eb extends Twig_Template
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
        echo twig_get_attribute($this->env, $this->source, ($context["block"] ?? null), "filter_form", array());
        echo "

<div class='forums'>
    ";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["block"] ?? null), "posts", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 5
            echo "        <a class='forum-post' href=\"?post=";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "id", array()), "html", null, true);
            echo "\">
            <div class='icon'>
                <div class='";
            // line 7
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "type", array()), "html", null, true);
            echo "-img'></div>
                <div class='type'>";
            // line 8
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "type", array()), "html", null, true);
            echo "</div>
            </div>
            <div class='content'>
                <div class='title'>
                    ";
            // line 12
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "title", array()), "html", null, true);
            echo "
                </div>
                <div class='body'>
                ";
            // line 15
            echo twig_escape_filter($this->env, (((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "content", array())) > 50)) ? ((twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "content", array()), 0, 50) . "...")) : (twig_get_attribute($this->env, $this->source, $context["post"], "content", array()))), "html", null, true);
            echo "
                </div>
                <div class='about'>
                Created on <span>";
            // line 18
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "created", array()), "html", null, true);
            echo "</span> by <span>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "username", array()), "html", null, true);
            echo "</span>
                </div>
            </div>
        </a>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "</div>

<div class='pager'>
    ";
        // line 26
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(1, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["block"] ?? null), "pager", array()), "page_count", array())));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 27
            echo "        <a class=\"pager-item
        ";
            // line 28
            if ((twig_get_attribute($this->env, $this->source, $context["loop"], "index0", array()) == twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["block"] ?? null), "pager", array()), "curr_page", array()))) {
                echo "is-active";
            }
            echo " 
        \" href=\"?page=";
            // line 29
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index0", array()), "html", null, true);
            echo "\">
            ";
            // line 30
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()), "html", null, true);
            echo "
        </a>
    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "_custom/block//notus-block-forum/forum-block.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  127 => 33,  110 => 30,  106 => 29,  100 => 28,  97 => 27,  80 => 26,  75 => 23,  62 => 18,  56 => 15,  50 => 12,  43 => 8,  39 => 7,  33 => 5,  29 => 4,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{{block.filter_form|raw}}

<div class='forums'>
    {% for post in block.posts %}
        <a class='forum-post' href=\"?post={{post.id}}\">
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
                Created on <span>{{post.created}}</span> by <span>{{post.username}}</span>
                </div>
            </div>
        </a>
    {% endfor %}
</div>

<div class='pager'>
    {% for i in 1..block.pager.page_count %}
        <a class=\"pager-item
        {% if loop.index0 == block.pager.curr_page %}is-active{% endif %} 
        \" href=\"?page={{loop.index0}}\">
            {{loop.index}}
        </a>
    {% endfor %}
</div>
", "_custom/block//notus-block-forum/forum-block.twig", "C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\NotusCoreWEB\\Front\\templates\\_custom\\block\\notus-block-forum\\forum-block.twig");
    }
}
