<?php

declare(strict_types=1);
/* classes.twig */
class __TwigTemplate_ba882ddf2ac31e20b4438924acec12058fc201f9de0ab9217098b6126337d6ea extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate('layout/layout.twig', 'classes.twig', 1);
        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body_class' => [$this, 'block_body_class'],
            'page_content' => [$this, 'block_page_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        return 'layout/layout.twig';
    }

    protected function doDisplay(array $context, array $blocks = []): void
    {
        // line 2
        $context['__internal_5747de775099ca1573a9239014f06279bf6550ed8d5063a539786e256e049215'] = $this->loadTemplate('macros.twig', 'classes.twig', 2);
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = []): void
    {
        echo 'All Classes | ';
        $this->displayParentBlock('title', $context, $blocks);
    }

    // line 4
    public function block_body_class($context, array $blocks = []): void
    {
        echo 'classes';
    }

    // line 6
    public function block_page_content($context, array $blocks = []): void
    {
        // line 7
        echo '    <div class="page-header">
        <h1>Classes</h1>
    </div>

    ';
        // line 11
        echo $context['__internal_5747de775099ca1573a9239014f06279bf6550ed8d5063a539786e256e049215']->macro_render_classes((isset($context['classes']) || array_key_exists('classes', $context) ? $context['classes'] : (function (): void {
            throw new Twig_Error_Runtime('Variable "classes" does not exist.', 11, $this->source);
        })()));
        echo '
';
    }

    public function getTemplateName()
    {
        return 'classes.twig';
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return [59 => 11,  53 => 7,  50 => 6,  44 => 4,  37 => 3,  33 => 1,  31 => 2,  15 => 1];
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"layout/layout.twig\" %}
{% from \"macros.twig\" import render_classes %}
{% block title %}All Classes | {{ parent() }}{% endblock %}
{% block body_class 'classes' %}

{% block page_content %}
    <div class=\"page-header\">
        <h1>Classes</h1>
    </div>

    {{ render_classes(classes) }}
{% endblock %}
", 'classes.twig', '/home/vagrant/repos/manager/vendor/sami/sami/Sami/Resources/themes/default/classes.twig');
    }
}
