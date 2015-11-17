/*----------------------------------------
Vide

/*----------------------------------------------   
--Usage:

//Init
if ($(window).width() > 767) {
  $(".bg-vid").vide({
    mp4: '/assets/videos/video-home.mp4',
    ogv: '/assets/videos/video-home.ogv',
    webm: '/assets/videos/video-home.webm',
    //poster: '/assets/images/home-mast-bg.jpg'
  });
    
// Fade that shit in  
$('.bg-vid').fadeIn(3000);
$('#sect-video .overlay').stop().animate({
    "opacity": 0.6
});
}
------------------------------------------*/
;(function($, window, document, navigator) {
    "use strict";

    /**
     * Vide settings
     * @private
     */
    var pluginName = "vide",
        defaults = {
            volume: 1,
            playbackRate: 1,
            muted: true,
            loop: true,
            autoplay: true,
            position: "50% 50%",
            posterType: "detect"
        },

        // is iOs?
        isIOS = /iPad|iPhone|iPod/i.test(navigator.userAgent),

        // is Android?
        isAndroid = /Android/i.test(navigator.userAgent);

    /**
     * Parse string with options
     * @param {String} str
     * @returns {Object|String}
     * @private
     */
    function parseOptions(str) {
        var obj = {}, arr, i, len, prop, val, delimiterIndex, option;

        // remove spaces around delimiters and split
        arr = str.replace(/\s*:\s*/g, ":").replace(/\s*,\s*/g, ",").split(",");

        // parse string
        for (i = 0, len = arr.length; i < len; i++) {
            option = arr[i];

            // Ignore urls and string without colon delimiters
            if (option.search(/^(http|https|ftp):\/\//) !== -1 ||
                option.search(":") === -1)
            {
                break;
            }

            delimiterIndex = option.indexOf(":");
            prop = option.substring(0, delimiterIndex);
            val = option.substring(delimiterIndex + 1);

            // if val is an empty string, make it undefined
            if (!val) {
                val = undefined;
            }

            // convert string value if it is like a boolean
            if (typeof val === "string") {
                val = val === "true" || (val === "false" ? false : val);
            }

            // convert string value if it is like a number
            if (typeof val === "string") {
                val = !isNaN(val) ? +val : val;
            }

            obj[prop] = val;
        }

        // if nothing is parsed
        if (prop == null && val == null) {
            return str;
        }

        return obj;
    }

    /**
     * Parse position option
     * @param {String} str
     * @returns {Object}
     * @private
     */
    function parsePosition(str) {
        // convert anything to the string
        str = "" + str;

        // default value is a center
        var args = str.split(/\s+/),
            x = "50%", y = "50%",
            i, len, arg;

        for (i = 0, len = args.length; i < len; i++) {
            arg = args[i];

            // convert values
            if (arg === "left") {
                x = "0%";
            } else if (arg === "right") {
                x = "100%";
            } else if (arg === "top") {
                y = "0%";
            } else if (arg === "bottom") {
                y = "100%";
            } else if (arg === "center") {
                if (i === 0) {
                    x = "50%";
                } else {
                    y = "50%";
                }
            } else {
                if (i === 0) {
                    x = arg;
                } else {
                    y = arg;
                }
            }
        }

        return { x: x, y: y };
    }

    /**
     * Search poster
     * @param {String} path
     * @param {Function} callback
     * @private
     */
    function findPoster(path, callback) {
        var onLoad = function() {
            callback(this.src);
        };

        $("<img src='" + path + ".jpg'>").load(onLoad);
   

    }

    /**
     * Vide constructor
     * @param {HTMLElement} element
     * @param {Object|String} path
     * @param {Object|String} options
     * @constructor
     */
    function Vide(element, path, options) {
        this.element = $(element);
        this._defaults = defaults;
        this._name = pluginName;

        // parse path
        if (typeof path === "string") {
            path = parseOptions(path);
        }

        // parse options
        if (!options) {
            options = {};
        } else if (typeof options === "string") {
            options = parseOptions(options);
        }

        // remove extension
        if (typeof path === "string") {
            path = path.replace(/\.\w*$/, "");
        } else if (typeof path === "object") {
            for (var i in path) {
                if (path.hasOwnProperty(i)) {
                    path[i] = path[i].replace(/\.\w*$/, "");
                }
            }
        }

        this.settings = $.extend({}, defaults, options);
        this.path = path;

        this.init();
    }

    /**
     * Initialization
     * @public
     */
    Vide.prototype.init = function() {
        var that = this,
            position = parsePosition(this.settings.position),
            poster,
            sources;

        // Set video wrapper styles
        this.wrapper = $("<div>").css({
            "position": "absolute",
            "z-index": -1,
            "top": 0,
            "left": 0,
            "bottom": 0,
            "right": 0,
            "overflow": "hidden",
            "-webkit-background-size": "cover",
            "-moz-background-size": "cover",
            "-o-background-size": "cover",
            "background-size": "cover",
            "background-repeat": "no-repeat",
            "background-position": position.x + " " + position.y
        });

        // Get poster path
        poster = this.path;
        if (typeof this.path === "object") {
            if (this.path.poster) {
                poster = this.path.poster;
            } else {
                if (this.path.mp4) {
                    poster = this.path.mp4;
                } else if (this.path.webm) {
                    poster = this.path.webm;
                } else if (this.path.ogv) {
                    poster = this.path.ogv;
                }
            }
        }

        // Set video poster
        if (this.settings.posterType === "detect") {
            findPoster(poster, function(url) {
                that.wrapper.css("background-image", "url(" + url + ")");
            });
        } else if (this.settings.posterType !== "none") {
            this.wrapper
                .css("background-image", "url(" + poster + "." + this.settings.posterType + ")");
        }

        // if parent element has a static position, make it relative
        if (this.element.css("position") === "static") {
            this.element.css("position", "relative");
        }

        this.element.prepend(this.wrapper);

        if (!isIOS && !isAndroid) {
            sources = "";

            if (typeof this.path === "object") {
                if (this.path.mp4) {
                    sources += "<source src='" + this.path.mp4 + ".mp4' type='video/mp4'>";
                }
                if (this.path.webm) {
                    sources += "<source src='" + this.path.webm + ".webm' type='video/webm'>";
                }
                if (this.path.ogv) {
                    sources += "<source src='" + this.path.ogv + ".ogv' type='video/ogv'>";
                }

                this.video = $("<video>" + sources + "</video>");
            } else {
                this.video = $("<video>" +
                    "<source src='" + this.path + ".mp4' type='video/mp4'>" +
                    "<source src='" + this.path + ".webm' type='video/webm'>" +
                    "<source src='" + this.path + ".ogv' type='video/ogg'>" +
                    "</video>");
            }

            // Disable visibility, while loading
            this.video.css("visibility", "hidden");

            // Set video properties
            this.video.prop({
                autoplay: this.settings.autoplay,
                loop: this.settings.loop,
                volume: this.settings.volume,
                muted: this.settings.muted,
                playbackRate: this.settings.playbackRate
            });

            // Append video
            this.wrapper.append(this.video);

            // Video alignment
            this.video.css({
                "margin": "auto",
                "position": "absolute",
                "z-index": -1,
                "top": position.y,
                "left": position.x,
                "-webkit-transform": "translate(-" + position.x + ", -" + position.y + ")",
                "-ms-transform": "translate(-" + position.x + ", -" + position.y + ")",
                "transform": "translate(-" + position.x + ", -" + position.y + ")"
            });

            // resize video, when it's loaded
            this.video.bind("loadedmetadata." + pluginName, function() {
                that.video.css("visibility", "visible");
                that.resize();
            });

            // resize event is available only for 'window',
            // use another code solutions to detect DOM elements resizing
            $(this.element).bind("resize." + pluginName, function() {
                that.resize();
            });
        }
    };

    /**
     * Get video element of the background
     * @returns {HTMLVideoElement|null}
     * @public
     */
    Vide.prototype.getVideoObject = function() {
        return this.video ? this.video[0] : null;
    };

    /**
     * Resize video background
     * @public
     */
    Vide.prototype.resize = function() {
        if (!this.video) {
            return;
        }

        var
            // get native video size
            videoHeight = this.video[0].videoHeight,
            videoWidth = this.video[0].videoWidth,

            // get wrapper size
            wrapperHeight = this.wrapper.height(),
            wrapperWidth = this.wrapper.width();

        if (wrapperWidth / videoWidth > wrapperHeight / videoHeight) {
            this.video.css({
                "width": wrapperWidth + 2, // +2 pixels to prevent empty space after transformation
                "height": "auto"
            });
        } else {
            this.video.css({
                "width": "auto",
                "height": wrapperHeight + 2 // +2 pixels to prevent empty space after transformation
            });
        }
    };

    /**
     * Destroy video background
     * @public
     */
    Vide.prototype.destroy = function() {
        this.element.unbind(pluginName);
        if (this.video) {
            this.video.unbind(pluginName);
        }

        delete $[pluginName].lookup[this.index];
        this.element.removeData(pluginName);
        this.wrapper.remove();
    };

    /**
     * Special plugin object for instances.
     * @type {Object}
     * @public
     */
    $[pluginName] = {
        lookup: []
    };

    /**
     * Plugin constructor
     * @param {Object|String} path
     * @param {Object|String} options
     * @returns {JQuery}
     * @constructor
     */
    $.fn[pluginName] = function(path, options) {
        var instance;
        this.each(function() {
            instance = $.data(this, pluginName);
            if (instance) {
                // destroy plugin instance if exists
                instance.destroy();
            }
            // create plugin instance
            instance = new Vide(this, path, options);
            instance.index = $[pluginName].lookup.push(instance) - 1;
            $.data(this, pluginName, instance);
        });

        return this;
    };

    $(document).ready(function() {
        // window resize event listener
        $(window).bind("resize." + pluginName, function() {
            for (var len = $[pluginName].lookup.length, instance, i = 0; i < len; i++) {
                instance = $[pluginName].lookup[i];
                if (instance) {
                    instance.resize();
                }
            }
        });

        // Auto initialization.
        // Add 'data-vide-bg' attribute with a path to the video without extension.
        // Also you can pass options throw the 'data-vide-options' attribute.
        // 'data-vide-options' must be like "muted: false, volume: 0.5".
        $(document).find("[data-" + pluginName + "-bg]").each(function(i, element) {
            var $element = $(element),
                options = $element.data(pluginName + "-options"),
                path = $element.data(pluginName + "-bg");

            $element[pluginName](path, options);
        });
    });
})(window.jQuery, window, document, navigator);
