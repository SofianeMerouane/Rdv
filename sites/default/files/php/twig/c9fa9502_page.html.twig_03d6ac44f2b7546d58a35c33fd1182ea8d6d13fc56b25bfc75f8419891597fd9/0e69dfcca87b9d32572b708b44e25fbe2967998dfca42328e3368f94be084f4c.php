<?php

/* themes/space/templates/page.html.twig */
class __TwigTemplate_908986c5d23aedd06dae84f8002f5d6626810f4db4eb8d81ad0045c1fc0b61eb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $tags = array("if" => 67, "set" => 151);
        $filters = array("t" => 92);
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('if', 'set'),
                array('t'),
                array()
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setTemplateFile($this->getTemplateName());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 67
        if ((isset($context["is_front"]) ? $context["is_front"] : null)) {
            // line 68
            echo "  <div id=\"header-top\" class=\"section\">
    ";
            // line 69
            if ((isset($context["header_media_video"]) ? $context["header_media_video"] : null)) {
                // line 70
                echo "      <video id=\"header-video\" class=\"ng-scope\" poster=\"";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["header_video_still"]) ? $context["header_video_still"] : null), "html", null, true));
                echo "\" autoplay loop>
        <source src=\"";
                // line 71
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["header_media_url"]) ? $context["header_media_url"] : null), "html", null, true));
                echo "\" type=\"video/mp4\">
        Your browser does not support the video tag.
      </video>
    ";
            } else {
                // line 75
                echo "      <div id=\"header-image\" style=\"background: #000 url('";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["header_media_url"]) ? $context["header_media_url"] : null), "html", null, true));
                echo "') no-repeat fixed center bottom / cover \"></div>
    ";
            }
            // line 77
            echo "
    ";
            // line 78
            if ((isset($context["overlay_styles"]) ? $context["overlay_styles"] : null)) {
                // line 79
                echo "      <div id=\"header-overlay\" style=\"";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["overlay_styles"]) ? $context["overlay_styles"] : null), "html", null, true));
                echo "\"></div>
    ";
            }
            // line 81
            echo "
    ";
            // line 82
            if ((isset($context["screen"]) ? $context["screen"] : null)) {
                // line 83
                echo "      <div id=\"header-screen\"></div>
    ";
            }
            // line 85
            echo "    ";
            if ((isset($context["fade"]) ? $context["fade"] : null)) {
                // line 86
                echo "      <div id=\"header-bg\"></div>
    ";
            }
            // line 88
            echo "    ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "header_top", array()), "html", null, true));
            echo "

    <div class=\"section layout-container clearfix\">
      ";
            // line 91
            if ((isset($context["logo"]) ? $context["logo"] : null)) {
                // line 92
                echo "        <a href=\"";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["front_page"]) ? $context["front_page"] : null), "html", null, true));
                echo "\" title=\"";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar(t("Home")));
                echo "\" rel=\"home\" id=\"logo\">
          <img src=\"";
                // line 93
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["space_logo"]) ? $context["space_logo"] : null), "html", null, true));
                echo "\" alt=\"";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar(t("Home")));
                echo "\" />
        </a>
      ";
            }
            // line 96
            echo "    </div>
    <div class=\"nav-down\"></div>
  </div>

  <div class=\"separator-wrapper\">
    <div class=\"separator separator-left\"></div>
    <div class=\"joint left\"></div>
    <div class=\"separator separator-middle\"></div>
    <div class=\"joint right\"></div>
    <div class=\"separator separator-right\"></div>
  </div>
";
        }
        // line 108
        echo "
<div id=\"page-wrapper\">
  <div id=\"page\">
    ";
        // line 111
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "main_menu", array())) {
            // line 112
            echo "      <div id=\"main-menu\">
        <!-- Show the site logo -->
        <img alt=\"";
            // line 114
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar(t("Home")));
            echo "\" src=\"";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["space_logo"]) ? $context["space_logo"] : null), "html", null, true));
            echo "\">
        ";
            // line 115
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "main_menu", array()), "html", null, true));
            echo "
      </div>
      <div class=\"menu-hamburger icon-menu\">
      </div>
    ";
        }
        // line 120
        echo "
    ";
        // line 121
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "header", array())) {
            // line 122
            echo "      <header id=\"header\" class=\"header\" role=\"banner\" aria-label=\"";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar(t("Site header")));
            echo "\">
        ";
            // line 123
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "header", array()), "html", null, true));
            echo "
      </header>
    ";
        }
        // line 126
        echo "
    ";
        // line 127
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "featured", array())) {
            // line 128
            echo "      <div class=\"featured\" class=\"section\">
        <aside class=\"featured__inner section layout-container clearfix\" role=\"complementary\">
          ";
            // line 130
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "featured", array()), "html", null, true));
            echo "
        </aside>
      </div>
    ";
        }
        // line 134
        echo "
    ";
        // line 135
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "page_top", array())) {
            // line 136
            echo "      <div class=\"page-top\">
        <aside class=\"page-top__inner section layout-container clearfix\" role=\"complementary\">
          ";
            // line 138
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "page_top", array()), "html", null, true));
            echo "
        </aside>
      </div>
    ";
        }
        // line 142
        echo "
    <div id=\"main-wrapper\" class=\"layout-main-wrapper layout-container clearfix\" style=\"background: ";
        // line 143
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["region_content_image_url"]) ? $context["region_content_image_url"] : null), "html", null, true));
        echo "\">
      ";
        // line 144
        if ((isset($context["region_content_screen"]) ? $context["region_content_screen"] : null)) {
            // line 145
            echo "        <div class=\"screen\"></div>
      ";
        }
        // line 147
        echo "      <div id=\"main\" class=\"layout-main clearfix\">
        ";
        // line 148
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "breadcrumb", array()), "html", null, true));
        echo "

        ";
        // line 150
        if (($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar_left", array()) && $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar_right", array()))) {
            // line 151
            echo "          ";
            $context["content_class"] = "content-both";
            // line 152
            echo "        ";
        } elseif (($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar_left", array()) &&  !$this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar_right", array()))) {
            // line 153
            echo "          ";
            $context["content_class"] = "content-left";
            // line 154
            echo "        ";
        } elseif (($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar_right", array()) &&  !$this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar_left", array()))) {
            // line 155
            echo "          ";
            $context["content_class"] = "content-right";
            // line 156
            echo "        ";
        } elseif (( !$this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar_left", array()) &&  !$this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar_right", array()))) {
            // line 157
            echo "          ";
            $context["content_class"] = "content-full";
            // line 158
            echo "        ";
        }
        // line 159
        echo "
        <main id=\"content\" class=\"column main-content ";
        // line 160
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["content_class"]) ? $context["content_class"] : null), "html", null, true));
        echo "\" role=\"main\">
          ";
        // line 161
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "content_top", array())) {
            // line 162
            echo "            <div class=\"content-top\">
              <aside class=\"content-top__inner section layout-container clearfix\" role=\"complementary\">
                ";
            // line 164
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "content_top", array()), "html", null, true));
            echo "
              </aside>
            </div>
          ";
        }
        // line 168
        echo "
          <section class=\"section\">
            <a id=\"main-content\" tabindex=\"-1\"></a>
            ";
        // line 171
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title_prefix"]) ? $context["title_prefix"] : null), "html", null, true));
        echo "
            ";
        // line 172
        if ((isset($context["title"]) ? $context["title"] : null)) {
            // line 173
            echo "              <h1 class=\"title\" id=\"page-title\">
                ";
            // line 174
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true));
            echo "
              </h1>
            ";
        }
        // line 177
        echo "            ";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title_suffix"]) ? $context["title_suffix"] : null), "html", null, true));
        echo "
            ";
        // line 178
        if ((isset($context["tabs"]) ? $context["tabs"] : null)) {
            // line 179
            echo "              <nav class=\"tabs\" role=\"navigation\" aria-label=\"";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar(t("Tabs")));
            echo "\">
                ";
            // line 180
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["tabs"]) ? $context["tabs"] : null), "html", null, true));
            echo "
              </nav>
            ";
        }
        // line 183
        echo "            ";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "help", array()), "html", null, true));
        echo "
            ";
        // line 184
        if ((isset($context["action_links"]) ? $context["action_links"] : null)) {
            // line 185
            echo "              <ul class=\"action-links\">";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["action_links"]) ? $context["action_links"] : null), "html", null, true));
            echo "</ul>
            ";
        }
        // line 187
        echo "
            ";
        // line 188
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "content", array()), "html", null, true));
        echo "
          </section>

          ";
        // line 191
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "content_bottom", array())) {
            // line 192
            echo "            <div class=\"content-bottom\">
              <aside class=\"content-bottom__inner section layout-container clearfix\" role=\"complementary\">
                ";
            // line 194
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "content_bottom", array()), "html", null, true));
            echo "
              </aside>
            </div>
          ";
        }
        // line 198
        echo "
        </main>
        ";
        // line 200
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar_left", array())) {
            // line 201
            echo "          <div id=\"sidebar-left\" class=\"column sidebar\">
            <aside class=\"section\" role=\"complementary\">
              ";
            // line 203
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar_left", array()), "html", null, true));
            echo "
            </aside>
          </div>
        ";
        }
        // line 207
        echo "        ";
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar_right", array())) {
            // line 208
            echo "          <div id=\"sidebar-right\" class=\"column sidebar\">
            <aside class=\"section\" role=\"complementary\">
              ";
            // line 210
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar_right", array()), "html", null, true));
            echo "
            </aside>
          </div>
        ";
        }
        // line 214
        echo "      </div>
    </div>

    <div class=\"separator-footer\"></div>

    ";
        // line 219
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "content_2", array())) {
            // line 220
            echo "      <div class=\"content_2_wrapper\" style=\"background: ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["region_content_2_image_url"]) ? $context["region_content_2_image_url"] : null), "html", null, true));
            echo "\">
        ";
            // line 221
            if ((isset($context["region_content_2_screen"]) ? $context["region_content_2_screen"] : null)) {
                // line 222
                echo "          <div class=\"screen\"></div>
        ";
            }
            // line 224
            echo "        <div class=\"content_2\">
          <aside class=\"content_2__inner section layout-container clearfix\" role=\"complementary\">
            ";
            // line 226
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "content_2", array()), "html", null, true));
            echo "
          </aside>
        </div>
      </div>
    ";
        }
        // line 231
        echo "
    ";
        // line 232
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "content_3", array())) {
            // line 233
            echo "      <div class=\"content_3_wrapper\" style=\"background: ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["region_content_3_image_url"]) ? $context["region_content_3_image_url"] : null), "html", null, true));
            echo "\">
        ";
            // line 234
            if ((isset($context["region_content_3_screen"]) ? $context["region_content_3_screen"] : null)) {
                // line 235
                echo "          <div class=\"screen\"></div>
        ";
            }
            // line 237
            echo "        <div class=\"content_3\">
          <aside class=\"content_3__inner section layout-container clearfix\" role=\"complementary\">
            ";
            // line 239
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "content_3", array()), "html", null, true));
            echo "
          </aside>
        </div>
      </div>
    ";
        }
        // line 244
        echo "
    ";
        // line 245
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "content_4", array())) {
            // line 246
            echo "      <div class=\"content_4_wrapper\" style=\"background: ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["region_content_4_image_url"]) ? $context["region_content_4_image_url"] : null), "html", null, true));
            echo "\">
        ";
            // line 247
            if ((isset($context["region_content_4_screen"]) ? $context["region_content_4_screen"] : null)) {
                // line 248
                echo "          <div class=\"screen\"></div>
        ";
            }
            // line 250
            echo "        <div class=\"content_4\">
          <aside class=\"content_4__inner section layout-container clearfix\" role=\"complementary\">
            ";
            // line 252
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "content_4", array()), "html", null, true));
            echo "
          </aside>
        </div>
      </div>
    ";
        }
        // line 257
        echo "
    ";
        // line 258
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "content_5", array())) {
            // line 259
            echo "      <div class=\"content_5_wrapper\" style=\"background: ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["region_content_5_image_url"]) ? $context["region_content_5_image_url"] : null), "html", null, true));
            echo "\">
        ";
            // line 260
            if ((isset($context["region_content_5_screen"]) ? $context["region_content_5_screen"] : null)) {
                // line 261
                echo "          <div class=\"screen\"></div>
        ";
            }
            // line 263
            echo "        <div class=\"content_5\">
          <aside class=\"content_5__inner section layout-container clearfix\" role=\"complementary\">
          ";
            // line 265
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "content_5", array()), "html", null, true));
            echo "
          </aside>
        </div>
      </div>
    ";
        }
        // line 270
        echo "
    ";
        // line 271
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "page_bottom", array())) {
            // line 272
            echo "      <div class=\"page-bottom\">
        <aside class=\"page-bottom__inner section layout-container clearfix\" role=\"complementary\">
          ";
            // line 274
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "page_bottom", array()), "html", null, true));
            echo "
        </aside>
      </div>
    ";
        }
        // line 278
        echo "
    <footer class=\"site-footer\">
      ";
        // line 280
        if ((isset($context["social_icons"]) ? $context["social_icons"] : null)) {
            // line 281
            echo "        ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["social_icons"]) ? $context["social_icons"] : null), "html", null, true));
            echo "
      ";
        }
        // line 283
        echo "      ";
        if ((($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "footer_left", array()) || $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "footer_middle", array())) || $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "footer_right", array()))) {
            // line 284
            echo "        <div class=\"site-footer__top layout-container clearfix\">
          ";
            // line 285
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "footer_left", array()), "html", null, true));
            echo "
          ";
            // line 286
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "footer_middle", array()), "html", null, true));
            echo "
          ";
            // line 287
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "footer_right", array()), "html", null, true));
            echo "
        </div>
      ";
        }
        // line 290
        echo "      ";
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "footer_bottom", array())) {
            // line 291
            echo "        ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "footer_bottom", array()), "html", null, true));
            echo "
      ";
        }
        // line 293
        echo "    </footer>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "themes/space/templates/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  550 => 293,  544 => 291,  541 => 290,  535 => 287,  531 => 286,  527 => 285,  524 => 284,  521 => 283,  515 => 281,  513 => 280,  509 => 278,  502 => 274,  498 => 272,  496 => 271,  493 => 270,  485 => 265,  481 => 263,  477 => 261,  475 => 260,  470 => 259,  468 => 258,  465 => 257,  457 => 252,  453 => 250,  449 => 248,  447 => 247,  442 => 246,  440 => 245,  437 => 244,  429 => 239,  425 => 237,  421 => 235,  419 => 234,  414 => 233,  412 => 232,  409 => 231,  401 => 226,  397 => 224,  393 => 222,  391 => 221,  386 => 220,  384 => 219,  377 => 214,  370 => 210,  366 => 208,  363 => 207,  356 => 203,  352 => 201,  350 => 200,  346 => 198,  339 => 194,  335 => 192,  333 => 191,  327 => 188,  324 => 187,  318 => 185,  316 => 184,  311 => 183,  305 => 180,  300 => 179,  298 => 178,  293 => 177,  287 => 174,  284 => 173,  282 => 172,  278 => 171,  273 => 168,  266 => 164,  262 => 162,  260 => 161,  256 => 160,  253 => 159,  250 => 158,  247 => 157,  244 => 156,  241 => 155,  238 => 154,  235 => 153,  232 => 152,  229 => 151,  227 => 150,  222 => 148,  219 => 147,  215 => 145,  213 => 144,  209 => 143,  206 => 142,  199 => 138,  195 => 136,  193 => 135,  190 => 134,  183 => 130,  179 => 128,  177 => 127,  174 => 126,  168 => 123,  163 => 122,  161 => 121,  158 => 120,  150 => 115,  144 => 114,  140 => 112,  138 => 111,  133 => 108,  119 => 96,  111 => 93,  104 => 92,  102 => 91,  95 => 88,  91 => 86,  88 => 85,  84 => 83,  82 => 82,  79 => 81,  73 => 79,  71 => 78,  68 => 77,  62 => 75,  55 => 71,  50 => 70,  48 => 69,  45 => 68,  43 => 67,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Space's theme implementation to display a single page.*/
/*  **/
/*  * Available variables:*/
/*  **/
/*  * General utility variables:*/
/*  * - base_path: The base URL path of the Drupal installation. Will usually be*/
/*  *   "/" unless you have installed Drupal in a sub-directory.*/
/*  * - is_front: A flag indicating if the current page is the front page.*/
/*  * - logged_in: A flag indicating if the user is registered and signed in.*/
/*  * - is_admin: A flag indicating if the user has permission to access*/
/*  *   administration pages.*/
/*  **/
/*  * Site identity:*/
/*  * - front_page: The URL of the front page. Use this instead of base_path when*/
/*  *   linking to the front page. This includes the language domain or prefix.*/
/*  * - logo: The url of the logo image, as defined in theme settings.*/
/*  * - site_name: The name of the site. This is empty when displaying the site*/
/*  *   name has been disabled in the theme settings.*/
/*  * - site_slogan: The slogan of the site. This is empty when displaying the site*/
/*  *   slogan has been disabled in theme settings.*/
/*  * - hide_site_name: A flag indicating if the site name has been toggled off on*/
/*  *   the theme settings page. If hidden, the "visually-hidden" class is added*/
/*  *   to make the site name visually hidden, but still accessible.*/
/*  * - hide_site_slogan: A flag indicating if the site slogan has been toggled off*/
/*  *   on the theme settings page. If hidden, the "visually-hidden" class is*/
/*  *   added to make the site slogan visually hidden, but still accessible.*/
/*  **/
/*  * Page content (in order of occurrence in the default page.html.twig):*/
/*  * - title_prefix: Additional output populated by modules, intended to be*/
/*  *   displayed in front of the main title tag that appears in the template.*/
/*  * - title: The page title, for use in the actual content.*/
/*  * - title_suffix: Additional output populated by modules, intended to be*/
/*  *   displayed after the main title tag that appears in the template.*/
/*  * - tabs: Tabs linking to any sub-pages beneath the current page (e.g., the*/
/*  *   view and edit tabs when displaying a node).*/
/*  * - action_links: Actions local to the page, such as "Add menu" on the menu*/
/*  *   administration interface.*/
/*  * - node: Fully loaded node, if there is an automatically-loaded node*/
/*  *   associated with the page and the node ID is the second argument in the*/
/*  *   page's path (e.g. node/12345 and node/12345/revisions, but not*/
/*  *   comment/reply/12345).*/
/*  **/
/*  * Regions:*/
/*  * - page.header_top: Items for the header top region.*/
/*  * - page.header: Items for the header region.*/
/*  * - page.main_menu: The main menu of the site.*/
/*  * - messages: Site message display region.*/
/*  * - page_top: Items for the top of the page.*/
/*  * - content_top: Items that display above the content region.*/
/*  * - content: Items for the content region.*/
/*  * - content_bottom: Items that will show under the content region.*/
/*  * - left_sidebar: Items for the left sidebar region.*/
/*  * - right_sidebar: Items for the right sidebar region.*/
/*  * - page_bottom: Items for the page bottom region.*/
/*  * - footer_left: Items for the footer left region.*/
/*  * - footer_middle: Items for the footer middle region.*/
/*  * - footer_right: Items for the footer right region.*/
/*  **/
/*  * @see template_preprocess_page()*/
/*  * @see space_preprocess_page()*/
/*  * @see html.html.twig*/
/*  *//* */
/* #}*/
/* {% if is_front %}*/
/*   <div id="header-top" class="section">*/
/*     {% if header_media_video %}*/
/*       <video id="header-video" class="ng-scope" poster="{{ header_video_still }}" autoplay loop>*/
/*         <source src="{{ header_media_url }}" type="video/mp4">*/
/*         Your browser does not support the video tag.*/
/*       </video>*/
/*     {% else %}*/
/*       <div id="header-image" style="background: #000 url('{{ header_media_url }}') no-repeat fixed center bottom / cover "></div>*/
/*     {% endif %}*/
/* */
/*     {% if overlay_styles %}*/
/*       <div id="header-overlay" style="{{ overlay_styles }}"></div>*/
/*     {% endif %}*/
/* */
/*     {% if screen %}*/
/*       <div id="header-screen"></div>*/
/*     {% endif %}*/
/*     {% if fade %}*/
/*       <div id="header-bg"></div>*/
/*     {% endif %}*/
/*     {{ page.header_top }}*/
/* */
/*     <div class="section layout-container clearfix">*/
/*       {% if logo %}*/
/*         <a href="{{ front_page }}" title="{{ 'Home'|t }}" rel="home" id="logo">*/
/*           <img src="{{ space_logo }}" alt="{{ 'Home'|t }}" />*/
/*         </a>*/
/*       {% endif %}*/
/*     </div>*/
/*     <div class="nav-down"></div>*/
/*   </div>*/
/* */
/*   <div class="separator-wrapper">*/
/*     <div class="separator separator-left"></div>*/
/*     <div class="joint left"></div>*/
/*     <div class="separator separator-middle"></div>*/
/*     <div class="joint right"></div>*/
/*     <div class="separator separator-right"></div>*/
/*   </div>*/
/* {% endif %}*/
/* */
/* <div id="page-wrapper">*/
/*   <div id="page">*/
/*     {% if page.main_menu %}*/
/*       <div id="main-menu">*/
/*         <!-- Show the site logo -->*/
/*         <img alt="{{ 'Home'|t }}" src="{{ space_logo }}">*/
/*         {{ page.main_menu }}*/
/*       </div>*/
/*       <div class="menu-hamburger icon-menu">*/
/*       </div>*/
/*     {% endif %}*/
/* */
/*     {% if page.header %}*/
/*       <header id="header" class="header" role="banner" aria-label="{{ 'Site header'|t}}">*/
/*         {{ page.header }}*/
/*       </header>*/
/*     {% endif %}*/
/* */
/*     {% if page.featured %}*/
/*       <div class="featured" class="section">*/
/*         <aside class="featured__inner section layout-container clearfix" role="complementary">*/
/*           {{ page.featured }}*/
/*         </aside>*/
/*       </div>*/
/*     {% endif %}*/
/* */
/*     {% if page.page_top %}*/
/*       <div class="page-top">*/
/*         <aside class="page-top__inner section layout-container clearfix" role="complementary">*/
/*           {{ page.page_top }}*/
/*         </aside>*/
/*       </div>*/
/*     {% endif %}*/
/* */
/*     <div id="main-wrapper" class="layout-main-wrapper layout-container clearfix" style="background: {{ region_content_image_url }}">*/
/*       {% if region_content_screen %}*/
/*         <div class="screen"></div>*/
/*       {% endif %}*/
/*       <div id="main" class="layout-main clearfix">*/
/*         {{ page.breadcrumb }}*/
/* */
/*         {% if page.sidebar_left and page.sidebar_right %}*/
/*           {% set content_class = 'content-both' %}*/
/*         {% elseif page.sidebar_left and not page.sidebar_right %}*/
/*           {% set content_class = 'content-left' %}*/
/*         {% elseif page.sidebar_right and not page.sidebar_left %}*/
/*           {% set content_class = 'content-right' %}*/
/*         {% elseif not page.sidebar_left and not page.sidebar_right %}*/
/*           {% set content_class = 'content-full' %}*/
/*         {% endif %}*/
/* */
/*         <main id="content" class="column main-content {{ content_class }}" role="main">*/
/*           {% if page.content_top %}*/
/*             <div class="content-top">*/
/*               <aside class="content-top__inner section layout-container clearfix" role="complementary">*/
/*                 {{ page.content_top }}*/
/*               </aside>*/
/*             </div>*/
/*           {% endif %}*/
/* */
/*           <section class="section">*/
/*             <a id="main-content" tabindex="-1"></a>*/
/*             {{ title_prefix }}*/
/*             {% if title %}*/
/*               <h1 class="title" id="page-title">*/
/*                 {{ title }}*/
/*               </h1>*/
/*             {% endif %}*/
/*             {{ title_suffix }}*/
/*             {% if tabs %}*/
/*               <nav class="tabs" role="navigation" aria-label="{{ 'Tabs'|t }}">*/
/*                 {{ tabs }}*/
/*               </nav>*/
/*             {% endif %}*/
/*             {{ page.help }}*/
/*             {% if action_links %}*/
/*               <ul class="action-links">{{ action_links }}</ul>*/
/*             {% endif %}*/
/* */
/*             {{ page.content }}*/
/*           </section>*/
/* */
/*           {% if page.content_bottom %}*/
/*             <div class="content-bottom">*/
/*               <aside class="content-bottom__inner section layout-container clearfix" role="complementary">*/
/*                 {{ page.content_bottom }}*/
/*               </aside>*/
/*             </div>*/
/*           {% endif %}*/
/* */
/*         </main>*/
/*         {% if page.sidebar_left %}*/
/*           <div id="sidebar-left" class="column sidebar">*/
/*             <aside class="section" role="complementary">*/
/*               {{ page.sidebar_left }}*/
/*             </aside>*/
/*           </div>*/
/*         {% endif %}*/
/*         {% if page.sidebar_right %}*/
/*           <div id="sidebar-right" class="column sidebar">*/
/*             <aside class="section" role="complementary">*/
/*               {{ page.sidebar_right }}*/
/*             </aside>*/
/*           </div>*/
/*         {% endif %}*/
/*       </div>*/
/*     </div>*/
/* */
/*     <div class="separator-footer"></div>*/
/* */
/*     {% if page.content_2 %}*/
/*       <div class="content_2_wrapper" style="background: {{ region_content_2_image_url }}">*/
/*         {% if region_content_2_screen %}*/
/*           <div class="screen"></div>*/
/*         {% endif %}*/
/*         <div class="content_2">*/
/*           <aside class="content_2__inner section layout-container clearfix" role="complementary">*/
/*             {{ page.content_2 }}*/
/*           </aside>*/
/*         </div>*/
/*       </div>*/
/*     {% endif %}*/
/* */
/*     {% if page.content_3 %}*/
/*       <div class="content_3_wrapper" style="background: {{ region_content_3_image_url }}">*/
/*         {% if region_content_3_screen %}*/
/*           <div class="screen"></div>*/
/*         {% endif %}*/
/*         <div class="content_3">*/
/*           <aside class="content_3__inner section layout-container clearfix" role="complementary">*/
/*             {{ page.content_3 }}*/
/*           </aside>*/
/*         </div>*/
/*       </div>*/
/*     {% endif %}*/
/* */
/*     {% if page.content_4 %}*/
/*       <div class="content_4_wrapper" style="background: {{ region_content_4_image_url }}">*/
/*         {% if region_content_4_screen %}*/
/*           <div class="screen"></div>*/
/*         {% endif %}*/
/*         <div class="content_4">*/
/*           <aside class="content_4__inner section layout-container clearfix" role="complementary">*/
/*             {{ page.content_4 }}*/
/*           </aside>*/
/*         </div>*/
/*       </div>*/
/*     {% endif %}*/
/* */
/*     {% if page.content_5 %}*/
/*       <div class="content_5_wrapper" style="background: {{ region_content_5_image_url }}">*/
/*         {% if region_content_5_screen %}*/
/*           <div class="screen"></div>*/
/*         {% endif %}*/
/*         <div class="content_5">*/
/*           <aside class="content_5__inner section layout-container clearfix" role="complementary">*/
/*           {{ page.content_5 }}*/
/*           </aside>*/
/*         </div>*/
/*       </div>*/
/*     {% endif %}*/
/* */
/*     {% if page.page_bottom %}*/
/*       <div class="page-bottom">*/
/*         <aside class="page-bottom__inner section layout-container clearfix" role="complementary">*/
/*           {{ page.page_bottom }}*/
/*         </aside>*/
/*       </div>*/
/*     {% endif %}*/
/* */
/*     <footer class="site-footer">*/
/*       {% if social_icons %}*/
/*         {{ social_icons }}*/
/*       {% endif %}*/
/*       {% if page.footer_left or page.footer_middle or page.footer_right %}*/
/*         <div class="site-footer__top layout-container clearfix">*/
/*           {{ page.footer_left }}*/
/*           {{ page.footer_middle }}*/
/*           {{ page.footer_right }}*/
/*         </div>*/
/*       {% endif %}*/
/*       {% if page.footer_bottom %}*/
/*         {{ page.footer_bottom }}*/
/*       {% endif %}*/
/*     </footer>*/
/*   </div>*/
/* </div>*/
/* */
