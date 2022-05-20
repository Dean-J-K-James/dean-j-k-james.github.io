import {start, frame} from '/assets/js/update.js';

/**
 * 
 */
export default function initialise(Scene) {
    $("#application-container").click(() => {
        start(Scene);
    });
    start(Scene);
    frame();
}