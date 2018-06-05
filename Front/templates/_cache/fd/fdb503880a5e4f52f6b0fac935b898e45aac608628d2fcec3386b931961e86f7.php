<?php

/* page/notus-page-profile/page.content.twig */
class __TwigTemplate_442efe50a0719ea44c7575838f3ce2ee13efd03c5b7fe321990aecd092702c9e extends Twig_Template
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
        echo "<div class=\"page-profile-content\">
<div class=\"profile-side-menu\">
    <ul class=\"first-level\">
        <li>
            <span class=\"title\">Profile</span>
            <ul>
                <li>about</li>
                
            </ul>
        </li>        
        <li>
            <span class=\"title\">Actions</span>
            <ul>
                <li>change_data</li>
                <li>change_password</li>
                <li data-fade-toggle=\"#logout\">logout</li>
                <li>delete_profile</li>
            </ul>
        </li>
    </ul>
</div>


";
        // line 24
        echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "about", array()), "content", array());
        echo "
<div class=\"stuff\">
";
        // line 26
        echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "my_games", array()), "content", array());
        echo "
";
        // line 27
        echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "my_posts", array()), "content", array());
        echo "
</div>

<div class=\"profile-popups\">
    <div class=\"popup-bg\" id=\"logout\">
        ";
        // line 32
        echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "logout_form", array()), "content", array());
        echo "
    </div>
</div>

<div class=\"side-forms\">
<div class=\"side-form\" id=\"change-data\">
    ";
        // line 38
        echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "change_profile", array()), "content", array());
        echo "
    </div>
</div>

</div>

";
    }

    public function getTemplateName()
    {
        return "page/notus-page-profile/page.content.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  74 => 38,  65 => 32,  57 => 27,  53 => 26,  48 => 24,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"page-profile-content\">
<div class=\"profile-side-menu\">
    <ul class=\"first-level\">
        <li>
            <span class=\"title\">Profile</span>
            <ul>
                <li>about</li>
                
            </ul>
        </li>        
        <li>
            <span class=\"title\">Actions</span>
            <ul>
                <li>change_data</li>
                <li>change_password</li>
                <li data-fade-toggle=\"#logout\">logout</li>
                <li>delete_profile</li>
            </ul>
        </li>
    </ul>
</div>


{{ content.about.content|raw }}
<div class=\"stuff\">
{{ content.my_games.content|raw }}
{{ content.my_posts.content|raw }}
</div>

<div class=\"profile-popups\">
    <div class=\"popup-bg\" id=\"logout\">
        {{ content.logout_form.content|raw }}
    </div>
</div>

<div class=\"side-forms\">
<div class=\"side-form\" id=\"change-data\">
    {{ content.change_profile.content|raw }}
    </div>
</div>

</div>

", "page/notus-page-profile/page.content.twig", "C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\NotusCore\\Front\\templates\\page\\notus-page-profile\\page.content.twig");
    }
}
