hs.align = "center";
hs.dimmingOpacity = 0.8;
hs.outlineType = "rounded-white";
hs.wrapperClassName = "highslide-modal";
hs.transitions = ["expand", "crossfade"];
hs.fadeInOut = true;
hs.padToMinWidth = true;
hs.restoreCursor = null;
hs.expandCursor = null;
hs.creditsPosition = "bottom left";
hs.dimmingGeckoFix = true;
hs.objectLoadTime = "after";

function hSlideShow(grp, is_g = 'img') {
    let cfgThumbstrip;
    if(grp === ''){grp='grp';}
    if (is_g === 'gal') {
        cfgThumbstrip = ({
            mode: 'horizontal',
            position: 'bottom center',
            relativeTo: 'viewport'
        });
    } else {
        cfgThumbstrip = false;
    }
    hs.marginBottom = 80;
    let ret = hs.addSlideshow({
        slideshowGroup: grp,
        interval: 3000,
        repeat: true,
        useControls: true,
        fixedControls: 'fit',
        overlayOptions: {
            opacity: 0.75,
            position: 'middle center',
            offsetX: 0,
            offsetY: 0,
            hideOnMouseOut: true
        },
        thumbstrip: cfgThumbstrip
    });
    return ret;
}

function hsImg(a) {
    let group = '--gal--';
    if (a.dataset.grp) {
        group = a.dataset.grp;
    }
    let img = ({
        slideshowGroup: group,
        wrapperClassName: 'single-img',
        captionEval: "this.a.title"
    });
    return img;
}

function hsGal(a) {
    let group = '--gal--';
    if (a.dataset.grp) {
        group = a.dataset.grp;
    }
    let gal = ({
        slideshowGroup: group,
        numberPosition: 'heading',
        wrapperClassName: 'gallery-img',
        captionEval: "this.a.title"
    });
    return gal;
}

hs.addEventListener(window, 'load', function() {

    /*  IN CONTENT IMAGES
    ===========================*/
    (function() {
        let all_a_img = document.querySelectorAll('a[href*="_thumbs"][data-hs-link]');
        let g = "hsImg(this)";
        let is_g = 'img';
        if (all_a_img.length > 1) {
            g = "hsGal(this)";
            is_g = 'gal';
        }
        Array.prototype.filter.call(all_a_img, function(el) {
            if (/\.(jpg|jpeg|png|gif)$/i.test(el.href) === true) {
                el.classList.add('highslide');
                if (!el.getAttribute('data-grp')) {
                    el.setAttribute('data-grp', 'incontent');
                }
                let grp = el.dataset.grp;

                if (!el.getAttribute('onclick')) {
                    el.setAttribute('onclick', 'return hs.expand(this,' + g + ')');
                }
                hSlideShow(grp, is_g);
            }
        });
    }());

    /*  IN BOX IMAGES
    ===========================*/
    (function() {
        let galleryInBox = document.querySelectorAll('[data-att-gallery="highslide"]');
        if (galleryInBox) {
            Array.prototype.filter.call(galleryInBox, function(el) {
                let grp = el.dataset.attGroup;
                if (grp) {
                    let cur = el.querySelectorAll('a[href][class="highslide"]');
                    let g = "hsImg(this)";
                    let is_g = 'img';
                    if (cur.length > 1) {
                        g = "hsGal(this)";
                        is_g = 'gal';
                    }
                    Array.prototype.filter.call(cur, function(el) {
                        if (/\.(jpg|jpeg|png|gif)$/i.test(el.href) === true) {
                            if (!el.getAttribute('data-grp')) {
                                el.setAttribute('data-grp', grp);
                            }
                            if (!el.getAttribute('onclick')) {
                                el.setAttribute('onclick', 'return hs.expand(this,' + g + ')');
                            }
                            hSlideShow(grp, is_g);
                        }
                    });
                }
            });
        }
    }());

    /*  HTML AJAX, IFRAME, INLINE
    ===========================*/
    (function() {
        var all = document.querySelectorAll('.highslide-ajax, .highslide-inline, .highslide-iframe');
        if (all) {
            Array.prototype.filter.call(all, function(el) {
                el.addEventListener('click', function(e) {
                    e.preventDefault();
                    let trg = e.target;
                    let wid = 800;
                    let hei = 450;
                    let ret = ({
                        allowWidthReduction: true
                    });
                    if (trg.dataset.width) {
                        wid = trg.dataset.width;
                    }

                    if (wid !== "fluid") {
                        ret.width = wid;
                    }
                    if (trg.dataset.height) {
                        hei = trg.dataset.height;
                    }

                    if (hei !== "auto") {
                        ret.height = hei;
                    }

                    if (el.classList.contains("highslide-ajax")) {
                        ret.objectType = 'ajax';
                    }
                    if (el.classList.contains("highslide-iframe")) {
                        if (trg.hostname === 'youtu.be') {
                            this.href = this.href.replace("youtu.be", "www.youtube.com/embed");
                        }
                        ret.objectType = 'iframe';
                    }
                    //if (el.classList.contains("highslide-inline")) {}
                    return hs.htmlExpand(this, ret);
                });
            });
        }
    }());

    hs.Expander.prototype.onImageClick = function() {
        if (/gallery-img/.test(this.wrapper.className)) return hs.next();
    };

    hs.Expander.prototype.onDrag = function() {
        hs.dragSensitivity = 50;
        if (/gallery-img/.test(this.wrapper.className)) return hs.next();
    };

    hs.addEventListener(window, "resize", function() {
        var i, exp;
        hs.getPageSize();

        for (i = 0; i < hs.expanders.length; i++) {
            exp = hs.expanders[i];
            if (exp) {
                var x = exp.x,
                    y = exp.y;

                // get new thumb positions
                exp.tpos = hs.getPosition(exp.el);
                x.calcThumb();
                y.calcThumb();

                // calculate new popup position
                x.pos = x.tpos - x.cb + x.tb;
                x.scroll = hs.page.scrollLeft;
                x.clientSize = hs.page.width;
                y.pos = y.tpos - y.cb + y.tb;
                y.scroll = hs.page.scrollTop;
                y.clientSize = hs.page.height;
                exp.justify(x, true);
                exp.justify(y, true);

                // set new left and top to wrapper and outline
                exp.moveTo(x.pos, y.pos);
            }
        }
    });

});
