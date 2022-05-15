import {start, frame} from './update.js';

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