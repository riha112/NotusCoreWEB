<?php

/* _custom/block//notus-block-post/post-block.twig */
class __TwigTemplate_32189550a5f6aafeb8a584aa658c0473670ac426fd942216bf91a644e7bddd50 extends Twig_Template
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
        echo "<div class='post'>

<div class='like'>
    <div class='add btn hover-info'>
        ++
        <div class='hover-info-content'>
            Like post :)
        </div>
    </div>
    <div class='point-count'>";
        // line 10
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["block"] ?? null), "post", array()), "points", array()), "html", null, true);
        echo "</div>
    <div class='remove btn hover-info'>
         --
         <div class='hover-info-content'>
            Dislike post :(
        </div>
    </div>    
</div>

<div class='about'>
    <img src='Front/images/txt-file.ico'>
    <div class='about-content'>
        <div class='name'>
        ";
        // line 23
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["block"] ?? null), "post", array()), "title", array()), "html", null, true);
        echo ".txt
        </div>
        <div class='date'>
        created on <span>";
        // line 26
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["block"] ?? null), "created", array()), "html", null, true);
        echo "</span> by <span>";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["block"] ?? null), "author", array()), "username", array()), "html", null, true);
        echo "</span>
        </div>

    </div>
</div>

<div class='title js-toggable'>
    ";
        // line 33
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["block"] ?? null), "post", array()), "title", array()), "html", null, true);
        echo "
    <span class='category'>
        ";
        // line 35
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["block"] ?? null), "post", array()), "type", array()), "html", null, true);
        echo "
    </span>
</div>

<div class='content'>
    ";
        // line 40
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["block"] ?? null), "post", array()), "content", array()), "html", null, true);
        echo "
</div>


<div class='attachments'>
    <div class='title js-toggable'>
        Attachments
    </div>
    <div class='content'>
        <div class='header'>
            <div class='file-name hover-list-name'>file_name:</div>
            <div class='file-type'>file_type:</div>
            <div class='file-size'>file_size:</div>   
        </div>
        ";
        // line 54
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["block"] ?? null), "attachments", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["attachment"]) {
            // line 55
            echo "            <div class=\"hover-list ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["attachment"], "type", array()), "html", null, true);
            echo "\">
                <div class='file-name hover-list-name'>";
            // line 56
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["attachment"], "name", array()), "html", null, true);
            echo "</div>
                <div class='file-type'>";
            // line 57
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["attachment"], "type", array()), "html", null, true);
            echo "</div>
                <div class='file-size'>";
            // line 58
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["attachment"], "size", array()), "html", null, true);
            echo "b</div>   
                <div class='file-open'>Open</div>                
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attachment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 62
        echo "    </div>
</div>

<div class='comments'>
    <div class='comment-title'>Commentars [";
        // line 66
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["block"] ?? null), "comment_count", array()), "html", null, true);
        echo "]</div>
    <div class='comments-content'>
            ";
        // line 68
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["block"] ?? null), "comments", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
            // line 69
            echo "            <div class=\"comment\">
                <div class='comment-author'>";
            // line 70
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["comment"], "username", array()), "html", null, true);
            echo "</div>
                <div class='comment-date'>Posted on ";
            // line 71
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["comment"], "created", array()), "html", null, true);
            echo "</div>
                <div class='comment-content'>";
            // line 72
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["comment"], "content", array()), "html", null, true);
            echo "b</div>   
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 75
        echo "    
    </div>

    ";
        // line 78
        echo twig_get_attribute($this->env, $this->source, ($context["block"] ?? null), "new_comment_form", array());
        echo "

</div>


</div>
";
    }

    public function getTemplateName()
    {
        return "_custom/block//notus-block-post/post-block.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  165 => 78,  160 => 75,  151 => 72,  147 => 71,  143 => 70,  140 => 69,  136 => 68,  131 => 66,  125 => 62,  115 => 58,  111 => 57,  107 => 56,  102 => 55,  98 => 54,  81 => 40,  73 => 35,  68 => 33,  56 => 26,  50 => 23,  34 => 10,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class='post'>

<div class='like'>
    <div class='add btn hover-info'>
        ++
        <div class='hover-info-content'>
            Like post :)
        </div>
    </div>
    <div class='point-count'>{{block.post.points}}</div>
    <div class='remove btn hover-info'>
         --
         <div class='hover-info-content'>
            Dislike post :(
        </div>
    </div>    
</div>

<div class='about'>
    <img src='Front/images/txt-file.ico'>
    <div class='about-content'>
        <div class='name'>
        {{block.post.title}}.txt
        </div>
        <div class='date'>
        created on <span>{{block.created}}</span> by <span>{{block.author.username}}</span>
        </div>

    </div>
</div>

<div class='title js-toggable'>
    {{ block.post.title }}
    <span class='category'>
        {{ block.post.type }}
    </span>
</div>

<div class='content'>
    {{ block.post.content }}
</div>


<div class='attachments'>
    <div class='title js-toggable'>
        Attachments
    </div>
    <div class='content'>
        <div class='header'>
            <div class='file-name hover-list-name'>file_name:</div>
            <div class='file-type'>file_type:</div>
            <div class='file-size'>file_size:</div>   
        </div>
        {% for attachment in block.attachments %}
            <div class=\"hover-list {{attachment.type}}\">
                <div class='file-name hover-list-name'>{{attachment.name}}</div>
                <div class='file-type'>{{attachment.type}}</div>
                <div class='file-size'>{{attachment.size}}b</div>   
                <div class='file-open'>Open</div>                
            </div>
        {% endfor %}
    </div>
</div>

<div class='comments'>
    <div class='comment-title'>Commentars [{{block.comment_count}}]</div>
    <div class='comments-content'>
            {% for comment in block.comments %}
            <div class=\"comment\">
                <div class='comment-author'>{{comment.username}}</div>
                <div class='comment-date'>Posted on {{comment.created}}</div>
                <div class='comment-content'>{{comment.content}}b</div>   
            </div>
        {% endfor %}
    
    </div>

    {{block.new_comment_form | raw}}

</div>


</div>
", "_custom/block//notus-block-post/post-block.twig", "C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\NotusCoreWEB\\Front\\templates\\_custom\\block\\notus-block-post\\post-block.twig");
    }
}
