import clamp from './clamp.js';

/**
 * 
 */
export default function inverse_lerp(a, b, v) {
    return clamp(0, 1, (v - a) / (b - a));
}