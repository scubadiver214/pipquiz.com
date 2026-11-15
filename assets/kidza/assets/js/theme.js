; (function ($) {

    "use strict";

    var pxl_scroll_top;
    var pxl_window_height;
    var pxl_window_width;
    var pxl_scroll_status = '';
    var pxl_last_scroll_top = 0;
    var pxl_image_slip = false;
    $(window).on('load', function () {
        $(".pxl-loader").addClass("is-loaded");
        $('.pxl-element-slider').css('opacity', '1');
        $('.pxl-element-slider').css('transition-delay', '300ms');
        $('.pxl-element-slider2').css('opacity', '1');
        $('.pxl-element-slider2').css('transition-delay', '300ms');
        $('.pxl-gallery-scroll').parents('body').addClass('body-overflow').addClass('body-visible-sm');
        pxl_window_width = $(window).width();
        pxl_window_height = $(window).height();
        kidza_header_sticky();
        kidza_header_mobile();
        kidza_scroll_to_top();
        kidza_footer_fixed();
        kidza_shop_quantity();
        kidza_submenu_responsive();
        kidza_column_stretch();
        kidza_panel_anchor_popup();
        kidza_webgl_effects();
        kidza_cursor_mouse();
        skrollr.init({
            smoothScrolling: true,
            smoothScrollingDuration: 200,
        });

        var s = skrollr.init({
            smoothScrolling: true,
            smoothScrollingDuration: 200,
        });
        if (s.isMobile()) {
            s.destroy();
        }
    });
    jQuery(document).ready(function ($) {
        let selectedRating = 0;

        $(".commentratingbox .star").each(function (index) {
            $(this).on("mouseenter", function () {
                highlightStars(index);
            });
            $(this).on("mouseleave", function () {
                highlightStars(selectedRating - 1);
            });
            $(this).on("click", function () {
                selectedRating = index + 1;
                $(".commentratingbox input").prop("checked", false);
                $(".commentratingbox input").eq(index).prop("checked", true);
                highlightStars(index);
            });
        });

        function highlightStars(index) {
            $(".commentratingbox .star").each(function (i) {
                const svg = $(this).find("svg");
                if (i <= index) {
                    svg.css("fill", "#F15F25"); 
                } else {
                    svg.css("fill", "#ccc");
                }
            });
        }
    });

    $(window).on('scroll', function () {
        pxl_scroll_top = $(window).scrollTop();
        pxl_window_height = $(window).height();
        pxl_window_width = $(window).width();
        if (pxl_scroll_top < pxl_last_scroll_top) {
            pxl_scroll_status = 'up';
        } else {
            pxl_scroll_status = 'down';
        }
        pxl_last_scroll_top = pxl_scroll_top;
        kidza_header_sticky();
        kidza_scroll_to_top();
        kidza_footer_fixed();
        kidza_post_slip();
    });

    $(window).on('resize', function () {
        pxl_window_height = $(window).height();
        pxl_window_width = $(window).width();
        kidza_submenu_responsive();
        kidza_header_mobile();
        kidza_column_stretch();
    });
    // scroll image
    $(document).ready(function () {
        kidza_el_parallax();
        let observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    $(entry.target).addClass("visible");
                }
                // else {
                //     $(entry.target).removeClass("visible");
                // }
            });
        }, { threshold: 0.7 }); 

        $(".pxl-blog-grid-layout2 .pxl-grid-inner, .pxl-blog-grid-layout3 .pxl-grid-inner").each(function () {
            observer.observe(this);
        });
        //slider revolution
        $('.tp-tabs, .tp-thumb, .tp-bullet').on('click', function () {
            var revapi = jQuery(this).closest('.rev_slider_wrapper').find('.rev_slider').revSlider();
            revapi.revkill();
            setTimeout(function () {
                revapi.revresume();
            }, 100);
        });
    });
    //Fix Basic Gallery
        $(document).on('click', '.pxl-image-grid', function(){
            setTimeout(function(){
               $('img.elementor-lightbox-image').each(function() {
                $(this).attr('src', $(this).data('src'));
            });
           });

        });
    //paralax
    function kidza_el_parallax() {
        $('.btn-text-parallax').on('mouseenter', function () {
            $(this).addClass('hovered');
        });
        $('.btn-text-parallax').on('mouseleave', function () {
            $(this).removeClass('hovered');
        });
        $('.btn-text-parallax').on('mousemove', function (e) {
            const bounds = this.getBoundingClientRect();
            const centerX = bounds.left + bounds.width / 2;
            const centerY = bounds.top + bounds.height;
            const deltaX = Math.floor((centerX - e.clientX)) * 0.172;
            const deltaY = Math.floor((centerY - e.clientY)) * 0.273;
            $(this).find('.pxl--btn-text').css({
                transform: 'translate3d(' + deltaX * 0.32 + 'px, ' + deltaY * 0.32 + 'px, 0px)'
            });
            $(this).css({
                transform: 'translate3d(' + deltaX * 0.25 + 'px, ' + deltaY * 0.25 + 'px, 0px)'
            });
        });

        $('.el-parallax-wrap').each(function () {
            $(this).on('mouseenter', function () {
                $(this).addClass('hovered');
            });

            $(this).on('mouseleave', function () {
                $(this).removeClass('hovered');
            });

            $(this).on('mousemove', function (e) {
                const bounds = this.getBoundingClientRect();
                const centerX = bounds.left + bounds.width / 2;
                const centerY = bounds.top + bounds.height;
                const deltaX = Math.floor((centerX - e.clientX)) * 0.222;
                const deltaY = Math.floor((centerY - e.clientY)) * 0.333;
                $(this).find('.el-parallax-item').css({
                    transform: 'translate3d(' + deltaX * 0.32 + 'px, ' + deltaY * 0.32 + 'px, 0px)'
                });
            });
        });

        $('.pxl-hover-parallax').on('mousemove', function (e) {
            const bounds = this.getBoundingClientRect();
            const centerX = bounds.left + bounds.width / 2;
            const centerY = bounds.top + bounds.height;
            const deltaX = Math.floor((centerX - e.clientX)) * 0.222;
            const deltaY = Math.floor((centerY - e.clientY)) * 0.333;
            $(this).find('.pxl-item-parallax').css({
                transform: 'translate3d(' + deltaX * 0.32 + 'px, ' + deltaY * 0.32 + 'px, 0px)'
            });
        });
    }
    //end paralax
    //sea-ripple
    $('.water-effect').ripples({
        resolution: 512,
        dropRadius: 20,
        perturbance: 0.04,
    });
    //end scroll image
    $(document).ready(function () {
        kidza_post_slip();

        $('.pxl-logo-nav').parents('#pxl-header-elementor').addClass('pxl-header-rmboxshadow');

        //

        const imageContainers = $('.pxl-image-tab .pxl-container');
        if (imageContainers.length > 0) {
            imageContainers.first().addClass('active');
        }

        imageContainers.on('click', function () {
            imageContainers.removeClass('active');
            $(this).addClass('active');
        });

        //

        /* Start Menu Mobile */
        $('.pxl-header-menu li.menu-item-has-children, .pxl-nav-hidden li.menu-item-has-children, .pxl-menu-primary li.menu-item-has-children').append('<span class="pxl-menu-toggle"></span>');
        $('.pxl-menu-toggle').on('click', function () {
            if ($(this).hasClass('active')) {
                $(this).closest('ul').find('.pxl-menu-toggle.active').toggleClass('active');
                $(this).closest('ul').find('.sub-menu.active').toggleClass('active').slideToggle();
                $(this).closest('ul').find('a.active').toggleClass('active');
            } else {
                $(this).closest('ul').find('.pxl-menu-toggle.active').toggleClass('active');
                $(this).closest('ul').find('.sub-menu.active').toggleClass('active').slideToggle();
                $(this).closest('ul').find('a.active').toggleClass('active');
                $(this).toggleClass('active');
                $(this).parent().find('> .sub-menu').toggleClass('active');
                $(this).parent().find('> .sub-menu').slideToggle();
                $(this).parent().find('> a').toggleClass('active');
            }
        });
        $('.menu-parallax > li > a > span').on('click', function () {
            if ($(this).parent().hasClass('active')) {
                $(this).closest('ul').find('.pxl-menu-toggle.active').toggleClass('active');
                $(this).closest('ul').find('.sub-menu.active').toggleClass('active').slideToggle();
                $(this).closest('ul').find('a.active').toggleClass('active');
            } else {
                $(this).closest('ul').find('.pxl-menu-toggle.active').toggleClass('active');
                $(this).closest('ul').find('.sub-menu.active').toggleClass('active').slideToggle();
                $(this).closest('ul').find('a.active').toggleClass('active');
                $(this).parent().toggleClass('active');
                $(this).parents('li').find('> .pxl-menu-toggle').toggleClass('active');
                $(this).parents('li').find('> .sub-menu').toggleClass('active');
                $(this).parents('li').find('> .sub-menu').slideToggle();
            }
        });
        $('.pxl-parent-transition').each(function () {
            $(this).find('.pxl-transtion').addClass('pxl-hover-transition');
            $(this).hover(function () {
                $(this).find('.pxl-transtion').addClass('pxl-hover-transition');
            });
            $('.pxl-switch-button').on('mouseover', function () {
                $(this).find('.pxl-transtion').removeClass('pxl-hover-transition');
            });
        });
        $('.menu-parallax .sub-menu > li > a, .menu-vertical .sub-menu > li > a').on('click', function () {
            $(this).toggleClass('active');
            $(this).closest('li').find('> .pxl-menu-toggle').toggleClass('active');
            $(this).closest('li').find('> .sub-menu').toggleClass('active');
            $(this).closest('li').find('> .sub-menu').slideToggle();
        });
        $('.menu-vertical > li > a').on('click', function () {
            if ($(this).hasClass('active')) {
                $(this).closest('ul').find('.pxl-menu-toggle.active').toggleClass('active');
                $(this).closest('ul').find('.sub-menu.active').toggleClass('active').slideToggle();
                $(this).closest('ul').find('a.active').toggleClass('active');
            } else {
                $(this).closest('ul').find('.pxl-menu-toggle.active').toggleClass('active');
                $(this).closest('ul').find('.sub-menu.active').toggleClass('active').slideToggle();
                $(this).closest('ul').find('a.active').toggleClass('active');
                $(this).toggleClass('active');
                $(this).parents('li').find('> .pxl-menu-toggle').toggleClass('active');
                $(this).parents('li').find('> .sub-menu').toggleClass('active');
                $(this).parents('li').find('> .sub-menu').slideToggle();
            }
        });

        $("#pxl-nav-mobile").on('click', function () {
            $(this).toggleClass('active');
            $('body').toggleClass('body-overflow');
            $('.pxl-header-menu').toggleClass('active');
        });

        $(".pxl-menu-close, .pxl-header-menu-backdrop, #pxl-header-mobile .pxl-menu-primary a.is-one-page").on('click', function () {
            $(this).parents('.pxl-header-main').find('.pxl-header-menu').removeClass('active');
            $('#pxl-nav-mobile').removeClass('active');
            $('body').toggleClass('body-overflow');
        });
        /* End Menu Mobile */

        /* Elementor Header */
        $('.pxl-type-header-clip > .elementor-container').append('<div class="pxl-header-shape"><span></span></div>');
        $('.pxl-fade-scroll').on('click', function () {
            $('html, body').animate({ scrollTop: 0 }, 1000);
            return false;
        })
        /* Scroll To Top */
        $('.pxl-scroll-top').on('click', function () {
            $('html, body').animate({ scrollTop: 0 }, 800);
            return false;
        });

        /* Animate Time Delay */
        $('.pxl-grid-masonry').each(function () {
            var eltime = 40;
            var elt_inner = $(this).children().length;
            var _elt = elt_inner - 1;
            $(this).find('> .pxl-grid-item > .wow').each(function (index, obj) {
                $(this).css('animation-delay', eltime + 'ms');
                if (_elt === index) {
                    eltime = 40;
                    _elt = _elt + elt_inner;
                } else {
                    eltime = eltime + 40;
                }
            });
        });

        $('.pxl-item--text').each(function () {
            var pxl_time = 0;
            var pxl_item_inner = $(this).children().length;
            var _elt = pxl_item_inner - 1;
            $(this).find('> .pxl-text--slide > .wow').each(function (index, obj) {
                $(this).css('transition-delay', pxl_time + 'ms');
                if (_elt === index) {
                    pxl_time = 0;
                    _elt = _elt + pxl_item_inner;
                } else {
                    pxl_time = pxl_time + 80;
                }
            });
        });

        /* Demo purposes only */
        $(".hover").mouseleave(
            function () {
                $(this).removeClass("hover");
            }
        );
        /* Post Feature - Image Swiper */
        const postfeatureSlider = $(".pxl-image--swiper");
        if (postfeatureSlider.length) {
            postfeatureSlider.slick({
                dots: false,
                infinite: false,
                arrows: false,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: false,
                autoplaySpeed: 2000,
            });
            let isAtLastSlide = false;
            let isAtFirstSlide = true;
            postfeatureSlider.on('wheel', function (e) {
                const currentSlide = $(this).slick('slickCurrentSlide');
                const slideCount = $(this).slick('getSlick').slideCount;
                isAtLastSlide = (currentSlide === slideCount - 1);
                isAtFirstSlide = (currentSlide === 0);
                if (isAtLastSlide && e.originalEvent.deltaY > 0) {
                    return true;
                }
                else if (isAtFirstSlide && e.originalEvent.deltaY < 0) {
                    return true;
                }
                else {
                    e.preventDefault();
                    if (e.originalEvent.deltaY < 0) {
                        $(this).slick('slickPrev');
                    } else {
                        $(this).slick('slickNext');
                    }
                }
            });
            $('.pxl-swiper-arrow-prev').on('click', function () {
                postfeatureSlider.slick('slickPrev');
            });

            $('.pxl-swiper-arrow-next').on('click', function () {
                postfeatureSlider.slick('slickNext');
            });
            postfeatureSlider.on('afterChange', function (event, slick, currentSlide) {
                isAtLastSlide = (currentSlide === slick.slideCount - 1);
                isAtFirstSlide = (currentSlide === 0);
            });
            //

            //
        }

        /* Lightbox Popup */
        $('.btn-video, .pxl-video-popup, .pxl--link-popup').magnificPopup({
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });

        $('.images-light-box').each(function () {
            $(this).magnificPopup({
                delegate: 'a.light-box',
                type: 'image',
                gallery: {
                    enabled: true
                },
                mainClass: 'mfp-fade',
            });
        });

        /* Parallax */
        if ($('#pxl-page-title-default').hasClass('pxl--parallax')) {
            $(this).stellar();
        }

        /* Animate Time */
        $('.btn-nina').each(function () {
            var eltime = 0.045;
            var elt_inner = $(this).children().length;
            var _elt = elt_inner - 1;
            $(this).find('> .pxl--btn-text > span').each(function (index, obj) {
                $(this).css('transition-delay', eltime + 's');
                eltime = eltime + 0.045;
            });
        });

        /* Text Load Animate */
        $('.pxl-loader-text').each(function () {
            var pxl_text_load = "kidza";
            $(this).html(pxl_text_load.split('').map(function (char) {
                return '<span>' + char + '</span>';
            }));
        });

        /* Text Blog Carousel Hover */
        $('.pxl-blog-carousel1 .pxl-item--inner .pxl-item--title a').each(function () {
            var text = $(this).text().trim();
            var html = text.split('').map(function (char, index) {
                return '<span class="char" style="--char-index:' + index + ';">' + char + '</span>';
            }).join('');
            $(this).html(html);
        });

        /* Text Blog Gird Hover */
        $('.pxl-portfolio-style2 .pxl-item--inner .pxl-post-min--inner .pxl-item--number, .pxl-portfolio-style2 .pxl-item--inner .pxl-post-min--inner .pxl-post--title').each(function () {
            var text = $(this).text().trim();
            var html = text.split('').map(function (char, index) {
                return '<span class="char" style="--char-index:' + index + ';">' + char + '</span>';
            }).join('');
            $(this).html(html);
        });

        /* Service Box Grid */

    });
    function kidza_cursor_mouse() {
        console.clear();
        const circle = document.querySelector('.pxl-cursor-circle');
        if (!circle) {
            return;
        }
        const mouse = { x: 0, y: 0 }, prevMouse = { x: 0, y: 0 }, pos = { x: 0, y: 0 };
        let scale = 0, targetScale = 1, angle = 0;

        window.addEventListener('mousemove', e => (mouse.x = e.x, mouse.y = e.y));
        document.querySelectorAll('a, [data-hover]').forEach(el => {
            el.addEventListener('mouseenter', () => targetScale = 0.3);
            el.addEventListener('mouseleave', () => targetScale = 1);
        });

        const tick = () => {
            const speed = 0.17, scaleSpeed = 0.15;
            pos.x += (mouse.x - pos.x) * speed;
            pos.y += (mouse.y - pos.y) * speed;

            const dx = mouse.x - prevMouse.x, dy = mouse.y - prevMouse.y;
            prevMouse.x = mouse.x, prevMouse.y = mouse.y;

            const velocity = Math.min(Math.hypot(dx, dy) * 4, 150);
            const scaleValue = (velocity / 150) * 0.5;
            scale += (targetScale - scale) * scaleSpeed;

            if (velocity > 20) angle = Math.atan2(dy, dx) * 180 / Math.PI;

            circle.style.transform = `translate(${pos.x}px, ${pos.y}px) rotate(${angle}deg) scale(${scale * (1 + scaleValue)}, ${scale * (1 - scaleValue)})`;
            requestAnimationFrame(tick);
        };
        tick();
    }
    function toggleLoader(show) {
        if (show) {
            $('.pxl-box-grid1').addClass('change-loader');
        } else {
            $('.pxl-box-grid1').removeClass('change-loader');
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        toggleLoader(true);

    });
    /* Custom WebGL Effects */
    function kidza_webgl_effects() {

        var WebGL_vs = `#ifdef GL_ES
        precision mediump float;
        #endif
    
        attribute vec3 aVertexPosition;
        attribute vec2 aTextureCoord;
    
        uniform mat4 uMVMatrix;
        uniform mat4 uPMatrix;
    
        uniform mat4 texture0Matrix;
        uniform mat4 texture1Matrix;
        uniform mat4 mapMatrix;
    
        varying vec3 vVertexPosition;
        varying vec2 vTextureCoord0;
        varying vec2 vTextureCoord1;
        varying vec2 vTextureCoordMap;
    
        void main() {
            vec3 vertexPosition = aVertexPosition;
    
            gl_Position = uPMatrix * uMVMatrix * vec4(vertexPosition, 1.0);
    
            vTextureCoord0 = (texture0Matrix * vec4(aTextureCoord, 0., 1.)).xy;
            vTextureCoord1 = (texture1Matrix * vec4(aTextureCoord, 0., 1.)).xy;
            vTextureCoordMap = (mapMatrix * vec4(aTextureCoord, 0., 1.)).xy;
            vVertexPosition = vertexPosition;
        }`;

        var WebGL_fs = `#ifdef GL_ES
        precision mediump float;
        #endif
    
        #define PI2 6.28318530718
        #define PI 3.14159265359
        #define S(a,b,n) smoothstep(a,b,n)
    
        uniform float uTime;
        uniform float uProgress;
        uniform vec2 uReso;
        uniform vec2 uMouse;
    
        varying vec3 vVertexPosition;
        varying vec2 vTextureCoord0;
        varying vec2 vTextureCoord1;
        varying vec2 vTextureCoordMap;
    
        uniform sampler2D texture0;
        uniform sampler2D texture1;
        uniform sampler2D map;
    
        float exponentialEasing (float x, float a){
    
            float epsilon = 0.00001;
            float min_param_a = 0.0 + epsilon;
            float max_param_a = 1.0 - epsilon;
            a = max(min_param_a, min(max_param_a, a));
    
            if (a < 0.5){
                a = 2.0 * a;
                float y = pow(x, a);
                return y;
            } else {
                a = 2.0 * (a-0.5);
                float y = pow(x, 1.0 / (1.-a));
                return y;
            }
        }
    
        vec4 blur13(sampler2D image, vec2 uv, vec2 resolution, vec2 direction) {
            vec4 color = vec4(0.0);
            vec2 off1 = vec2(1.411764705882353) * direction;
            vec2 off2 = vec2(3.2941176470588234) * direction;
            vec2 off3 = vec2(5.176470588235294) * direction;
            color += texture2D(image, uv) * 0.1964825501511404;
            color += texture2D(image, uv + (off1 / resolution)) * 0.2969069646728344;
            color += texture2D(image, uv - (off1 / resolution)) * 0.2969069646728344;
            color += texture2D(image, uv + (off2 / resolution)) * 0.09447039785044732;
            color += texture2D(image, uv - (off2 / resolution)) * 0.09447039785044732;
            color += texture2D(image, uv + (off3 / resolution)) * 0.010381362401148057;
            color += texture2D(image, uv - (off3 / resolution)) * 0.010381362401148057;
            return color;
        }
    
        void main(){
            vec2 uv0 = vTextureCoord0;
            vec2 uv1 = vTextureCoord1;
    
            float progress0 = uProgress;
            float progress1 = 1. - uProgress;
    
            vec4 map = blur13(map, vTextureCoordMap, uReso, vec2(2.)) + 0.5;
    
            uv0.x += progress0 * map.r;
            uv1.x -= progress1 * map.r;
    
            vec4 color = texture2D( texture0, uv0 );
            vec4 color1 = texture2D( texture1, uv1 );
    
            gl_FragColor = mix(color, color1, progress0 );
        }`;
        class WebglHover {
            constructor(set) {
                this.canvas = set.canvas;
                this.webGLCurtain = new Curtains({
                    container: this.canvas,
                    watchScroll: false,
                    pixelRatio: Math.min(1.5, window.devicePixelRatio)
                })
                this.planeElement = set.planeElement;
                this.mouse = {
                    x: 0,
                    y: 0
                };
                this.params = {
                    vertexShader: WebGL_vs,
                    fragmentShader: WebGL_fs,
                    widthSegments: 40,
                    heightSegments: 40,
                    uniforms: {
                        time: {
                            name: "uTime",
                            type: "1f",
                            value: 0
                        },
                        mousepos: {
                            name: "uMouse",
                            type: "2f",
                            value: [0, 0]
                        },
                        resolution: {
                            name: "uReso",
                            type: "2f",
                            value: [innerWidth, innerHeight]
                        },
                        progress: {
                            name: "uProgress",
                            type: "1f",
                            value: 0
                        }
                    }
                };
                this.initPlane();
            }

            initPlane() {
                this.plane = this.webGLCurtain.addPlane(this.planeElement, this.params);
                // this.plane = new Plane(this.webGLCurtain, this.planeElement, this.params)

                if (this.plane) {
                    this.plane.onReady(() => {
                        this.update();
                        this.initEvent();
                    });
                }
            }

            update() {
                this.plane.onRender(() => {
                    this.plane.uniforms.time.value += 0.01;
                    this.plane.uniforms.resolution.value = [innerWidth, innerHeight];
                });
            }

            initEvent() {
                this.planeElement.addEventListener("mouseenter", e => {
                    gsap.to(this.plane.uniforms.progress, .8, {
                        value: 1
                    });
                });

                this.planeElement.addEventListener("mouseout", e => {
                    gsap.to(this.plane.uniforms.progress, .8, {
                        value: 0
                    });
                });
            }
        }

        if (navigator.userAgent.indexOf('Safari') == -1 || navigator.userAgent.indexOf('Chrome') > -1) {
            $('.pxl-image-magic.normal').each(function () {
                const $this = $(this),
                    canvas = $this.find('.canvas')[0],
                    planeElement = $this.find('.item--image')[0],
                    initialized = $this.data('initialized');

                if (!initialized && canvas && planeElement) {
                    new WebglHover({
                        canvas: canvas,
                        planeElement: planeElement
                    });
                    $this.data('initialized', true);
                }
            });
        }

        // Effect Expo
        var WebExpo_vs = `#ifdef GL_ES
        precision mediump float;
        #endif
    
        attribute vec3 aVertexPosition;
        attribute vec2 aTextureCoord;
    
        uniform mat4 uMVMatrix;
        uniform mat4 uPMatrix;
    
        varying vec2 vTextureCoord;
    
        void main() {
            gl_Position = uPMatrix * uMVMatrix * vec4(aVertexPosition, 1.0);
    
            vTextureCoord = aTextureCoord;
        }`;

        var WebExpo_fs = `
        #ifdef GL_ES
        precision mediump float;
        #endif
    
        varying vec3 vVertexPosition;
        varying vec2 vTextureCoord;
    
        uniform float uTime;
    
        uniform sampler2D planeTexture;
    
        void main() {
            vec2 textureCoord = vTextureCoord;
    
            const float PI = 3.141592;
    
            textureCoord.x += (
            sin(textureCoord.x * 2.5 + ((uTime * (PI / 3.0)) * 0.031))
            + sin(textureCoord.y * 2.5 + ((uTime * (PI / 2.489)) * 0.017))
            ) * 0.0075;
    
            textureCoord.y += (
            sin(textureCoord.y * 2.5 + ((uTime * (PI / 2.023)) * 0.023))
            + sin(textureCoord.x * 2.5 + ((uTime * (PI / 3.1254)) * 0.037))
            ) * 0.0125;
    
            gl_FragColor = texture2D(planeTexture, textureCoord);
        }
        `;

        class WebGLExpo {
            constructor(set) {
                this.canvas = set.canvas;
                this.webGLCurtain = new Curtains({
                    container: this.canvas,
                    watchScroll: false,
                    pixelRatio: Math.min(1.5, window.devicePixelRatio)
                })
                this.planeElement = set.planeElement;
                this.mouse = {
                    x: 0,
                    y: 0
                };
                this.params = {
                    vertexShader: WebExpo_vs,
                    fragmentShader: WebExpo_fs,
                    widthSegments: 40,
                    heightSegments: 40,
                    uniforms: {
                        time: {
                            name: "uTime",
                            type: "1f",
                            value: 0
                        },
                        mousepos: {
                            name: "uMouse",
                            type: "2f",
                            value: [0, 0]
                        },
                        resolution: {
                            name: "uReso",
                            type: "2f",
                            value: [innerWidth, innerHeight]
                        },
                        progress: {
                            name: "uProgress",
                            type: "1f",
                            value: 0
                        }
                    }
                };
                this.initPlane();
            }

            initPlane() {
                this.plane = this.webGLCurtain.addPlane(this.planeElement, this.params);
                // this.plane = new Plane(this.webGLCurtain, this.planeElement, this.params)

                if (this.plane) {
                    this.plane.onReady(() => {
                        this.update();
                        this.initEvent();
                    });
                }
            }

            update() {
                this.plane.onRender(() => {
                    this.plane.uniforms.resolution.value = [innerWidth, innerHeight];
                });
            }

            initEvent() {
                let isHovered = false;

                this.planeElement.addEventListener("mouseenter", e => {
                    isHovered = true;
                });

                this.planeElement.addEventListener("mouseout", e => {
                    isHovered = false;
                });

                this.plane.onRender(() => {
                    if (isHovered) {
                        this.plane.uniforms.time.value++;
                    }
                });

            }
        }

        if (navigator.userAgent.indexOf('Safari') == -1 || navigator.userAgent.indexOf('Chrome') > -1) {
            $('.pxl-image-magic.expo').each(function () {
                const $this = $(this),
                    canvas = $this.find('.canvas')[0],
                    planeElement = $this.find('.item--image')[0],
                    initialized = $this.data('initialized');

                if (!initialized && canvas && planeElement) {
                    new WebGLExpo({
                        canvas: canvas,
                        planeElement: planeElement
                    });
                    $this.data('initialized', true);
                }
            });
        }

        // Effect Wave
        const WebWave_vs = `
        precision mediump float;
    
        attribute vec3 aVertexPosition;
        attribute vec2 aTextureCoord;
    
        uniform mat4 uMVMatrix;
        uniform mat4 uPMatrix;
    
        varying vec3 vVertexPosition;
        varying vec2 vTextureCoord;
    
        uniform float uTime;
    
        void main() {
            vec3 vertexPosition = aVertexPosition;
    
            float waveCoords = ((uTime / 45.0) * 3.5) - 1.75;
    
            float distanceToWave = distance(vec2(vertexPosition.x, 0.0), vec2(waveCoords, 0.0));
    
            vertexPosition.z -= (cos(clamp(distanceToWave, 0.0, 0.75) * 3.141592) - cos(0.75 * 3.141592) + (2.0 * sin(3.141592 * uTime / 90.0))) * 0.025;
    
            gl_Position = uPMatrix * uMVMatrix * vec4(vertexPosition, 1.0);
    
            vTextureCoord = aTextureCoord;
            vVertexPosition = vertexPosition;
        }
        `;

        const WebWave_fs = `precision mediump float;
    
        uniform float uTime;
    
        varying vec3 vVertexPosition;
        varying vec2 vTextureCoord;
    
        uniform sampler2D uExample;
    
    
        void main() {
    
            vec2 textureCoords = vec2(vTextureCoord.x, vTextureCoord.y);
            vec4 finalColor = texture2D(uExample, textureCoords);
    
            gl_FragColor = finalColor;
        }`;

        class ImgCurtain {
            constructor(set) {
                this.canvas = set.canvas;
                this.webGLCurtain = new Curtains({
                    container: this.canvas,
                    watchScroll: false,
                    pixelRatio: Math.min(1.5, window.devicePixelRatio)
                })
                this.planeElement = set.planeElement;
                this.mouse = {
                    x: 0,
                    y: 0
                };
                this.params = {
                    vertexShader: WebWave_vs,
                    fragmentShader: WebWave_fs,
                    widthSegments: 40,
                    heightSegments: 40,
                    uniforms: {
                        time: {
                            name: "uTime",
                            type: "1f",
                            value: 0
                        },
                        resolution: {
                            name: "uReso",
                            type: "2f",
                            value: [innerWidth, innerHeight]
                        }
                    }
                };
                this.initPlane();
            }

            initPlane() {
                this.plane = this.webGLCurtain.addPlane(this.planeElement, this.params);

                if (this.plane) {
                    this.plane.onReady(() => {
                        this.update();
                        this.initEvent();
                    });
                }
            }

            update() {
                this.plane.onRender(() => {
                    this.plane.uniforms.time.value += 0.01;
                    this.plane.uniforms.resolution.value = [innerWidth, innerHeight];
                });
            }

            initEvent() {
                let isHovered = false;

                this.planeElement.addEventListener("mouseenter", e => {
                    isHovered = true;
                });

                this.planeElement.addEventListener("mouseout", e => {
                    isHovered = false;
                });

                this.plane.onRender(() => {
                    if (isHovered) {
                        this.plane.uniforms.time.value += (45 - this.plane.uniforms.time.value) * 0.0375;
                    } else {
                        this.plane.uniforms.time.value += (0 - this.plane.uniforms.time.value) * 0.0375;
                    }
                });
            }
        }

        if (navigator.userAgent.indexOf('Safari') == -1 || navigator.userAgent.indexOf('Chrome') > -1) {
            $('.pxl-image-magic.wave').each(function () {
                const $this = $(this),
                    canvas = $this.find('.canvas')[0],
                    planeElement = $this.find('.item--image')[0],
                    initialized = $this.data('initialized');

                if (!initialized && canvas && planeElement) {
                    new ImgCurtain({
                        canvas: canvas,
                        planeElement: planeElement
                    });
                    $this.data('initialized', true);
                }
            });
        }


        if (/^((?!chrome|android).)*safari/i.test(navigator.userAgent)) {
            $('.pxl-image-magic .image-front').css('opacity', '1');
        }

    }

    // end webGl 
    window.addEventListener('load', function () {
        toggleLoader(false);
    });

    $('.pxl-box-grid1 .pxl-grid-item').each(function () {
        var bg = $(this).css('background-image');
        bg = bg.replace('url(', '').replace(')', '').replace(/\"/gi, "");

        $(this).hover(function () {
            toggleLoader(true);

            setTimeout(() => {
                $('.bgr-change').css({
                    'opacity': '0',
                    'transform': 'scale(1.05)',
                });
                setTimeout(() => {
                    $('.bgr-change').css('background-image', 'url(' + bg + ')');
                    $('.bgr-change').css({
                        'opacity': '1',
                        'transform': 'scale(1)',
                    });
                    $('.bgr-change').on('load', function () {
                        toggleLoader(false);
                    });
                }, 350);
            }, 350);
        }, function () {
            // Hover out
        });
    });

    $('.pxl-button').each(function () {
        $(this).find('a.btn-gsap').each(function () {
            const button = this;

            button.addEventListener('mousemove', function (evt) {
                const movX = evt.clientX - this.getBoundingClientRect().x;
                gsap.to(this.querySelector(".button-spotlight"), {
                    x: movX,
                    scale: 60,
                    duration: 0.4
                });
            });

            button.addEventListener('mouseleave', function (evt) {
                const movX = evt.clientX - this.getBoundingClientRect().x;
                gsap.to(this.querySelector(".button-spotlight"), {
                    x: movX,
                    scale: 0,
                    duration: 0.4
                });
            });
        });
    });
    // button kid effect
    
    // end effect kid 
    /* Search Popup */
    $(".pxl-search-popup-button").on('click', function () {

        $('#pxl-search-popup').addClass('active');
        setTimeout(function () {
            $('#pxl-search-popup .search-field').focus();
        }, 1000);
    });
    $("#pxl-search-popup .pxl-item--overlay, #pxl-search-popup .pxl-item--close").on('click', function () {
        $('body').removeClass('body-overflow');
        $('#pxl-search-popup').removeClass('active');
    });

    /* Hidden Panel */
    $(".pxl-hidden-panel-button").on('click', function () {
        $('body').addClass('body-overflow');
        $('#pxl-hidden-panel-popup').addClass('active');
    });
    $("#pxl-hidden-panel-popup .pxl-item--overlay, #pxl-hidden-panel-popup .pxl-item--close").on('click', function () {
        $('body').removeClass('body-overflow');
        $('#pxl-hidden-panel-popup').removeClass('active');
    });

    /* Cart Sidebar Popup */
    $(".pxl-cart-sidebar-button").on('click', function () {
        $('body').addClass('body-overflow');
        $('#pxl-cart-sidebar').addClass('active');
    });
    $("#pxl-cart-sidebar .pxl-item--overlay, #pxl-cart-sidebar .pxl-item--close").on('click', function () {
        $('body').removeClass('body-overflow');
        $('#pxl-cart-sidebar').removeClass('active');
    });

    /* Popup */
    $(".pxl-popup-button").on('click', function () {
        $('body').addClass('body-overflow');
        $('#pxl-popup-elementor').addClass('active');
        $('#pxl-popup-elementor').removeClass('deactivation');
    });
    $("#pxl-popup-elementor .pxl-item--overlay, #pxl-popup-elementor .pxl-item--close, .pxl-menu-primary a.is-one-page").on('click', function () {
        $('body').removeClass('body-overflow');
        $('#pxl-popup-elementor').removeClass('active');
        $('#pxl-popup-elementor').addClass('deactivation');
    });

    /* Login */
    $('.pxl-modal-close').on('click', function () {
        $(this).parent().removeClass('open').addClass('remove');
        $(this).parents('body').removeClass('ov-hidden');
    });
    $('.btn-sign-up').on('click', function () {
        $('.pxl-user-register').addClass('u-open').removeClass('u-close');
        $('.pxl-user-login').addClass('u-close').removeClass('u-open');
    });
    $('.btn-sign-in').on('click', function () {
        $('.pxl-user-register').addClass('u-close').removeClass('u-open');
        $('.pxl-user-login').addClass('u-open').removeClass('u-close');
    });
    $('.pxl-user-have-an-account').on('click', function () {
        $(this).parents('.pxl-modal-content').find('.pxl-user-register').addClass('u-close').removeClass('u-open');
        $(this).parents('.pxl-modal-content').find('.pxl-user-login').addClass('u-open').removeClass('u-close');
    });
    $('.h-btn-user').on('click', function () {
        $('.pxl-user-popup').addClass('open').removeClass('remove');
        $(this).find('.pxl-user-account').toggleClass('active');
    });

    /* Hover Active Item */
    $('.pxl--widget-hover').each(function () {
        $(this).on('mouseenter', function () {
            $(this).parents('.elementor-row').find('.pxl--widget-hover').removeClass('pxl--item-active');
            $(this).parents('.elementor-container').find('.pxl--widget-hover').removeClass('pxl--item-active');
            $(this).addClass('pxl--item-active');
        }).on('mouseleave', function () {
            // If you need to do something on mouse leave, add the logic here
            // For example, removing the class when the mouse leaves the element
            // $(this).removeClass('pxl--item-active');
        });
    });

    $(".pxl-portfolio-modern1 .pxl-portfolio--content .pxl-portfolio--item")
        .on("mouseenter", function () {
            $(this).addClass("active");
            $(".pxl-portfolio-modern1 .pxl-portfolio--images .pxl-portfolio--featured").removeClass('active');
            var selected_item = $(this).find(".pxl-content--inner").attr("data-image");
            $(selected_item).addClass('active').removeClass('non-active');
        })
        .on("mouseleave", function () {
            $(this).removeClass('active');
            $(".pxl-portfolio-modern1 .pxl-portfolio--images .pxl-portfolio--featured").removeClass('non-active');
            var selected_item = $(this).find(".pxl-content--inner").attr("data-image");
            $(selected_item).removeClass('active').addClass('non-active');
        });

    // CSS transition for smooth effect
    $(".pxl-portfolio-modern1 .pxl-portfolio--item, .pxl-portfolio-modern1 .pxl-list--images .pxl-list--featured")
        .css("transition", "all 0.3s ease");

    // CSS transition for smooth effect list modern
    $(".pxl-list-modern1 .pxl--item")
        .on("mouseenter", function () {
            $(this).addClass("active");
            $(".pxl-list-modern1 .pxl-list--images .pxl-list--featured").removeClass('active');
            var selected_item = $(this).attr("data-image");
            $(selected_item).addClass('active').removeClass('non-active');
        })
        .on("mouseleave", function () {
            $(this).removeClass('active');
            $(".pxl-list-modern1 .pxl-list--images .pxl-list--featured").removeClass('non-active');
            var selected_item = $(this).attr("data-image");
            $(selected_item).removeClass('active').addClass('non-active');
        });

    // CSS transition for smooth effect
    $(".pxl-list-modern1 .pxl--item, .pxl-list-modern1 .pxl-list--images .pxl-list--featured")
        .css("transition", "all 0.3s ease");

    /* Hover Button */
    $('.btn-plus-text').hover(function () {
        $(this).find('span').toggle(300);
    });

    /* Nav Logo */
    $(".pxl-nav-button").on('click', function () {
        $('.pxl-nav-button').toggleClass('active');
        $('.pxl-nav-button').parent().find('.pxl-nav-wrap').toggle(400);
    });

    /* Button Mask */
    $('.pxl-btn-effect4').append('<span class="pxl-btn-mask"></span>');

    /* Start Icon Bounce */
    var boxEls = $('.el-bounce, .pxl-image-effect1');
    $.each(boxEls, function (boxIndex, boxEl) {
        loopToggleClass(boxEl, 'bounce-active');
    });

    function loopToggleClass(el, toggleClass) {
        el = $(el);
        let counter = 0;
        if (el.hasClass(toggleClass)) {
            waitFor(function () {
                counter++;
                return counter == 2;
            }, function () {
                counter = 0;
                el.removeClass(toggleClass);
                loopToggleClass(el, toggleClass);
            }, 'Deactivate', 1000);
        } else {
            waitFor(function () {
                counter++;
                return counter == 3;
            }, function () {
                counter = 0;
                el.addClass(toggleClass);
                loopToggleClass(el, toggleClass);
            }, 'Activate', 1000);
        }
    }

    function waitFor(condition, callback, message, time) {
        if (message == null || message == '' || typeof message == 'undefined') {
            message = 'Timeout';
        }
        if (time == null || time == '' || typeof time == 'undefined') {
            time = 100;
        }
        var cond = condition();
        if (cond) {
            callback();
        } else {
            setTimeout(function () {
                waitFor(condition, callback, message, time);
            }, time);
        }
    }
    /* End Icon Bounce */

    /* Image Effect */
    if ($('.pxl-image-tilt').length) {
        $('.pxl-image-tilt').parents('.elementor-top-section').addClass('pxl-image-tilt-active');
        $('.pxl-image-tilt').each(function () {
            var pxl_maxtilt = $(this).data('maxtilt'),
                pxl_speedtilt = $(this).data('speedtilt'),
                pxl_perspectivetilt = $(this).data('perspectivetilt');
            VanillaTilt.init(this, {
                max: pxl_maxtilt,
                speed: pxl_speedtilt,
                perspective: pxl_perspectivetilt
            });
        });
    }


    /* Select Theme Style */
    $('.wpcf7-select').each(function () {
        var $this = $(this), numberOfOptions = $(this).children('option').length;

        $this.addClass('pxl-select-hidden');
        $this.wrap('<div class="pxl-select"></div>');
        $this.after('<div class="pxl-select-higthlight"></div>');

        var $styledSelect = $this.next('div.pxl-select-higthlight');
        $styledSelect.text($this.children('option').eq(0).text());

        var $list = $('<ul />', {
            'class': 'pxl-select-options'
        }).insertAfter($styledSelect);

        for (var i = 0; i < numberOfOptions; i++) {
            $('<li />', {
                text: $this.children('option').eq(i).text(),
                rel: $this.children('option').eq(i).val()
            }).appendTo($list);
        }

        var $listItems = $list.children('li');

        $styledSelect.on('click', function (e) {
            e.stopPropagation();
            $('div.pxl-select-higthlight.active').not(this).each(function () {
                $(this).removeClass('active').next('ul.pxl-select-options').addClass('pxl-select-lists-hide');
            });
            $(this).toggleClass('active');
        });

        $listItems.on('click', function (e) {
            e.stopPropagation();
            $styledSelect.text($(this).text()).removeClass('active');
            $hiddenInput.val($(this).attr('rel'));
        });

        $(document).on('click', function () {
            $styledSelect.removeClass('active');
        });

    });

    /* Custom One Page by theme */
    if ($('.pxl-link-scroll1').length) {
        $('.pxl-item--onepage').on('click', function (e) {
            var _this = $(this);
            var _link = $(this).attr('href');
            var _id_data = e.currentTarget.hash;
            var _offset;
            var _data_offset = $(this).attr('data-onepage-offset');
            if (_data_offset) {
                _offset = _data_offset;
            } else {
                _offset = 0;
            }
            if ($(_id_data).length === 1) {
                var _target = $(_id_data);
                $('.pxl-onepage-active').removeClass('pxl-onepage-active');
                _this.addClass('pxl-onepage-active');
                $('html, body').stop().animate({ scrollTop: _target.offset().top - _offset }, 1000);
                return false;
            } else {
                window.location.href = _link;
            }
            return false;
        });
        $.each($('.pxl-item--onepage'), function (index, item) {
            var target = $(item).attr('href');
            var el = $(target);
            var _data_offset = $(item).attr('data-onepage-offset');
            var waypoint = new Waypoint({
                element: el[0],
                handler: function (direction) {
                    if (direction === 'down') {
                        $('.pxl-onepage-active').removeClass('pxl-onepage-active');
                        $(item).addClass('pxl-onepage-active');
                    }
                    else if (direction === 'up') {
                        var prev = $(item).parent().prev().find('.pxl-item--onepage');
                        $(item).removeClass('pxl-onepage-active');
                        if (prev.length > 0)
                            prev.addClass('pxl-onepage-active');
                    }
                },
                offset: _data_offset,
            });
        });
    }

    /* Nice Select */
    $('.woocommerce-ordering .orderby, #pxl-sidebar-area select, .variations_form.cart .variations select').each(function () {
        $(this).niceSelect();
    });

    /* Carousel Mousewheel */
    var scrollContainer = document.querySelectorAll('.pxl-carousel-mousewheel .pxl-swiper-container');
    scrollContainer.forEach(function (ec) {
        ec.addEventListener("wheel", (evt) => {
            evt.preventDefault();
            ec.scrollLeft += evt.deltaY;
            ec.animate({ scrollLeft: "+=100" }, 800);
        });
    });

    $('.pxl-carousel-mousewheel, .pxl-mouse-wheel').on('DOMMouseScroll mousewheel', function (ev) {
        var $this = $(this),
            scrollTop = this.scrollTop,
            scrollHeight = this.scrollHeight,
            height = $this.height(),
            delta = (ev.type == 'DOMMouseScroll' ?
                ev.originalEvent.detail * -40 :
                ev.originalEvent.wheelDelta),
            up = delta > 0;

        var prevent = function () {
            ev.stopPropagation();
            ev.preventDefault();
            ev.returnValue = false;
            return false;
        }

        if (!up && -delta > scrollHeight - height - scrollTop) {
            $this.scrollTop(scrollHeight);
            return prevent();
        } else if (up && delta > scrollTop) {
            $this.scrollTop(0);
            return prevent();
        }
    });

    /* Related Post - Slick Slider */
    const postSlider = $(".pxl-related-post .pxl-related-post-inner");

    postSlider.slick({
        dots: false,
        infinite: true,
        arrows: false,
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplay: false,
        pauseOnHover: true,
        autoplaySpeed: 2000,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    dots: false,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ]
    });

    postSlider.on('wheel', function (e) {
        e.preventDefault();
        if (e.originalEvent.deltaY < 0) {
            $(this).slick('slickNext');
        } else {
            $(this).slick('slickPrev');
        }
    });

    /* Related Post Type - Slick Slider */
    const projectsSlider = $(".pxl-related-portfolio .pxl-related-post-inner, .pxl-related-service .pxl-related-post-inner");

    projectsSlider.slick({
        dots: false,
        infinite: true,
        arrows: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: false,
        pauseOnHover: true,
        autoplaySpeed: 2000,
        responsive: [
            {
                breakpoint: 881,
                settings: {
                    dots: false,
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 471,
                settings: {
                    dots: false,
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    projectsSlider.on('wheel', function (e) {
        e.preventDefault();
        if (e.originalEvent.deltaY < 0) {
            $(this).slick('slickNext');
        } else {
            $(this).slick('slickPrev');
        }
    });

    /* author_star */
    $('#author_star').on('change', function () {
        var selectedValue = $(this).val();
        $('.pxl-star').text(selectedValue);
    });

    /* Item Hover - Description */
    $(".pxl-content-effect .pxl-item--inner").hover(
        function () {
            $(this).find('.pxl-item--effect').slideToggle(400);
        }, function () {
            $(this).find('.pxl-item--effect').slideToggle(400);
        }
    );

    /* Typewriter */
    if ($('.pxl-title--typewriter').length) {
        function typewriterOut(elements, callback) {
            if (elements.length) {
                elements.eq(0).addClass('is-active');
                elements.eq(0).delay(3000);
                elements.eq(0).removeClass('is-active');
                typewriterOut(elements.slice(1), callback);
            }
            else {
                callback();
            }
        }

        function typewriterIn(elements, callback) {
            if (elements.length) {
                elements.eq(0).addClass('is-active');
                elements.eq(0).delay(3000).slideDown(3000, function () {
                    elements.eq(0).removeClass('is-active');
                    typewriterIn(elements.slice(1), callback);
                });
            }
            else {
                callback();
            }
        }

        function typewriterInfinite() {
            typewriterOut($('.pxl-title--typewriter .pxl-item--text'), function () {
                typewriterIn($('.pxl-title--typewriter .pxl-item--text'), function () {
                    typewriterInfinite();
                });
            });
        }
        $(function () {
            typewriterInfinite();
        });
    }
    /* End Typewriter */

    /* Section Particles */
    setTimeout(function () {
        $(".pxl-row-particles").each(function () {
            particlesJS($(this).attr('id'), {
                "particles": {
                    "number": {
                        "value": $(this).data('number'),
                    },
                    "color": {
                        "value": $(this).data('color')
                    },
                    "shape": {
                        "type": "circle",
                    },
                    "size": {
                        "value": $(this).data('size'),
                        "random": $(this).data('size-random'),
                    },
                    "line_linked": {
                        "enable": false,
                    },
                    "move": {
                        "enable": true,
                        "speed": 2,
                        "direction": $(this).data('move-direction'),
                        "random": true,
                        "out_mode": "out",
                    }
                },
                "retina_detect": true
            });
        });
    }, 400);

    /* Get checked input - Mailchimpp */
    $('.mc4wp-form input:checkbox').change(function () {
        if ($(this).is(":checked")) {
            $('.mc4wp-form').addClass("pxl-input-checked");
        } else {
            $('.mc4wp-form').removeClass("pxl-input-checked");
        }
    });

    /* Alert */
    $(".pxl-alert .pxl-alert--close").on('click', function () {
        $(this).parent().fadeOut();
    });

    /* Widget remove arrow */
    $('.widget .pxl-count').parent().addClass('pxl-rm-arrow');

    /* Scroll to content */
    $('.pxl-link-to-section .btn').on('click', function (e) {
        var id_scroll = $(this).attr('href');
        var offsetScroll = $('.pxl-header-elementor-sticky').outerHeight();
        e.preventDefault();
        $("html, body").animate({ scrollTop: $(id_scroll).offset().top - offsetScroll }, 600);
    });

    /* Header Remove Index */
    $('.pxl-header--rmindex').parents('#pxl-header-elementor').addClass('pxl-header--rmindex-action');



    jQuery(document).ajaxComplete(function (event, xhr, settings) {
        kidza_shop_quantity();
    });

    jQuery(document).on('updated_wc_div', function () {
        kidza_shop_quantity();
    });

    /* Header Sticky */
    function kidza_header_sticky() {
        if ($('#pxl-header-elementor').hasClass('is-sticky')) {
            if (pxl_scroll_top > 100) {
                $('.pxl-header-elementor-sticky.pxl-sticky-stb').addClass('pxl-header-fixed');
                $('#pxl-header-mobile').addClass('pxl-header-mobile-fixed');
            } else {
                $('.pxl-header-elementor-sticky.pxl-sticky-stb').removeClass('pxl-header-fixed');
                $('#pxl-header-mobile').removeClass('pxl-header-mobile-fixed');
            }

            if (pxl_scroll_status == 'up' && pxl_scroll_top > 100) {
                $('.pxl-header-elementor-sticky.pxl-sticky-stt').addClass('pxl-header-fixed');
            } else {
                $('.pxl-header-elementor-sticky.pxl-sticky-stt').removeClass('pxl-header-fixed');
            }
        }

        $('.pxl-header-elementor-sticky').parents('body').addClass('pxl-header-sticky');
    }

    /* Header Mobile */
    function kidza_header_mobile() {
        var h_header_mobile = $('#pxl-header-elementor').outerHeight();
        if (pxl_window_width < 1199) {
            $('#pxl-header-elementor').css('min-height', h_header_mobile + 'px');
        }
    }

    // Menu reveal
    $('.pxl-hidden-meta').on('click', function () {
        $('.pxl-menu-reveal2').toggleClass('pxl-menu-open');
    });
    // Menu hidden-sidebar
    $('.pxl-hidden-sidebar li.menu-item-has-children').append('<a class="ct-menu-sidebar caseicon-angle-arrow-down"></a>');
    $('.ct-menu-sidebar').on('click', function () {
        if ($(this).hasClass('active')) {
            $(this).closest('ul').find('.ct-menu-sidebar.active').toggleClass('active');
            $(this).closest('ul').find('.sub-menu.active').toggleClass('active').slideToggle();
        } else {
            $(this).closest('ul').find('.ct-menu-sidebar.active').toggleClass('active');
            $(this).closest('ul').find('.sub-menu.active').toggleClass('active').slideToggle();
            $(this).toggleClass('active');
            $(this).parent().find('> .sub-menu').toggleClass('active');
            $(this).parent().find('> .sub-menu').slideToggle();
        }
    });


    /* Scroll To Top */
    function kidza_scroll_to_top() {
        if (pxl_scroll_top < pxl_window_height) {
            $('.pxl-scroll-top').addClass('pxl-off').removeClass('pxl-on');
        }
        if (pxl_scroll_top > pxl_window_height) {
            $('.pxl-scroll-top').addClass('pxl-on').removeClass('pxl-off');
        }
    }

    /* Footer Fixed */
    function kidza_footer_fixed() {
        setTimeout(function () {
            var h_footer = $('.pxl-footer-fixed #pxl-footer-elementor').outerHeight() - 1;
            $('.pxl-footer-fixed #pxl-main').css('margin-bottom', h_footer + 'px');
        }, 600);
    }

    /* Image Slip */
    function kidza_post_slip() {
        var windowHeight = window.innerHeight;
        var windowWidth = window.innerWidth;
        var scrollTop = $(window).scrollTop();

        jQuery('.pxl-post-image--track').each(function () {
            var topLimit = parseFloat(jQuery('.pxl-post-icon').first().css('top'));
            var bottomLimit = parseFloat(jQuery('.pxl-post-icon').first().outerHeight())
                + parseFloat(jQuery('.pxl-post-block_2').css('margin-top'));

            jQuery('.pxl-post-icon').removeClass('end').each(function (is) {
                var currentTop = jQuery(this).offset().top - scrollTop - topLimit;

                var c = parseFloat(currentTop / bottomLimit);
                if (c < 0) c = 0;
                else if (c > 1) c = 1;

                if (c == 0 || is == 0) {
                    jQuery(this).addClass('active');

                } else jQuery(this).removeClass('active');

                if (c < .5 || is == 0) jQuery(this).addClass('preactive');
                else jQuery(this).removeClass('preactive');
            });

            jQuery('.pxl-post-icon.preactive').slice(0, -1).removeClass('active').addClass('end');
        });

        if ($('.pxl-image-slip, .pxl-post-slip').length) {
            var offsetTop = $('.pxl-image-slip, .pxl-post-slip').offset().top + (windowWidth >= 1200 ? 500 : 100) - windowHeight;
            if ((scrollTop >= offsetTop) && !pxl_image_slip) {
                for (var i = 1; i <= 20; i++) {
                    setTimeout(function (index) {
                        $(".pxl-post-block_" + index).addClass("slip-active");
                    }, 100 * i, i);
                }

                pxl_image_slip = true;
            }
        }
    }


    /* WooComerce Quantity */
    function kidza_shop_quantity() {
        "use strict";
        $('#pxl-wapper .quantity').append('<span class="quantity-icon quantity-down pxl-icon--minus"></span><span class="quantity-icon quantity-up "> </span>');
        $('.quantity-up').on('click', function () {
            $(this).parents('.quantity').find('input[type="number"]').get(0).stepUp();
            $(this).parents('.woocommerce-cart-form').find('.actions .button').removeAttr('disabled');
        });
        $('.quantity-down').on('click', function () {
            $(this).parents('.quantity').find('input[type="number"]').get(0).stepDown();
            $(this).parents('.woocommerce-cart-form').find('.actions .button').removeAttr('disabled');
        });
        $('.quantity-icon').on('click', function () {
            var quantity_number = $(this).parents('.quantity').find('input[type="number"]').val();
            var add_to_cart_button = $(this).parents(".product, .woocommerce-product-inner").find(".add_to_cart_button");
            add_to_cart_button.attr('data-quantity', quantity_number);
            add_to_cart_button.attr("href", "?add-to-cart=" + add_to_cart_button.attr("data-product_id") + "&quantity=" + quantity_number);
        });
        $('.woocommerce-cart-form .actions .button').removeAttr('disabled');
    }

    function kidza_panel_anchor_popup() {
        'use strict';
        $(document).on('mouseenter', '.pxl-action-popup', function () {
            if (!$(this).data('magnific-initialized')) {
                $(this).magnificPopup({
                    type: 'iframe',
                    mainClass: 'mfp-fade',
                    removalDelay: 160,
                    preloader: false,
                    fixedContentPos: false
                }).data('magnific-initialized', true);
            }
        });
    }

    /* Menu Responsive Dropdown */
    function kidza_submenu_responsive() {
        var $kidza_menu = $('.pxl-header-elementor-main');
        $kidza_menu.find('.pxl-menu-primary li').each(function () {
            var $kidza_submenu = $(this).find('> ul.sub-menu');
            if ($kidza_submenu.length == 1) {
                if (($kidza_submenu.offset().left + $kidza_submenu.width() + 200) > $(window).width()) {
                    $kidza_submenu.addClass('pxl-sub-reverse');
                }
            }
        });
    }
    if ($('.pxl-btn-view-demos').length) {
        $('.pxl-btn-view-demos').on('click', function (e) {
            e.preventDefault();
            let section = $(document).find('.pxl-elementor-section-demos');

            if (section.length > 0) {
                let targetPosition = section[0].getBoundingClientRect().top + window.pageYOffset;
                let startPosition = window.pageYOffset;
                let duration = 1000;
                let startTime = null;

                function smoothScroll(currentTime) {
                    if (!startTime) startTime = currentTime;
                    let timeElapsed = currentTime - startTime;
                    let progress = Math.min(timeElapsed / duration, 1);
                    let ease = progress < 0.5
                        ? 2 * progress * progress
                        : -1 + (4 - 2 * progress) * progress;
                    window.scrollTo(0, startPosition + (targetPosition - startPosition) * ease);
                    if (timeElapsed < duration) {
                        requestAnimationFrame(smoothScroll);
                    }
                }
                requestAnimationFrame(smoothScroll);
            }
        });
    }
    /* Menu Column Stretch Left/Right */
    function kidza_column_stretch() {
        var $column_stretch = $('.pxl-column--bg');
        $column_stretch.each(function () {
            if ($column_stretch.length == 1) {
                var $col_offset = $column_stretch.offset().left;
                var $width_el = $column_stretch.outerWidth();;
                var $number_stretch = pxl_window_width - $col_offset - $width_el;
                var $t = $width_el + $number_stretch + 15;

                $column_stretch.css('width', $t + 'px');
            }
        });
    }

})(jQuery);