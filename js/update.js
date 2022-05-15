let state;

/**
 * 
 */
export function start(Scene) {
    if (typeof Scene === 'function') {
        state = new Scene().algorithm();
    }
}

/**
 * 
 */
export function frame() {
    if (state != null) {
        state.next();
        requestAnimationFrame(frame);
    }
}