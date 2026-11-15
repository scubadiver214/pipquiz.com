(function ($) {
    "use strict";
    var widget_post_masonry_handler = function ($scope, $) {
        $('.pxl-grid-masonry').imagesLoaded(function () {
            $.sep_grid_refresh();
        });
    };
    $.sep_grid_refresh = function () {
        $('.pxl-grid-masonry').each(function () {
            var layoutMode = $(this).closest('.pxl-grid').attr('data-layout') || 'masonry';
            var iso = new Isotope(this, {
                itemSelector: '.pxl-grid-item',
                layoutMode: layoutMode,
                fitRows: {
                    gutter: 0
                },
                percentPosition: true,
                masonry: {
                    columnWidth: '.grid-sizer',
                },
                containerStyle: null,
                stagger: 30,
                sortBy: 'name',
            });

            var filtersElem = $(this).parent().find('.pxl-grid-filter');
            filtersElem.on('click', function (event) {
                var filterValue = event.target.getAttribute('data-filter');
                iso.arrange({ filter: filterValue });
            });

            var filterItem = $(this).parent().find('.filter-item');
            filterItem.on('click', function (e) {
                filterItem.removeClass('active');
                $(this).addClass('active');
            });

            var filtersSelect = $(this).parent().find('.pxl-grid-filter');
            filtersSelect.change(function () {
                var filters = $(this).val();
                iso.arrange({ filter: filters });
            });

            var orderSelect = $(this).parent().find('.pxl-grid-filter');
            orderSelect.change(function () {
                var e_order = $(this).val();
                if (e_order == 'asc') {
                    iso.arrange({ sortAscending: false });
                }
                if (e_order == 'des') {
                    iso.arrange({ sortAscending: true });
                }
            });

            $('.pxl-service-grid1').each(function () {
                $(this).find('.pxl-grid-item-inner').hover(function () {
                    $(this).parents('.elementor-element').find('.pxl-grid-item-inner').removeClass('active');
                    $(this).addClass('active');
                });
            });

        });
    }
    $(document).ajaxComplete(function (event, xhr, settings) {
        "use strict";
        $(document).on('click', '.pxl-grid-filter .filter-item', function (e) {
            $(this).siblings('.filter-item').removeClass('active');
            $(this).addClass('active');
        });
    });
    $(window).on('elementor/frontend/init', function () {
        setTimeout(function () {
            $('.pxl-grid').each(function (index, element) {
                var $grid_scope = $(this);
                var $grid_isotope = null;
                var isoOptions = {};

                if ($grid_scope.hasClass('pxl-post-list')) {
                    isoOptions = {};
                } else {
                    var $grid_masonry = $grid_scope.find('.pxl-grid-masonry');

                    if ($grid_masonry.length > 0) {
                        isoOptions = {
                            itemSelector: '.pxl-grid-item',
                            layoutMode: $grid_scope.attr('data-layout') || 'masonry',
                            fitRows: {
                                gutter: 0
                            },
                            percentPosition: true,
                            masonry: {
                                columnWidth: '.grid-sizer',
                            },
                            containerStyle: null,
                            stagger: 30,
                            sortBy: 'name',
                        };

                        try {
                            $grid_isotope = $grid_masonry.isotope(isoOptions);
                        } catch (error) {
                            console.warn('Isotope initialization failed:', error);
                        }
                    }
                }

                $grid_scope.on('click', '.pxl-grid-filter .filter-item', function (e) {
                    e.preventDefault();

                    var $this = $(this);
                    var term_slug = $this.attr('data-filter');
                    $this.siblings('.filter-item.active').removeClass('active');
                    $this.addClass('active');
                    $grid_scope.find('.pxl-post--inner').removeClass('animated');

                    if ($this.closest('.pxl-grid-filter').hasClass('ajax')) {
                        var loadmore = $grid_scope.data('loadmore') || {};
                        loadmore.term_slug = term_slug;

                        kidza_grid_ajax_handler($this, $grid_scope, $grid_isotope, {
                            action: 'kidza_load_more_post_grid',
                            loadmore: loadmore,
                            iso_options: isoOptions,
                            handler_click: 'filter',
                            scrolltop: 0
                        });
                    } else {
                        // Client-side filter
                        if ($grid_isotope && typeof $grid_isotope.isotope === 'function') {
                            $grid_isotope.isotope({ filter: term_slug });
                        }
                    }
                });

                // Pagination functionality
                $grid_scope.on('click', '.pxl-grid-pagination .ajax a.page-numbers', function (e) {
                    e.preventDefault();
                    e.stopPropagation();

                    var $this = $(this);
                    var loadmore = $grid_scope.data('loadmore') || {};
                    var paged = $this.attr('href');

                    if (paged) {
                        paged = paged.replace('#', '');
                        loadmore.paged = parseInt(paged, 10);

                        kidza_grid_ajax_handler($this, $grid_scope, $grid_isotope, {
                            action: 'kidza_load_more_post_grid',
                            loadmore: loadmore,
                            iso_options: isoOptions,
                            handler_click: 'pagination',
                            scrolltop: 0,
                            wpnonce: typeof main_params !== 'undefined' ? main_params.wpnonce : ''
                        });

                        $('html,body').animate({
                            scrollTop: $grid_scope.offset().top - 130
                        }, 500);
                    }
                });

                $grid_scope.on('click', '.btn-grid-loadmore, .pxl-load-more', function (e) {
                    e.preventDefault();

                    var $this = $(this);
                    var loadmore = $this.data('loadmore') || {};
                    var startPage = parseInt($grid_scope.data('start-page'), 10) || 1;
                    loadmore.paged = startPage + 1;
                    console.log(loadmore.paged)
                    kidza_grid_ajax_handler($this, $grid_scope, $grid_isotope, {
                        action: 'kidza_load_more_post_grid',
                        loadmore: loadmore,
                        iso_options: isoOptions,
                        handler_click: 'loadmore',
                        scrolltop: 0,
                        wpnonce: typeof main_params !== 'undefined' ? main_params.wpnonce : ''
                    });
                });

                $grid_scope.on('change', '.orderby', function (e) {
                    e.preventDefault();

                    var $this = $(this);
                    var loadmore = $grid_scope.data('loadmore') || {};
                    loadmore.orderby = $this.val();

                    kidza_grid_ajax_handler($this, $grid_scope, $grid_isotope, {
                        action: 'kidza_load_more_post_grid',
                        loadmore: loadmore,
                        iso_options: isoOptions,
                        handler_click: 'select_orderby',
                        scrolltop: 0
                    });
                });
            });

            function kidza_grid_ajax_handler($this, $grid_scope, $grid_isotope, args = {}) {
                if (typeof main_params === 'undefined' || !main_params.ajax_url) {
                    console.error('main_params is not defined or missing ajax_url');
                    return;
                }

                var settings = $.extend(true, {}, {
                    action: '',
                    loadmore: {},
                    iso_options: {},
                    handler_click: '',
                    scrolltop: 0,
                    wpnonce: ''
                }, args);

                var offset_top = $grid_scope.offset().top;
                var loadmore_text = '';
                var loading_text = '';

                if (settings.handler_click === 'loadmore') {
                    var $loadmore_container = $this.closest('.pxl-load-more');
                    loadmore_text = $loadmore_container.data('loadmore-text') || 'Load More';
                    loading_text = $loadmore_container.data('loading-text') || 'Loading...';
                }

                $.ajax({
                    url: main_params.ajax_url,
                    type: 'POST',
                    data: {
                        action: settings.action,
                        settings: settings.loadmore,
                        handler_click: settings.handler_click,
                        nonce: settings.wpnonce
                    },
                    success: function (res) {
                        try {
                            if (typeof res === 'string') {
                                res = JSON.parse(res);
                            }

                            if (res.status === true || res.status === 'true') {
                                var $grid_inner = null;
                                if (settings.handler_click === 'loadmore') {
                                    $grid_inner = $grid_scope.find('.pxl-grid-inner');
                                    if ($grid_inner.length > 0) {
                                        // $grid_inner.find('.pxl-grid-item').remove();
                                        $grid_inner.append(res.data.html);
                                    }
                                }
                                if (settings.iso_options && $grid_isotope && typeof $grid_isotope.isotope === 'function') {
                                    try {
                                        $grid_isotope.isotope('destroy');
                                        $grid_isotope.isotope(settings.iso_options);
                                    } catch (error) {
                                        console.warn('Isotope reinitialization failed:', error);
                                    }
                                }
                                if (res.data.paged) {
                                    $grid_scope.data('start-page', res.data.paged);
                                }
                                if (settings.loadmore.pagination_type === 'loadmore') {
                                    var $load_more = $grid_scope.find('.pxl-load-more');
                                    if (res.data.paged >= res.data.max) {
                                        $load_more.hide();
                                    } else {
                                        $load_more.show();
                                    }
                                }

                                if (settings.loadmore.pagination_type === 'pagination' && res.data.pagin_html) {
                                    $grid_scope.find('.pxl-grid-pagination').html(res.data.pagin_html);
                                }
                                if (res.data.result_count) {
                                    $grid_scope.find('.result-count').html(res.data.result_count);
                                }
                            } else {
                                console.warn('AJAX request failed:', res.message || 'Unknown error');
                            }
                        } catch (error) {
                            console.error('Error processing AJAX response:', error);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('AJAX request error:', error);
                    },
                    beforeSend: function () {
                        $grid_scope.find('.pxl-grid-overlay-loading').removeClass('loaded').addClass('loader');

                        if (settings.handler_click === 'loadmore') {
                            $this.find('.pxl-loadmore-text').text(loading_text);
                            $this.parent().addClass('loading');
                        }
                    },
                    complete: function () {
                        $grid_scope.find('.pxl-grid-overlay-loading').removeClass('loader').addClass('loaded');

                        if (settings.handler_click === 'loadmore') {
                            $this.find('.pxl-loadmore-text').text(loadmore_text);
                            $this.parent().removeClass('loading');
                        }

                        if (settings.scrolltop) {
                            $('html, body').animate({
                                scrollTop: offset_top - 100
                            }, 300);
                        }
                    }
                });
            }
        }, 150);
    });
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/pxl_post_grid.default', widget_post_masonry_handler);
    });
})(jQuery);