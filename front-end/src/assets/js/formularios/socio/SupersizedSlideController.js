$(document).ready(function() {
    /* Pace Loader */
    $(document).ajaxStart(function() {
        Pace.restart();
    });

    $(function($) {
        //Identificando Browser Desktop ou Mobile
        var browser = navigator.userAgent || navigator.vendor || window.opera;
        if (/android|avantgo|blackberry|blazer|compal|elaine|fennec|hiptop|ip(hone|od|ad)|iris|kindle|lge |maemo|midp|mmp|mobile|o2|opera m(ob|in)i|palm( os)?|p(ixi|re)\/|plucker|pocket|psp|smartphone|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce; (iemobile|ppc)|xiino/i.test(browser) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|e\-|e\/|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|xda(\-|2|g)|yas\-|your|zeto|zte\-/i.test(browser)) {
            //Mobile
            $("#supersized-loader").hide();
            $("#supersized").hide();
            return true;
        } else {
            //Desktop
            $("#supersized-loader").hide();
            $("#supersized").show();
            //Background Slider
            $.supersized({
                //Functionality
                slideshow: 1, //Slideshow on/off
                autoplay: 1, //Slideshow starts playing automatically
                start_slide: 1, //Start slide (0 is random)
                stop_loop: 0, //Pauses slideshow on last slide
                random: 0, //Randomize slide order (Ignores start slide)
                slide_interval: 5000, //Length between transitions
                transition: 1, //0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
                transition_speed: 700, //Speed of transition
                new_window: 1, //Image links open in new window/tab
                pause_hover: 0, //Pause slideshow on hover
                keyboard_nav: 1, //Keyboard navigation on/off
                performance: 1, //0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
                image_protect: 1, //Disables image dragging and right click with Javascript                            
                //Size & Position                         
                min_width: 0, //Min width allowed (in pixels)
                min_height: 0, //Min height allowed (in pixels)
                vertical_center: 1, //Vertically center background
                horizontal_center: 1, //Horizontally center background
                fit_always: 0, //Image will never exceed browser width or height (Ignores min. dimensions)
                fit_portrait: 0, //Portrait images will not exceed browser height
                fit_landscape: 0, //Landscape images will not exceed browser width                            
                //Components
                slide_links: 'blank', //Individual links for each slide (Options: false, 'num', 'name', 'blank')
                thumb_links: 0, //Individual thumb links for each slide
                thumbnail_navigation: 0, //Thumbnail navigation
                slides: [
                    { image: base_url + '/assets/image/slideshow1.jpg' },
                    { image: base_url + '/assets/image/slideshow2.jpg' },
                    { image: base_url + '/assets/image/slideshow3.jpg' }
                ],
                //Theme Options              
                progress_bar: 0,
                mouse_scrub: 0
            });
            return false;
        }
    });
});