(function ($) {
    "use strict";
    function kidzaElBeforeRender() {
        let _elementor = typeof elementor != 'undefined' ? elementor : elementorFrontend;
        _elementor.hooks.addFilter('pxl_element_container/before-render', function (output, settings) {
            if (typeof settings.pxl_parallax_bg_img != 'undefined' && settings.pxl_parallax_bg_img.url != '') {
                output += '<div class="pxl-section-bg-parallax"></div>';
            }
            return output;
        });
    }

    //maque
    function kidza_text_marquee($scope) {
        const text_marquee = $scope.find('.pxl-text--marquee');
        const boxes = gsap.utils.toArray(text_marquee);
        const loop = text_horizontalLoop(boxes, { paused: false, repeat: -1, });
        function text_horizontalLoop(items, config) {
            items = gsap.utils.toArray(items);
            config = config || {};
            let tl = gsap.timeline({ repeat: config.repeat, paused: config.paused, defaults: { ease: "none" }, onReverseComplete: () => tl.totalTime(tl.rawTime() + tl.duration() * 100) }),
                length = items.length,
                startX = items[0].offsetLeft,
                times = [],
                widths = [],
                xPercents = [],
                curIndex = 0,
                pixelsPerSecond = (config.speed || 1) * 100,
                snap = config.snap === false ? v => v : gsap.utils.snap(config.snap || 1),
                totalWidth, curX, distanceToStart, distanceToLoop, item, i;
            gsap.set(items, {
                xPercent: (i, el) => {
                    let w = widths[i] = parseFloat(gsap.getProperty(el, "width", "px"));
                    xPercents[i] = snap(parseFloat(gsap.getProperty(el, "x", "px")) / w * 100 + gsap.getProperty(el, "xPercent"));
                    return xPercents[i];
                }
            });
            gsap.set(items, { x: 0 });
            totalWidth = items[length - 1].offsetLeft + xPercents[length - 1] / 100 * widths[length - 1] - startX + items[length - 1].offsetWidth * gsap.getProperty(items[length - 1], "scaleX") + (parseFloat(config.paddingRight) || 0);
            for (i = 0; i < length; i++) {
                item = items[i];
                curX = xPercents[i] / 100 * widths[i];
                distanceToStart = item.offsetLeft + curX - startX;
                distanceToLoop = distanceToStart + widths[i] * gsap.getProperty(item, "scaleX");
                tl.to(item, { xPercent: snap((curX - distanceToLoop) / widths[i] * 100), duration: distanceToLoop / pixelsPerSecond }, 0)
                    .fromTo(item, { xPercent: snap((curX - distanceToLoop + totalWidth) / widths[i] * 100) }, { xPercent: xPercents[i], duration: (curX - distanceToLoop + totalWidth - curX) / pixelsPerSecond, immediateRender: false }, distanceToLoop / pixelsPerSecond)
                    .add("label" + i, distanceToStart / pixelsPerSecond);
                times[i] = distanceToStart / pixelsPerSecond;
            }
            function toIndex(index, vars) {
                vars = vars || {};
                (Math.abs(index - curIndex) > length / 2) && (index += index > curIndex ? -length : length);
                let newIndex = gsap.utils.wrap(0, length, index),
                    time = times[newIndex];
                if (time > tl.time() !== index > curIndex) {
                    vars.modifiers = { time: gsap.utils.wrap(0, tl.duration()) };
                    time += tl.duration() * (index > curIndex ? 1 : -1);
                }
                curIndex = newIndex;
                vars.overwrite = true;
                return tl.tweenTo(time, vars);
            }
            tl.next = vars => toIndex(curIndex + 1, vars);
            tl.previous = vars => toIndex(curIndex - 1, vars);
            tl.current = () => curIndex;
            tl.toIndex = (index, vars) => toIndex(index, vars);
            tl.times = times;
            tl.progress(1, true).progress(0, true);
            if (config.reversed) {
                tl.vars.onReverseComplete();
                tl.reverse();
            }
            return tl;
        }
    }
    //* Button Video */
    function kidza_scroll_progress_svg($scope) {
        if ($scope.find('.pxl-button-video').length > 0) {
            var progressPath = $scope.find('.pxl-button-video path')[0];
            var pathLength = progressPath.getTotalLength();
            progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
            progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
            progressPath.style.strokeDashoffset = pathLength;
            progressPath.getBoundingClientRect();
            progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';

            var updateProgress = function () {
                var scroll = $(window).scrollTop();
                var height = $(window).height() * 0.9;
                var progress = pathLength - (scroll * pathLength / height);
                progressPath.style.strokeDashoffset = progress;
            };

            updateProgress();
            $(window).scroll(updateProgress);
        }
    }

    //
    function kidzaWidgetTextImage($scope) {
        if ($scope.find('.pxl-text-img-wrap').length <= 0) return;
        var mouseX = 0,
            mouseY = 0;

        $scope.find('.pxl-text-img-wrap .pxl-item--inner').mousemove(function (e) {
            var offset = $(this).offset();
            mouseX = (e.pageX - offset.left);
            mouseY = (e.pageY - offset.top);
        });

        $scope.find('.pxl-text-img-wrap ul>li').on("mouseenter", function () {
            $(this).removeClass('deactive').addClass('active');
            var target = $(this).attr('data-target');
            $(this).closest('.pxl-item--inner').find(target).removeClass('deactive').addClass('active');
        });
        $scope.find('.pxl-text-img-wrap ul>li').on("mouseleave", function () {
            $(this).addClass('deactive').removeClass('active');
            var target = $(this).attr('data-target');
            $(this).closest('.pxl-item--inner').find(target).addClass('deactive').removeClass('active');
        });
        const s = {
            x: window.innerWidth / 2,
            y: window.innerHeight / 2
        },
            t = gsap.quickSetter($scope.find('.pxl-text-img-wrap .pxl-item--inner'), "css"),
            e = gsap.quickSetter($scope.find('.pxl-text-img-wrap .pxl-item--inner'), "css");

        gsap.ticker.add((() => {
            const o = .15,
                i = 1 - Math.pow(.85, gsap.ticker.deltaRatio());
            s.x += (mouseX - s.x) * i,
                s.y += (mouseY - s.y) * i,
                t({
                    "--pxl-mouse-x": `${s.x}px`
                }), e({
                    "--pxl-mouse-y": `${s.y}px`
                })
        }))
    }
    //

    var PXL_Icon_Contact_Form = function ($scope, $) {

        setTimeout(function () {
            $('.pxl--item').each(function () {
                var icon_input = $(this).find(".pxl--form-icon"),
                    control_wrap = $(this).find('.wpcf7-form-control');
                control_wrap.before(icon_input.clone());
                icon_input.remove();
            });
        }, 50);

    };
    function kidza_split_text($scope) {
        var st = $scope.find(".pxl-split-text");
        if (st.length == 0) return;
        gsap.registerPlugin(SplitText, ScrollTrigger);

        st.each(function (index, el) {
            var els = $(el).find('p').length > 0 ? $(el).find('p')[0] : el;
            const pxl_split = new SplitText(els, {
                type: "lines, words, chars",
                lineThreshold: 0.5,
                linesClass: "split-line"
            });
            var split_type_set = pxl_split.chars;

            gsap.set(els, { perspective: 400 });

            var settings = {
                scrollTrigger: {
                    trigger: els,
                    toggleActions: "play none none none",
                    start: "top 86%",
                    once: true
                },
                duration: 0.8,
                stagger: 0.02,
                ease: "Linear.easeNone"
            };

            if ($(el).hasClass('split-in-fade')) {
                settings.opacity = 0;
            }
            if ($(el).hasClass('split-in-right')) {
                settings.opacity = 0;
                settings.x = "50";
            }
            if ($(el).hasClass('split-in-left')) {
                settings.opacity = 0;
                settings.x = "-50";
            }
            if ($(el).hasClass('split-in-up')) {
                settings.opacity = 0;
                settings.y = "80";
            }
            if ($(el).hasClass('split-in-down')) {
                settings.opacity = 0;
                settings.y = "-80";
            }
            if ($(el).hasClass('split-in-rotate')) {
                settings.opacity = 0;
                settings.rotateX = "50deg";
            }
            if ($(el).hasClass('split-in-scale')) {
                settings.opacity = 0;
                settings.scale = "0.5";
            }

            if ($(el).hasClass('split-lines-transform')) {
                pxl_split.split({
                    type: "lines",
                    lineThreshold: 0.5,
                    linesClass: "split-line"
                });
                split_type_set = pxl_split.lines;
                settings.opacity = 0;
                settings.yPercent = 100;
                settings.autoAlpha = 0;
                settings.stagger = 0.1;
            }

            if ($(el).hasClass('split-lines-transform-down')) {
                pxl_split.split({
                    type: "lines",
                    lineThreshold: 0.5,
                    linesClass: "split-line"
                });
                split_type_set = pxl_split.lines;
                settings.opacity = 0;
                settings.yPercent = -100;
                settings.autoAlpha = 0;
                settings.stagger = 0.1;
            }

            if ($(el).hasClass('split-lines-rotation-x')) {
                pxl_split.split({
                    type: "lines",
                    lineThreshold: 0.5,
                    linesClass: "split-line"
                });
                split_type_set = pxl_split.lines;
                settings.opacity = 0;
                settings.rotationX = -120;
                settings.transformOrigin = "top center -50";
                settings.autoAlpha = 0;
                settings.stagger = 0.1;
            }

            if ($(el).hasClass('btn-text-timeline')) {
                settings.opacity = 0;
                settings.scale = "1.2";
                settings.y = "-60";
                settings.transformOrigin = "top center -50";
                settings.autoAlpha = 0;
                settings.stagger = 0.05;
            }

            if ($(el).hasClass('split-up')) {
                pxl_split.split({ type: "words" });
                split_type_set = pxl_split.words;

                $(split_type_set).each(function (index, elw) {
                    gsap.from(elw, {
                        opacity: 0,
                        duration: 1.5,
                        y: 80,
                        delay: 0.25,
                        ease: "power4",
                        stagger: {
                            each: 0.15
                        }
                    }, index * 0.1);
                });
            }

            if ($(el).hasClass('split-words-scale')) {
                pxl_split.split({ type: "words" });
                split_type_set = pxl_split.words;

                $(split_type_set).each(function (index, elw) {
                    gsap.set(elw, {
                        opacity: 0,
                        scale: index % 2 == 0 ? 0 : 2,
                        force3D: true,
                        duration: 0.1,
                        ease: "Linear.easeNone",
                        stagger: 0.02,
                    }, index * 0.01);
                });

                var pxl_anim = gsap.to(split_type_set, {
                    scrollTrigger: {
                        trigger: el,
                        toggleActions: "play reverse play reverse",
                        start: "top 86%",
                    },
                    rotateX: "0",
                    scale: 1,
                    opacity: 1,
                });

            } else {
                var pxl_anim = gsap.from(split_type_set, settings);
            }

            if ($(el).hasClass('hover-split-text')) {
                $(el).mouseenter(function (e) {
                    pxl_anim.restart();
                });
            }
        });
    }
    function kidza_scroll_text($scope) {
        $scope.find(".pxl-item--title.style-scroll-bg").each(function () {
            var $container = $(this);

            var text = new SplitText($container[0], { type: 'words, chars' });

            $(text.words).children().first().addClass("first-char");

            gsap.fromTo(text.chars,
                {
                    position: 'relative',
                    display: 'inline-block',
                    opacity: 0.2,
                    x: -5,
                },
                {
                    opacity: 1,
                    x: 0,
                    stagger: 0.1,
                    scrollTrigger: {
                        trigger: $container[0],
                        toggleActions: "play pause reverse pause",
                        start: "top 70%",
                        end: "top 40%",
                        scrub: 0.7,
                    }
                }
            );
        });
    }
    function kidza_button_kid($scope) {
        $('.pxl-button').each(function () {
            const $button = $(this);
            $button.find('button.pxl-kid').each(function () {
                const buttonElement = $button.find('button')[0];
                const svg = $button.find('svg')[0] || document.querySelector('svg');
                const wibble = $button.find('#wibble')[0] || document.querySelector('#wibble');
                if (!svg || !wibble || !buttonElement) {
                    console.warn('Missing required elements for animation');
                    return;
                }

                const width = 100;
                const pointz = 30;
                const spacing = width / pointz;
                let pointzArray = [];
                let isAnimating = false;
                wibble.points.clear();
                for (let i = 0; i < pointz; i++) {
                    const point = svg.createSVGPoint();
                    point.x = i * spacing;
                    point.y = 25;

                    wibble.points.appendItem(point);
                    pointzArray.push(point);
                }
                $(buttonElement).off('mouseenter.wibble mouseleave.wibble');
                $(buttonElement).on('mouseenter.wibble', function () {
                    if (isAnimating) return;
                    isAnimating = true;
                    pointzArray.forEach((point, index) => {
                        const delay = gsap.utils.mapRange(0, pointz - 1, 0, 0.4)(index);
                        gsap.to(point, {
                            keyframes: [
                                { y: "+=6", ease: "sine.inOut" },
                                { y: "-=12", ease: "sine.inOut" },
                                { y: "+=6", ease: "sine.inOut" }
                            ],
                            duration: 0.6,
                            delay: delay,
                            onComplete: index === 0 ? () => {
                                isAnimating = false;
                            } : undefined
                        });
                    });
                });

                $(buttonElement).on('mouseleave.wibble', function () {
                    gsap.killTweensOf(pointzArray);
                    pointzArray.forEach((point, index) => {
                        gsap.to(point, {
                            y: 25,
                            duration: 0.3,
                            ease: "power2.out",
                            onComplete: index === 0 ? () => {
                                isAnimating = false;
                            } : undefined
                        });
                    });
                });
            });
        });
    }
    $(window).on('elementor/frontend/init', function () {
        kidzaElBeforeRender();
        elementorFrontend.hooks.addAction('frontend/element_ready/pxl_contact_form.default', PXL_Icon_Contact_Form);
        elementorFrontend.hooks.addAction('frontend/element_ready/pxl_button_video.default', function ($scope) {
            kidza_scroll_progress_svg($scope);
        });
        elementorFrontend.hooks.addAction('frontend/element_ready/pxl_post_slip.default', function ($scope) {
            kidza_split_text($scope);
        });
        elementorFrontend.hooks.addAction('frontend/element_ready/pxl_button.default', function ($scope) {
            kidza_button_kid($scope);
        });
        elementorFrontend.hooks.addAction('frontend/element_ready/pxl_image_carousel.default', function ($scope) {
            kidza_text_marquee($scope);
        });
        elementorFrontend.hooks.addAction('frontend/element_ready/pxl_text_carousel.default', function ($scope) {
            kidza_text_marquee($scope);
        });

        elementorFrontend.hooks.addAction('frontend/element_ready/pxl_heading.default', function ($scope) {
            kidza_split_text($scope);
            kidza_scroll_text($scope);
        });
        elementorFrontend.hooks.addAction('frontend/element_ready/pxl_list_box.default', function ($scope) {
            kidzaWidgetTextImage($scope);
        });
    });

})(jQuery);