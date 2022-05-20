/**
 * 
 */
export default function create_2d_array(w, h, d) {
    return Array.from(Array(w), () => new Array(h).fill(d));
}